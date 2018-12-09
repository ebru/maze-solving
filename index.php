<?php

require_once 'vendor/autoload.php';
require_once 'maze.php';

// Create new Maze object
$maze = new Maze();

// Load data of the maze
$maze->load();

// Display it on screen
$maze->display($title = "Maze:");

// Find path and re-build the start point as 'S'
$maze->findPath($maze->start_x, $maze->start_y);
$maze->points[$maze->start_x][$maze->start_y] = 'S';

// Display the solution on screen
$maze->display($title = "Solution:");