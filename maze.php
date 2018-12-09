<?php
/**
 * Maze class to retrieve points of the text file contains a maze
 */
class Maze
{

    /**
     * Variable for the points of the maze
     *
     * @var $points Array declaration for the points of the maze
     * @var $start_x Start position in column
     * @var $start_y Start position in row
     */
    public $points = array();
    public $start_x;
    public $start_y;

    /**
     * Load
     *
     * Gets maze from text file, and builds its points with two dimensional array
     *
     * @return array contains the points of the maze
     */
    public function load()
    {
        $file = fopen('maze.txt', 'r');

        $x = 0;

        while (!feof($file)) {

            $line = trim(fgets($file));

            for ($y = 0; $y < strlen($line); $y++ ) {
                $this->points[$x][$y] = $line[$y];
                if ($line[$y] == 'S') {
                    $this->start_x = $x; $this->start_y = $y;
                }
            }
            $x++;
        }
        fclose($file);
    }

    /**
     * Display
     *
     * Echos table structure and points to display the maze on screen
     *
     * @param string $title The title of the maze to display
     *
     * @return void
     */
    public function display($title)
    {
        echo "<h3>". $title ."</h3>";

        for ($x = 0; $x < count($this->points); $x++) {
            echo "<table><tr>";

            for ($y = 0; $y < count($this->points[$x]); $y++) {
                echo "<td width='10px'>" . $this->points[$x][$y] . "</td>";
            }
            echo "</tr></table>";
        }
    }

    /**
     * Find Path
     *
     * Finds possible path to follow recursively
     *
     * @param int $x The position of column in array
     * @param int $y The position of row in array
     *
     * @return true if it is a proper path to follow, false if it is a dead end
     */
    public function findPath($x, $y)
    {
        if (!isset($this->points[$x][$y])) {
            return false;
        }
        if ($this->points[$x][$y] == 'G') {
            return true;
        }
        if ($this->points[$x][$y] != '.' && $this->points[$x][$y] != 'S') {
            return false;
        }

        $this->points[$x][$y] = '+';

        if ($this->findPath($x, $y-1) || $this->findPath($x+1, $y)
            || $this->findPath($x, $y+1) || $this->findPath($x-1, $y)
        ) {
            return true;
        }

        $this->points[$x][$y] = 'x';
        return false;
    }
}
