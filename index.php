<?php

$maze = array(
         array('S', '#', '#', '#', '#', '#'),
         array('.', '.', '.', '.', '.', '#'),
         array('#', '.', '#', '#', '#', '#'),
         array('#', '.', '#', '#', '#', '#'),
         array('.', '.', '.', '#', '.', 'G'),
         array('#', '#', '.', '.', '.', '#'));

         echo "<b>Maze:</b> <br>";

         for ($x = 0; $x < count($maze); $x++) {
           echo "<table><tr>";
           for ($y = 0; $y < count($maze[$x]); $y++) {

             echo "<td width='10px'>" . $maze[$x][$y] . "</td>";

             if($maze[$x][$y] == 'S') {
               $start_x = $x;
               $start_y = $y;
             }
           }
           echo "</tr></table>";
         }

         function findPath($x, $y) {

            global $maze;
            if (!isset($maze[$x][$y])) { return false; }
            if ($maze[$x][$y] == 'G') { return true; }
           	if ($maze[$x][$y] != '.' && $maze[$x][$y] != 'S') { return false; }

             $maze[$x][$y] = '+';

             if(findPath($x, $y-1) || findPath($x+1, $y) || findPath($x, $y+1) || findPath($x-1, $y)) {
               return true;
             }

             $maze[$x][$y] = '.';
             return false;
           }

         findPath($start_x, $start_y);
         $maze[$start_x][$start_y] = 'S';

         echo "<br> <b>Solution:</b> <br>";

         for ($x = 0; $x < count($maze); $x++) {
           echo "<table><tr>";
           for ($y = 0; $y < count($maze[$x]); $y++) {

             echo "<td width='10px'>" . $maze[$x][$y] . "</td>";

           }
           echo "</tr></table>";
         }

?>
