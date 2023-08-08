<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$inserted=false;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";


//Create table in  connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// // sql to create table
// $sql = "CREATE TABLE Notes (
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// title VARCHAR(30) NOT NULL,
// descript VARCHAR(30) NOT NULL,
// reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";

// if ($conn->query($sql) === TRUE) {
//   echo "Table MyGuests created successfully";
// } else {
//   echo "Error creating table: " . $conn->error;
// }



if(isset($_GET['delete']))
{
  $sno=$_GET['delete'];
  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM Notes WHERE id='$sno'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

 
}


//Insert into database
if ($_SERVER["REQUEST_METHOD"] == "POST") {


if(isset($_POST['sno']))
{
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$newTitle = $_POST['etitle'];
$id=$_POST["sno"];
// echo "This is id value: ".$id." piyush";
// $sno = 4; // Replace with the actual serial number you want to update

// Assuming you have variables for the new values you want to set
$newTitle = $_POST['etitle'];
$newContent = $_POST['edesc'];

// Construct and execute the update query
$sql = "UPDATE notes SET title='$newTitle', descript='$newContent' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}


   
}
 else
  { 
     $title = $_POST['title'];
    $desc = $_POST['desc'];
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO Notes (title, descript)
VALUES ('$title', '$desc')";

if ($conn->query($sql) === TRUE) {
  $inserted=true;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

    // collect value of input field
   
   
  }
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// $p='Database';
// $q='This is my first note project';

// $sql = "INSERT INTO Notes (title, descript)
// VALUES ('$p', '$q')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }





// select data from database
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// $sql = "SELECT id, firstname, lastname FROM Notes";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//   }
// } else {
//   echo "0 results";
// }





//Select data with condition from database
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// $x="Maurya";
// $sql = "SELECT id, firstname, lastname FROM MyGuests WHERE lastname='$x'";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//   }
// } else {
//   echo "0 results";
// }




//Update data from database
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// $w='Piyush';
// $sql = "UPDATE MyGuests SET lastname='$w' WHERE id=2";

// if ($conn->query($sql) === TRUE) {
//   echo "Record updated successfully";
// } else {
//   echo "Error updating record: " . $conn->error;
// }




//delete data from database
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// // sql to delete a record
// $sql = "DELETE FROM MyGuests WHERE id=4";

// if ($conn->query($sql) === TRUE) {
//   echo "Record deleted successfully";
// } else {
//   echo "Error deleting record: " . $conn->error;
// }

//  $conn->close();


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <title>Hello, world!</title>
  </head>
  <body>


<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
      <form action="/Php_Test/" method="post">
      <input type="hidden" value="hot" name="sno" id="sno_id" **/>**
  <div class="form-group">
    <label for="etitle">Note title</label>
    <input type="text" class="form-control" name="etitle" id="etitle"aria-describedby="emailHelp" placeholder="Enter title">
   </div>
  <div class="form-group">
    <label for="edesc">Note Description</label>
    <input type="text" class="form-control" id="edesc" name="edesc" placeholder="Description">
  </div>
 
  <button type="submit" class="btn btn-primary">Update</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">ToDo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact us </a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<?php
if($inserted)
{
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your Notes added successfuly.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
?>
<div class="container my-4">
    <h2>Add Notes Here</h2>
<form action="/Php_Test/" method="post">
  <div class="form-group">
    <label for="title">Note title</label>
    <input type="text" class="form-control" name="title" id="title"aria-describedby="emailHelp" placeholder="Enter title">
   </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Note Description</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="desc" placeholder="Description">
  </div>
 
  <button type="submit" class="btn btn-primary">Add Notes</button>
</form>

<div class="container">

<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, title, descript FROM Notes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $no=0;
  while($row = $result->fetch_assoc()) {
    $no+=1;
    echo "<tr> <th scope='row'>" . $no. " </th> <td>" . $row["title"]. "</td><td> " . $row["descript"]. "</td> <td>   <button id='". $row["id"]."' class='edit btn btn-primary'>Edit</button> <button id='d". $row["id"]."' class='delete btn btn-primary'>Delete</button>  </td></tr>";
  }
} else {
  echo "0 results";
}
?>

    <!-- <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr> -->
   


  </tbody>
</table>

</div>

</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
let table = new DataTable('#myTable');

        </script>
        <script>
             edits=document.getElementsByClassName("edit");;
             Array.from(edits).forEach((element)=>{
               element.addEventListener('click',(e)=>{
               //console.log("Edit",e.target.parentNode.parentNode);
               sno=e.target.id
               tr=e.target.parentNode.parentNode;
               console.log(tr)
                title=tr.getElementsByTagName("td")[0].innerText;
                desc=tr.getElementsByTagName("td")[1].innerText;
                console.log(title,desc);
               
                etitle.value=title;
                edesc.value=desc;
                sno_id.value=e.target.id;
                console.log("This is id",sno);
                 $('#editModal').modal('toggle');

               })
             });
             deletes=document.getElementsByClassName("delete");
    Array.from(deletes).forEach((element)=>{
      element.addEventListener("click",(e)=>{
        // console.log("edit ",e.target.parentNode.parentNode);
       if(confirm("Press a button!"))
       {
        console.log(e.target.id);
        sno=e.target.id.substr(1,);
        window.location=`/Php_Test/?delete=${sno}`;
        console.log("Yes")
       }else{
        console.log("NO")
       }
      })
    });
            </script>
  </body>
</html>
