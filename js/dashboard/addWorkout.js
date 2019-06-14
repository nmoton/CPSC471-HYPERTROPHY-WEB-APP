/*
This function will take data from the "add an exercise" form and store it in the "current workout" table after a button is pressed.
.
Function Author: 1bestCsharp Blog
Source: http://1bestcsharp.blogspot.com/2017/01/javascript-add-row-to-html-table-.html
*/
function addWorkout() {
    //Get form values
    var exercise = document.getElementById('exercise').value;
    var weight = document.getElementById('weight').value;
    var sets = document.getElementById('sets').value;
    var reps = document.getElementById('reps').value;
                  
    //Select the tables in the HTML file
    //0 = The first table in the HTML file
    var table = document.getElementsByTagName('table')[0];
                  
    //Insert an empty row somewhere in the table:
    //Index 0 = top of the table (including table headers)
    //Index 1 = top of table (under the table headers)
    //Index table.rows.length = last row of the table
    var newRow = table.insertRow(1);
                  
    //Insert the cells into the new empty row
    var cell1 = newRow.insertCell(0);
    var cell2 = newRow.insertCell(1);
    var cell3 = newRow.insertCell(2);
    var cell4 = newRow.insertCell(3);
                  
    //Populate the new cells
    cell1.innerHTML = exercise;
    cell2.innerHTML = weight;
    cell3.innerHTML = sets;
    cell4.innerHTML = reps;

    //Reset the form fields
    document.getElementById("form-exercise").reset();
} 