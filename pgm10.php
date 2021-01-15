<?php
header('Content-Type: text/plain');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "weblab";
$usnArray=[];
$nameArray= [];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error); // die() prints msg and exit the program
}
$sql = "SELECT * FROM student";
$result = $conn->query($sql);
echo "Before sorting \n";
    while($row = $result->fetch_assoc()){
      echo $row["usn"];
      echo " ";
      echo $row["name"];
      echo " ";
      array_push($usnArray,$row["usn"]);
      $nameArray[$row["usn"]] = $row["name"];
      echo "\n";
    }
echo "\nafter sorting \n";
$n=count($usnArray);
for ( $i = 0 ; $i < $n ; $i++ ) // ($n - 1)  i want the index not the count
    {
      $pos= $i;
      for ( $j = $i + 1 ; $j < $n ; $j++ ) {
        if ( $usnArray[$j] < $usnArray[$pos] )
        $pos= $j;
    }
    //swap
      $temp = $usnArray[$i];
      $usnArray[$i] = $usnArray[$pos];
      $usnArray[$pos] = $temp;
}
foreach(  $usnArray as $value ){
	echo($value);
	echo" ";
	echo $nameArray[$value];
	echo"\n";
}
$conn->close();
?>