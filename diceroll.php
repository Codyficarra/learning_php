<!DOCTYPE html>
<html>
<head>
   <title>Game of Dice</title>
</head>
<body>

<form>
   <div>Pick a Number from 1 to 6:</div>
   <input type="number" name="playerguess"/>
   <div><br><input type="submit" value="Let's Play!"></div><br>
</form>

#This is a game that allows the player to pick a number 1 through 6 and see how many virtual rolls it takes to get it.
<?php

$sixrolled = false;
$rollcount = 0;
#echo "What would you like to guess? 1 through 6: ";
#$input = rtrim(fscanf(STDIN, "%d\n"));
if (isset($_GET['playerguess'])){
   $playerguess = $_GET['playerguess'];
   while ($sixrolled == false){
      if ($playerguess > 6 || $playerguess < 1){
         echo nl2br("Go ahead and pick a number 1 through 6!\n");
         break;
      }#end of number check if statement
      $rollcount++;
      $roll = rand(1, 6);
      if ($roll == $playerguess){
         echo nl2br("The dice rolled a " .$roll. " hooray!! \n");
         $sixrolled = true;
         echo nl2br("\nIt took " .$rollcount. " rolls to get a " .$playerguess);
      }#end of if statement
      else{
         echo nl2br("The dice rolled a " .$roll. " too bad, let's roll again.\n");
      }#end of else statement
   }#end of while loop
}#end of first if statement



?>

</body>
</html>
