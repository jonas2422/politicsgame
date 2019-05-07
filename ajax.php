<?php

if (isset($_POST[$Veryga2])) {
  $taskai = $_POST[$name];
    $sql = "INSERT INTO pol(ip, politikas, taskai) VALUES ('$ip', '$Veryga', '$taskai')";
    if(mysqli_query($conn, $sql)){
echo "<h1>Records inserted successfully.</h1>";
} else{
echo "<h1>ERROR: Could not able to execute $sql. </h1>" . mysqli_error($conn);
}


$sqltsk = "SELECT * FROM pol WHERE politikas = '$Veryga'";
$res = mysqli_query($conn, $sqltsk);
$score = 0;
if ( mysqli_num_rows($res) > 0) {
// output data of each row
while($rw = mysqli_fetch_assoc($res)) {

$score = $score + $rw["taskai"];
echo "id: " . $rw["id"]. " - Name: " . $rw["politikas"]. " " . $rw["taskai"]. " ". $score . "<br>";
}
$balsavo= mysqli_num_rows($res);

$sqlcheck = "SELECT * FROM taskai WHERE vardas = '$Veryga'";
$rescheck = mysqli_query($conn, $sqlcheck);
if ( mysqli_num_rows($rescheck) > 0) {

$sqlupdate = "UPDATE taskai SET taskai='$score', balsvo='$balsavo' WHERE vardas='$Veryga' ";

if (mysqli_query($conn, $sqlupdate)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

}else {
$sqlins = "INSERT INTO taskai(vardas, taskai, balsvo) VALUES ('$Veryga', '$score', '$balsavo')";
if(mysqli_query($conn, $sqlins)){
echo "<h1>Records inserted successfully.</h1>";
} else{
echo "<h1>Neisejo ikelti$sqlins. </h1>" . mysqli_error($conn);
}
}


} else {
echo "0 results";
}
}
 ?>
