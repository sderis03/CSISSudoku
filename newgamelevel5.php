<?php
include 'connectserver.php';
//LEVEL5
//intialize board
$board = array(
	array(0,0,0,0,0,0,0,0,0),
	array(0,0,0,0,0,0,0,0,0),
	array(0,0,0,0,0,0,0,0,0),
	array(0,0,0,0,0,0,0,0,0),
	array(0,0,0,0,0,0,0,0,0),
	array(0,0,0,0,0,0,0,0,0),
	array(0,0,0,0,0,0,0,0,0),
	array(0,0,0,0,0,0,0,0,0),
	array(0,0,0,0,0,0,0,0,0));


$startOver = true;
//fill board with zeros
while($startOver){
	for($row=0; $row<9;$row++){
		for($col=0; $col<9; $col++){
			$board[$row][$col] = 0;
		}
	}
	$startOver =false;
	for($row=0; $row<9;$row++){
		for($col=0; $col<9; $col++){
			$board[$row][$col] = rand(1,9);
			$count = 0;
				while(!(rowGood($board,$row,$col) && colGood($board,$row,$col) && squareGood($board,$row,$col))){
					$board[$row][$col] = rand(1,9);
					++$count;
					if($count>100){
						$startOver=true;
						break; //out of while
					}
				}
			if($startOver== true){
				break; //break out of col loop
			}
		}
		if($startOver==true){
				break; //break out of row loop
		}
	}
}

//check if number has not appeared in row
function rowGood($theboard, $rowtoCheck, $coltoCheck){
	for($i=0; $i<9; $i++){
		if($theboard[$rowtoCheck][$coltoCheck]==$theboard[$rowtoCheck][$i]  && $i != $coltoCheck){
			return false;
		}
	}
	return true;
}

//check if number has not appeared in column
function colGood($theboard, $rowtoCheck, $coltoCheck){
	for($i=0; $i<9; $i++){
		if($theboard[$rowtoCheck][$coltoCheck]==$theboard[$i][$coltoCheck]  && $i != $rowtoCheck){
			return false;
		}
	}
	
	return true;
}
//check if number has not appeared in 3X3 square
function squareGood($theboard, $rowtoCheck , $coltoCheck){
	for($i = ($rowtoCheck-$rowtoCheck%3); $i<($rowtoCheck-$rowtoCheck%3 +3); $i++){
		for($j=($coltoCheck-$coltoCheck%3); $j<($coltoCheck-$coltoCheck%3 + 3); $j++){
			//make sure you aren't comparing cell to itself
			if($theboard[$rowtoCheck][$coltoCheck] == $theboard[$i][$j] && !($i == $rowtoCheck && $j== $coltoCheck)){
				return false;
			}
		}
	}
	return true;
}
//--------------------------------------------finished making board------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------

//store final board as string 
$boardString = "";
for($row=0; $row<9;$row++){
		for($col=0; $col<9; $col++){
			$boardString .= $board[$row][$col];
		}
	}
//put blanks in boards
$first3B3 =[1,2,3,10,11,12,19,20,21]; //indices of 3x3 squares
$second3B3 =[4,5,6,13,14,15,22,23,24];
$third3B3 =[7,8,9,16,17,18,25,26,27];
$fourth3B3 =[28,29,30,37,38,39,46,47,48];
$fifth3B3 = [31,32,33,40,41,42,49,50,51];
$sixth3B3 = [34,35,36,43,44,45,52,53,54];
$seventh3B3 =[55,56,57,64,65,66,73,74,75];
$eighth3B3 = [58,59,60,67,68,69,76,77,78];
$ninth3B3 = [61,62,63,70,71,72,79,80,81];

$blankBoardString = $boardString;	

