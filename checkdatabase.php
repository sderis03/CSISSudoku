<?php
include 'connectserver.php';

// $q should be in the format #txt##
//$q = "3txt6";
$q = $_GET["q"];

$sudokuValue = $q[0];    // returns sudoku game value
$indexValue = substr($q, 4);    // returns div tag aka index of value


$resultfullboard= mysqli_query($conn, "select board from Sudoku;"); 
$returnfullBoard = mysqli_fetch_assoc($resultfullboard);

$resultblankboard = mysqli_query($conn, "select boardwithblanks from Sudoku;"); 
$returnblankBoard = mysqli_fetch_assoc($resultblankboard);
$updatedboard = array();
//my divs go from 1-81 not 0-80. Arrays are read from 0 to 80 so I need to subtract 1 from my indexvalue
if($returnfullBoard["board"][$indexValue-1] == $sudokuValue){
	for($i=0; $i<81; $i++){
		$updatedboard[$i] = $returnblankBoard["boardwithblanks"][$i];
	}

	for($i=0; $i<81; $i++){
		if($i==$indexValue-1){
			$updatedboard[$i] = $sudokuValue;
		}else{
			$updatedboard[$i] = $updatedboard[$i];
		}
	}
	$board = "";
	for($i=0; $i<81; $i++){
		$board .= $updatedboard[$i];
	}

	mysqli_query($conn, "UPDATE Sudoku SET boardwithblanks='$board';"); 
	
	echo $sudokuValue; //correct!
}else{  
	echo "0"; //not correct
}
?>