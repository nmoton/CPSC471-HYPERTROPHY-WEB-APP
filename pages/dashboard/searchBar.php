<?php
//note: error reporting has been turned off, comment out
//the following line when updating the code.
error_reporting(0);
$connect = mysqli_connect("localhost", "root", "", "471proj");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "SELECT * FROM user WHERE userID LIKE '%".$search."%'";
}
else
{
 //echo "type something in";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>First Name</th>
     <th>Last Name</th>
     <th>userID</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["fname"].'</td>
    <td>'.$row["lname"].'</td>
    <td>'.$row["userID"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 //echo 'Data Not Found';
}

?>