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

<?php

$db = pg_connect('host=localhost port=5432 dbname=nfl_project user=cody');

if (!$db){#spitting out error incase connection with the DB fails
   echo "An error occurred with pg_connect. \n" .$db. "<br/>";
   echo pg_last_error();
   exit;
}

$query = "SELECT * FROM top20rbs";
$result = pg_query($db, $query);

if (!$result){#another error indicator
   echo "An error occurred with pg_query. \n" .$query. "<br/>";
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


while ($rbtable = pg_fetch_assoc($result)){
   echo"<tr>";
   echo"<td>".$rbtable['rank']."</td>";
   echo"<td>".$rbtable['playername']."</td>";
   echo"<td>".$rbtable['rushyds']."</td>";
   echo"<td>".$rbtable['rushtds']."</td>";
   echo"<td>".$rbtable['recyds']."</td>";
   echo"<td>".$rbtable['rectds']."</td>";
   echo"<td>".$rbtable['points']."</td>";
   echo"</tr>";
}
echo "</table>";


pg_close($db);
?>
</body>
</html>



