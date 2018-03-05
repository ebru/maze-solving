<?php
/**
 * Index file to show the maze
 *
 * PHP version 7
 *
 * @category  PHP
 * @package   Maze
 * @author    Ebru Kaya <ebru.kaya@sony.com>
 * @copyright 2018 Ebru Kaya
 * @license   The PHP License, version 3.01 http://www.php.net/license/3_01.txt
 * @link      http://bitbucket.com/ebrukaya
 */

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

?>