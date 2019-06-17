<?php
//https://www.webslesson.info/2016/03/ajax-live-data-search-using-jquery-php-mysql.html

//note: error reporting has been turned off, comment out
//the following line when updating the code.
error_reporting(0);
//establish connection to the database
$connect = mysqli_connect("localhost", "root", "", "471proj");
$output = '';
//if query is not empty, retrieve execute it.
if(isset($_POST["search"]))
{
//look for a userID in the user table that matches what is entered
//in the search bar.
 $search = mysqli_real_escape_string($connect, $_POST["search"]);
 $query = "SELECT * FROM user WHERE userID LIKE '%".$search."%'";

 echo '<nav class="navbar fixed-top navbar-dark fixed-top-2">';
        echo '<div class="container">';
        echo '<ul class="navbar-nav" id="back">';
            echo '<li class="nav-item active">';
                echo '<i class="fas fa-arrow-circle-left fa-2x"></i>';
            echo '</li>';
        echo '</ul>';
        echo '<ul class="navbar-nav mx-auto">';
            echo '<li class="nav-item active">';
                echo '<a class="nav-link" href="#"> "' . $_POST["search"] . '"</a>';
            echo '</li>';
        echo '</ul>';
    echo '</div>';
    echo '</nav>';
 echo '<div class="container" id="search-result-area">';
}
else
{
  echo '<nav class="navbar fixed-top navbar-dark fixed-top-2">';
        echo '<div class="container">';
        echo '<ul class="navbar-nav" id="back">';
            echo '<li class="nav-item active">';
                echo '<i class="fas fa-arrow-circle-left fa-2x"></i>';
            echo '</li>';
        echo '</ul>';
        echo '<ul class="navbar-nav mx-auto">';
            echo '<li class="nav-item active">';
                echo '<a class="nav-link" href="#"> "' . $_POST["search"] . '"</a>';
            echo '</li>';
        echo '</ul>';
    echo '</div>';
    echo '</nav>';
}
//Display query results in a table format and there is a button that
//will lead to the user's personal wall if the original frontend
//card layout cannot be done for deadline. 
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_array($result))
 {
  //store the user's first name, last name, and id under the appropriate columns
  //these are the actual contents of the table.
  echo '<div class="container" id="dashboard-post">';
            echo '<div class="card">';
                echo '<div class="card-header">';
                    echo '<div class="align-items-center">';
                        echo '<h5>' . $row['fname'] . ' ' . $row['lname'] . '</h5>';
                        echo '<h6>UID: #000' . $row['userID'] . '</h6>';
                    echo '</div>';
                echo '</div>';
                echo '<div class="card-body">';
                    echo '<p>' . $row['bAge'] . ' Year(s) Old,  ' . $row['gender'] . '</p>';
                    echo '<button type="button" class="btn primary">View User Wall</button>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
 }
 echo '</div>';
?>