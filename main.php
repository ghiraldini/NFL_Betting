
<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","ghiraldj-db","v1bptepGowZ4t1OE","ghiraldj-db");

if($mysqli->connect_errno){
  echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Clean Water</title>

  <!-- Bootstrap -->
  <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-inverse" role="navigation">
    <div class="navbar-header">
      <a href="#" class="navbar-brand">Home</a>
    </div>

    <div>
      <ul class="nav navbar-nav pull-right">
        <li><a href="landing.html">Logout</a></li>
      </ul>
    </div>
  </nav>

  <nav class="navbar navbar-default" role="navigation">
    <ul class="nav navbar-nav pull-left">
      <li><a >Pages:</a></li>
      <li><a id="Playoff Picture" href="#" >schedule</a></li>	  
      <li><a id="Pool" href="#" >entries</a></li>
    </ul>
  </nav>
  <br>

  <!-- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ----- -->
  <!--//      ----------------------------------MATCHING  ----------------------------------------------//        ----->
  <!-- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ----- -->

  <!-- MATCH FILTERS -->
  
  <div class="container-fluid text-center" id="all_matches_div">
    <table class="table" id="matches" align="center">
      <div class="container-fluid text-center">
        <h2> All players</h2>
      </div>

      <tr>
        <th>ID </th>
        <th>First Name </th>
		<th>Last Name </th>
		<th>Rank</th>
        <th>Wins</th>
        <th>Losses</th>
		<th>Ties</th>
		<th>Win Percentage</th>
		<th>Games Back</th>
        <th>Winnings</th>
      </tr>
      <!-- MySqli statements for filling table -->
      <?php
      if(!($stmt = $mysqli->prepare("
      SELECT *
      FROM players
	  ORDER BY players.pct ASC" ))){
        echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
      }
      if(!$stmt->execute()){
        echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
      }
      if(!$stmt->bind_result($pid, $fname, $lname, $rank, $wins, $losses, $ties, $pct, $gb, $money)){
        echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
      }
      while($stmt->fetch()){
        echo "<tr>\n<td>\n" . $pid . 
		"\n</td>\n<td>\n" . $fname . 
		"\n</td>\n<td>\n". $lname . 
		"\n</td>\n<td>\n" . $rank .  
		"\n</td>\n<td>\n". $wins .  
		"\n</td>\n<td>\n". $losses .  
		"\n</td>\n<td>\n". $ties . 
		"\n</td>\n<td>\n" . $pct .
		"\n</td>\n<td>\n" . $gb .
		"\n</td>\n<td>\n" . $money .		
		"\n</td>\n</tr>";
      }

      $stmt->close();
      ?>
    </table>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
</body>
</html>


