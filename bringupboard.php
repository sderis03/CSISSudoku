<?php
 include 'connectserver.php';
 
$resultblankboard = mysqli_query($conn, "select boardwithblanks from Sudoku;"); 
$returnblankBoard = mysqli_fetch_assoc($resultblankboard);


 $board = "";
 
 for($i=0;$i<81; $i++){
	 $board .= $returnblankBoard["boardwithblanks"][$i];
 }
 
 echo $board;
 
?>