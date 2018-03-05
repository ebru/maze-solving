<?php

require_once('maze.php');

// create new Maze object
$maze = new Maze();

// load data of the maze
$maze->load();

// display it on screen
$maze->display($title = "Maze:");

// find path and re-build the start point as 'S'
$maze->findPath($maze->start_x, $maze->start_y);
$maze->points[$maze->start_x][$maze->start_y] = 'S';

// display the solution on screen
$maze->display($title = "Solution:");

?>