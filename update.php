<?php
  include "connection.php";
  $id="";
  $name="";
  $price="";
  $description="";

  $error="";
  $success="";

  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['id'])){
      header("location:laba_web_4/index.php?page=list");
      exit;
    }
    $id = $_GET['id'];
    $sql = "select * from smth1 where id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    while(!$row){
      header("location: laba_web_4/index.php?page=list");
      exit;
    }
    $name=$row["name"];
    $price=$row["price"];
    $description=$row["description"];

  }
  else{
    $id = $_POST["id"];
    $name=$_POST["name"];
    $price=$_POST["price"];
    $description=$_POST["description"];

    $sql = "update smth1 set name='$name', price='$price', description='$description' where id='$id'";
    $result = $conn->query($sql);
    
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" class="fw-bold">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">List products</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.php">Add New</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="col-lg-6 m-auto">
        <form method="post"><br><br>
            <div class="card">
                <div class="card-header bg-warning">
                    <h1 class="text-white text-center">  Update Member </h1>
                </div><br>
                <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control" required  "> <br>
                <label> NAME: </label>
                <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" required  "> <br>
                <label> PRICE: </label>
                <input type="number" name="price" value="<?php echo $price; ?>" class="form-control" required  "> <br>
                <label> DESCRIPTION: </label>
                <input type="text" name="description" value="<?php echo $description; ?>" class="form-control"> <br>
                <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
                <a class="btn btn-info" type="submit" name="cancel" href="index.php?page=list"> Cancel </a><br>
            </div>
        </form>
    </div>
</body>
</html>