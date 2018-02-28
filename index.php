<?php

class Maze {

  // create two dimension array for the points of maze
  public $points = array(
    array('#', '#', '#', '#', '#', '#'),
    array('.', '.', '.', '.', '.', '#'),
    array('#', '.', 'S', '#', '#', '#'),
    array('#', '.', '#', '#', '#', '#'),
    array('.', '.', '.', '#', '.', 'G'),
    array('#', '#', '.', '.', '.', '#'));

  // display the maze on screen
  public function display() {

    for ($x = 0; $x < count($this->points); $x++) {
      echo "<table><tr>";

      for ($y = 0; $y < count($this->points[$x]); $y++) {
        echo "<td width='10px'>" . $this->points[$x][$y] . "</td>";
      }
      echo "</tr></table>";
    }
  }

  // find start points of the maze
  public function findStartPoints() {

    for ($x = 0; $x < count($this->points); $x++) {
      for ($y = 0; $y < count($this->points[$x]); $y++) {

        if($this->points[$x][$y] == 'S') {
          $start_x = $x;
          $start_y = $y;
        }
      }
    }
    return array(
      'x' => $start_x,
      'y' => $start_y);
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

     $this->points[$x][$y] = '.';
     return false;
  }
}

$maze = new Maze();

echo "<h3>Maze:</h3>";

$maze->display();

$start_points = $maze->findStartPoints();
$start_x = $start_points['x'];
$start_y = $start_points['y'];

$maze->findPath($start_x, $start_y);
$maze->points[$start_x][$start_y] = 'S';

echo "<h3>Solution:</h3>";

$maze->display();

?>
