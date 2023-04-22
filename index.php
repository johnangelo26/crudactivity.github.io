<?php 
$server = "127.0.0.1";
$username  = "root";
$password = "";
$db = "librarydb";
$conn = new mysqli($server, $username, $password, $db); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Library CRUD Activity</title>
</head>
<body>
    <h1>Book Library</h1>
  
    <form method="post">
        <p>
        <label for="id">Id:</label>
        <input type="text" name="id" id="id">
        </p>

        <p>
        <label for="book">Book Title:</label>
        <input type="text" name="book" id="book">
        </p>

        <p>
        <label for="author">Author:</label>
        <input type="text" name="author" id="author">
        </p>
       
        <p>
        <label for="customer">Customer Name:</label>
        <input type="text" name="customer" id="customer">
        </p>

        <input type="submit" name="Submit" value="Submit">
    </form>

    <hr>

    <h3>User List</h3>
    <table style="width: 80%" border="1px">
        <tr>
            <th>Id</th>
            <th>Book Title</th>
            <th>Author</th>
            <th>Customer Name</th>
        </tr>
        <?php
            $sql = "SELECT * FROM library";
            $run = $conn->query($sql);
            if($run->num_rows > 0) {
                while($row = $run -> fetch_assoc()) {

          
        ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['book'] ?></td>
            <td><?php echo $row['author'] ?></td>
            <td><?php echo $row['customer'] ?></td>
        </tr>
        <?php 
                }
            }       
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>


<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "librarydb");

if($conn === false) {
   die("Error: could not connect to DB. " . mysqli_connect_error());
}

$id = $_REQUEST['id'];
$book = $_REQUEST['book'];
$author = $_REQUEST['author'];
$customer = $_REQUEST['customer'];

$sql = "INSERT INTO library VALUES('$id','$book','$author','$customer')";

if(mysqli_query($conn, $sql)) {
   echo "<script>alert(Data successfuly saved.</script>";

} else {
   echo "Error" . mysqli_error($conn);
}
mysqli_close($conn);
?>