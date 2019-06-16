<?php
//https://www.webslesson.info/2016/03/ajax-live-data-search-using-jquery-php-mysql.html

//note: error reporting has been turned off, comment out
//the following line when updating the code.
error_reporting(0);
//establish connection to the database
$connect = mysqli_connect("localhost", "root", "", "471proj");
$output = '';
//if query is not empty, retrieve execute it.
if(isset($_POST["query"]))
{
//look for a userID in the user table that matches what is entered
//in the search bar.
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "SELECT * FROM user WHERE userID LIKE '%".$search."%'";
}
else
{
 //echo "type something in";
}
//Display query results in a table format and there is a button that
//will lead to the user's personal wall if the original frontend
//card layout cannot be done for deadline. 
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
//table headings
 $output .= '

 <div class="table-responsive">
  <div class="align-items-center">
   <table class="table table bordered">
    <tr>
     <th>First Name</th>
     <th>Last Name</th>
     <th>userID</th>
    </tr>
  </div>
 ';
 while($row = mysqli_fetch_array($result))
 {
  //store the user's first name, last name, and id under the appropriate columns
  //these are the actual contents of the table.
  $output .= '
   <tr>
    <td>'.$row["fname"].'</td>
    <td>'.$row["lname"].'</td>
    <td>'.$row["userID"].' </td>
    <td><button type="button" class="btn primary">View Personal Wall</button></td>
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