<?php
include 'connectserver.php';


$resultfullboard= mysqli_query($conn, "select board from Sudoku;"); 
$returnfullBoard = mysqli_fetch_assoc($resultfullboard);

$resultblankboard = mysqli_query($conn, "select boardwithblanks from Sudoku;"); 
$returnblankBoard = mysqli_fetch_assoc($resultblankboard);
//find an index with the value 0 in boardwithblanks
for($i=0; $i<81; $i++){
	if($returnblankBoard["boardwithblanks"][$i] ==0){
		$getindexof0 = $i;
		break;
	}
}

//get value of that index from full board
for($i =0; $i<81; $i++){
	if($i==$getindexof0){
		$hintvalue= $returnfullBoard["board"][$i];
		break;
	}
}
//create new array from boardwithblanks to be stored in DB
$updatedboard = array();
for($i=0; $i<81; $i++){
	$updatedboard[$i]= $returnblankBoard["boardwithblanks"][$i];
}
//update that board with the value for the hint.
for($i=0; $i<81; $i++){
	if($i==$getindexof0){
		$updatedboard[$i] = $hintvalue;
	}else{
		$updatedboard[$i] = $updatedboard[$i];
	}
}

//to store in DB
$newboard = "";
for($i=0; $i<81; $i++){
	$newboard .= $updatedboard[$i];
}

//update DB
mysqli_query($conn, "update Sudoku set boardwithblanks='$newboard';");


// add one because our table is from 1-81 not 0-80
$getindexofhint = $getindexof0 +1;
echo $hintvalue . "_" . $getindexofhint;
		
		




?>