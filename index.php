<?php

class Maze {

  public $maze = array(
    array('#', '#', '#', '#', '#', '#'),
    array('.', '.', '.', '.', '.', '#'),
    array('#', '.', 'S', '#', '#', '#'),
    array('#', '.', '#', '#', '#', '#'),
    array('.', '.', '.', '#', '.', 'G'),
    array('#', '#', '.', '.', '.', '#'));

  public function display() {

    for ($x = 0; $x < count($this->maze); $x++) {
      echo "<table><tr>";

      for ($y = 0; $y < count($this->maze[$x]); $y++) {
        echo "<td width='10px'>" . $this->maze[$x][$y] . "</td>";
      }
      echo "</tr></table>";
    }
  }

  public function findStartPoints() {

    for ($x = 0; $x < count($this->maze); $x++) {
      for ($y = 0; $y < count($this->maze[$x]); $y++) {

        if($this->maze[$x][$y] == 'S') {
          $start_x = $x;
          $start_y = $y;
        }
      }
    }
    return array($start_x, $start_y);
  }

  public function findPath($x, $y) {

     if (!isset($this->maze[$x][$y])) { return false; }
     if ($this->maze[$x][$y] == 'G') { return true; }
     if ($this->maze[$x][$y] != '.' && $this->maze[$x][$y] != 'S') { return false; }

     $this->maze[$x][$y] = '+';

     if($this->findPath($x, $y-1) || $this->findPath($x+1, $y) || $this->findPath($x, $y+1) || $this->findPath($x-1, $y)) {
        return true;
     }

     $this->maze[$x][$y] = '.';
     return false;
  }
}

$maze = new Maze();
$maze->display();

$start_points = $maze->findStartPoints();
$start_x = $start_points[0];
$start_y = $start_points[1];

$maze->findPath($start_x, $start_y);
$maze->maze[$start_x][$start_y] = 'S';

$maze->display();

?>
