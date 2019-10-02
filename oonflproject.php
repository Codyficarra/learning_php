<!DOCTYPE html>
<html>
<head>
   <title>nflproject</title>
<style>
h1{
   color:#8B0000;
   background-color:white;
   margin: 10px;
}
h3{
   background-color:white;
   margin: 10px;
}

table {
   border-style:solid;
   border-width:2px;
   border-color:black;
}
</style>
</head>
<body bgcolor="silver">

<h1>The Top 20 NFL fantasy RBs after 3 weeks of play</h1>

<h3>This is in a PPR league</h3>
<form>
   Pick a rank 1 through 20 to request more stats:<br>
   <input type="number" name="rankrequest"/>
   <input type="submit" value="Get more stats"><br>
</form>




<?php

require 'toprb.php';



$db = pg_connect('host=localhost port=5432 dbname=nfl_project user=cody');

if (!$db){#spitting out error incase connection with the DB fails
   echo "An error occurred with pg_connect. \n" .$db. "<br/>";
   echo pg_last_error();
   exit;
}

$query = "SELECT * FROM top20rbs";
$result = pg_query($db, $query);
/*
$testrank = 3;
$query2 = "SELECT * FROM top20rbs WHERE rank = '{$testrank}'";
echo $query2;
*/

if (!$result){#another error indicator
   echo "An error occurred with pg_query. \n" .$query. "<br/>";
   echo pg_last_error();
   exit;
}


if (isset($_GET['rankrequest'])){
   $rankrequest = $_GET['rankrequest'];

   if ($rankrequest < 1 || $rankrequest > 20){
      echo nl2br("This only stores rank 1 through 20");
      echo "<table border='1'>
      <tr>
      <th>rank</th>
      <th>playername</th>
      </tr>";

      while ($rblist = pg_fetch_assoc($result)){
         echo"<tr>";
         echo"<td>".$rblist['rank']."</td>";
         echo"<td>".$rblist['playername']."</td>";
         echo"</tr>";
      }
      echo "</table>";
      exit;
   }

   $nextquery = "SELECT * FROM top20rbs WHERE rank = '{$rankrequest}'";
   $result2 = pg_query($db, $nextquery);

   if (!$result2){
   echo "An error occurred with pg_query. \n" .$nextquery. "<br/>";
   echo pg_last_error();
   exit;
   }
   echo "<table border='1'>
   <tr>
   <th>rank</th>
   <th>playername</th>
   <th>rushyds</th>
   <th>rushtds</th>
   <th>recyds</th>
   <th>rectds</th>
   <th>points</th>
   </tr>";
   
   while ($request = pg_fetch_object($result2)){
       echo"<tr>";
       echo"<td>".$request->rank."</td>";
       echo"<td>".$request->playername."</td>";
       echo"<td>".$request->rushyds."</td>";
       echo"<td>".$request->rushtds."</td>";
       echo"<td>".$request->recyds."</td>";
       echo"<td>".$request->rectds."</td>";
       echo"<td>".$request->points."</td>";
       echo"</tr>";
   }
   echo "</table>";
}


echo "<table border='1'>
<tr>
<th>rank</th>
<th>playername</th>
</tr>";


while ($rblist = pg_fetch_assoc($result)){
   echo"<tr>";
   echo"<td>".$rblist['rank']."</td>";
   echo"<td>".$rblist['playername']."</td>";
   echo"</tr>";
}
echo "</table>";




pg_close($db);
?>
</body>
</html>