//----------------------------------------------level 5 start-------------------------------------------------------------------------------------

	$index1= rand(1,9);
	$index2=rand(1,9);
	while($index1 == $index2){// index1 and 2 cannot equal eachother.  keep assigning values to index2 until it doesn't equal index 1 any more
		$index2 = rand(1,9);
	}
	$index3 = rand(1,9);
	while($index3 == $index1 || $index3== $index2){// index1 and 2 cannot equal index3.  keep assigning values to index3 until it doesn't equal either index 1 or 2 any more
		$index3 = rand(1,9);
	}
	$index4 = rand(1,9);
	while($index4 == $index1 || $index4== $index2 || $index4 == $index3){// index1,2,3 cannot equal i4.  keep assigning values to i4 until it doesn't equal either index 1,2,3 any more
		$index4 = rand(1,9);
	}
	$index5 = rand(1,9);
	while($index5 == $index1 || $index5== $index2 || $index5==$index3 || $index5==$index4){// index1,2,3,4 cannot equal i5.  keep assigning values to i5 until it doesn't equal either index 1,2,3,4 any more
		$index5 = rand(1,9);
	}
	//print "1st 3b3index ";
	for($i =1; $i<=9; $i++){ 
		if($i == $index1 || $i==$index2 || $i==$index3 || $i==$index4 || $i==$index5){
			$blankBoardString[$first3B3[$i-1]-1]= "0";
			 
		}
	}
	
	$index1= rand(1,9);
	$index2=rand(1,9);
	while($index1 == $index2){
		$index2 = rand(1,9);
	}
	$index3 = rand(1,9);
	while($index3 == $index1 || $index3== $index2){
		$index3 = rand(1,9);
	}
	$index4 = rand(1,9);
	while($index4 == $index1 || $index4== $index2 || $index4 == $index3){
		$index4 = rand(1,9);
	}
	$index5 = rand(1,9);
	while($index5 == $index1 || $index5== $index2 || $index5==$index3 || $index5==$index4){// index1,2,3,4 cannot equal i5.  keep assigning values to i5 until it doesn't equal either index 1,2,3,4 any more
		$index5 = rand(1,9);
	}
	//print "2nd 3b3index  ";
	for($i =1; $i<=9; $i++){ 
		if($i == $index1 || $i==$index2 || $i==$index3 || $i==$index4 || $i==$index5){
			$blankBoardString[$second3B3[$i-1]-1]= "0";
			 
		}
	}
	
	$index1= rand(1,9);
	$index2=rand(1,9);
	while($index1 == $index2){// index1 and 2 cannot equal eachother.  keep assigning values to index2 until it doesn't equal index 1 any more
		$index2 = rand(1,9);
	}
	$index3 = rand(1,9);
	while($index3 == $index1 || $index3== $index2){// index1 and 2 cannot equal index3.  keep assigning values to index3 until it doesn't equal either index 1 or 2 any more
		$index3 = rand(1,9);
	}
	$index4 = rand(1,9);
	while($index4 == $index1 || $index4== $index2 || $index4 == $index3){// index1,2,3 cannot equal i4.  keep assigning values to i4 until it doesn't equal either index 1,2,3 any more
		$index4 = rand(1,9);
	}
	$index5 = rand(1,9);
	while($index5 == $index1 || $index5== $index2 || $index5==$index3 || $index5==$index4){// index1,2,3,4 cannot equal i5.  keep assigning values to i5 until it doesn't equal either index 1,2,3,4 any more
		$index5 = rand(1,9);
	}
	//print "3rd 3b3index  = " . $index . "!";
	for($i =1; $i<=9; $i++){ 
		if($i == $index1 || $i==$index2 || $i==$index3 || $i==$index4 || $i==$index5){
			$blankBoardString[$third3B3[$i-1]-1]= "0";
			 
		}
	}
	
	$index1= rand(1,9);
	$index2=rand(1,9);
	while($index1 == $index2){
		$index2 = rand(1,9);
	}
	$index3 = rand(1,9);
	while($index3 == $index1 || $index3== $index2){ 
		$index3 = rand(1,9);
	}
	$index4 = rand(1,9);
	while($index4 == $index1 || $index4== $index2 || $index4 == $index3){
		$index4 = rand(1,9);
	}
	$index5 = rand(1,9);
	while($index5 == $index1 || $index5== $index2 || $index5==$index3 || $index5==$index4){
		$index5 = rand(1,9);
	}
	//print "4th 3b3index  = " . $index . "!";
	for($i =1; $i<=9; $i++){ 
		if($i == $index1 || $i==$index2 || $i==$index3 || $i==$index4 || $i==$index5){
			$blankBoardString[$fourth3B3[$i-1]-1]= "0";
			 
		}
	}
	
	$index1= rand(1,9);
	$index2=rand(1,9);
	while($index1 == $index2){
		$index2 = rand(1,9);
	}
	$index3 = rand(1,9);
	while($index3 == $index1 || $index3== $index2){
		$index3 = rand(1,9);
	}
	$index4 = rand(1,9);
	while($index4 == $index1 || $index4== $index2 || $index4 == $index3){
		$index4 = rand(1,9);
	}
	$index5 = rand(1,9);
	while($index5 == $index1 || $index5== $index2 || $index5==$index3 || $index5==$index4){
		$index5 = rand(1,9);
	}
	//print "5th 3b3index  = " . $index . "!";
	for($i =1; $i<=9; $i++){ 
		if($i == $index1 || $i==$index2 || $i==$index3 || $i==$index4 || $i==$index5){
			$blankBoardString[$fifth3B3[$i-1]-1]= "0";
			 
		}
	}
	
	$index1= rand(1,9);
	$index2=rand(1,9);
	while($index1 == $index2){
		$index2 = rand(1,9);
	}
	$index3 = rand(1,9);
	while($index3 == $index1 || $index3== $index2){
		$index3 = rand(1,9);
	}
	$index4 = rand(1,9);
	while($index4 == $index1 || $index4== $index2 || $index4 == $index3){
		$index4 = rand(1,9);
	}
	$index5 = rand(1,9);
	while($index5 == $index1 || $index5== $index2 || $index5==$index3 || $index5==$index4){
		$index5 = rand(1,9);
	}
	//print "6th 3b3index  = " . $index . "!";
	for($i =1; $i<=9; $i++){ 
		if($i == $index1 || $i==$index2 || $i==$index3 || $i==$index4 || $i==$index5){
			$blankBoardString[$sixth3B3[$i-1]-1]= "0";
			 
		}
	}
	
	$index1= rand(1,9);
	$index2=rand(1,9);
	while($index1 == $index2){
		$index2 = rand(1,9);
	}
	$index3 = rand(1,9);
	while($index3 == $index1 || $index3== $index2){
		$index3 = rand(1,9);
	}
	$index4 = rand(1,9);
	while($index4 == $index1 || $index4== $index2 || $index4 == $index3){
		$index4 = rand(1,9);
	}
	$index5 = rand(1,9);
	while($index5 == $index1 || $index5== $index2 || $index5==$index3 || $index5==$index4){
		$index5 = rand(1,9);
	}
	//print "7th 3b3index  = " . $index . "!";
	for($i =1; $i<=9; $i++){ 
		if($i == $index1 || $i==$index2 || $i==$index3 || $i==$index4 || $i==$index5){
			$blankBoardString[$seventh3B3[$i-1]-1]= "0";
			 
		}
	}
	
	$index1= rand(1,9);
	$index2=rand(1,9);
	while($index1 == $index2){
	}
	$index3 = rand(1,9);
	while($index3 == $index1 || $index3== $index2){
		$index3 = rand(1,9);
	}
	$index4 = rand(1,9);
	while($index4 == $index1 || $index4== $index2 || $index4 == $index3){
		$index4 = rand(1,9);
	}
	$index5 = rand(1,9);
	while($index5 == $index1 || $index5== $index2 || $index5==$index3 || $index5==$index4){
		$index5 = rand(1,9);
	}
	//print "8th 3b3index  = " . $index . "!";
	for($i =1; $i<=9; $i++){ 
		if($i == $index1 || $i==$index2 || $i==$index3 || $i==$index4 || $i==$index5){
			$blankBoardString[$eighth3B3[$i-1]-1]= "0";
			 
		}
	}
	$index1= rand(1,9);
	$index2=rand(1,9);
	while($index1 == $index2){
		$index2 = rand(1,9);
	}
	$index3 = rand(1,9);
	while($index3 == $index1 || $index3== $index2){
		$index3 = rand(1,9);
	}
	$index4 = rand(1,9);
	while($index4 == $index1 || $index4== $index2 || $index4 == $index3){
		$index4 = rand(1,9);
	}
	$index5 = rand(1,9);
	while($index5 == $index1 || $index5== $index2 || $index5==$index3 || $index5==$index4){
		$index5 = rand(1,9);
	}
	//print "9th 3b3index  = " . $index . "!";
	for($i =1; $i<=9; $i++){ 
		if($i == $index1 || $i==$index2 || $i==$index3 || $i==$index4 || $i==$index5){
			$blankBoardString[$ninth3B3[$i-1]-1]= "0";
			 
		}
	}
	$blankboard = "";
	for($i=0;$i<81; $i++){
		$blankboard .= $blankBoardString[$i];
	}
	
//-----------------------------------------------------------fin level 5-------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------
//store board in database
$check = mysqli_query($conn, "select count(*) from Sudoku;");
//delete past board
if ($check->num_rows != 0){
   mysqli_query($conn, "delete from Sudoku;");
}
mysqli_query($conn, "insert into Sudoku (board, boardwithblanks) values ('$boardString', '$blankboard');");
echo "$blankboard";
?>