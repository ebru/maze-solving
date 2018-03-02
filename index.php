<?php

require_once('maze.php');

// create new Maze object
$maze = new Maze();

echo "<h3>Maze:</h3>";

$maze->display();

// find path and re-build the start point as 'S'
$maze->findPath($maze->start_x, $maze->start_y);
$maze->points[$maze->start_x][$maze->start_y] = 'S';

echo "<h3>Solution:</h3>";

$maze->display();

?>