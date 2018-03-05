<?php

class Maze {

  // variables for points of the maze
  public $points = array();
  public $start_x;
  public $start_y;

  // get maze from the text file, build its points with two dimensional array
  public function load() {
    $file = fopen('maze.txt', 'r');
    $x = 0;

    while (!feof($file)) {

      $line = trim(fgets($file));

      for($y = 0; $y < strlen($line); $y++ ) {
    		$this->points[$x][$y] = $line[$y];
    		if ( $line[$y] == 'S') { $this->start_x = $x; $this->start_y = $y; }
    	}
      $x++;
    }
    fclose($file);
  }

  // display the maze on screen
  public function display($title) {

    echo "<h3>". $title ."</h3>";

    for ($x = 0; $x < count($this->points); $x++) {
      echo "<table><tr>";

      for ($y = 0; $y < count($this->points[$x]); $y++) {
        echo "<td width='10px'>" . $this->points[$x][$y] . "</td>";
      }
      echo "</tr></table>";
    }
  }

  // find possible path to follow recursively
  public function findPath($x, $y) {

     if (!isset($this->points[$x][$y])) { return false; }
     if ($this->points[$x][$y] == 'G') { return true; }
     if ($this->points[$x][$y] != '.' && $this->points[$x][$y] != 'S') { return false; }

     $this->points[$x][$y] = '+';

     if($this->findPath($x, $y-1) || $this->findPath($x+1, $y) || $this->findPath($x, $y+1) || $this->findPath($x-1, $y)) {
        return true;
     }

     $this->points[$x][$y] = 'x';
     return false;
  }
}

?>