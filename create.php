<?php
if($_POST){
    include('config/database.php');
    try{
        $query = "insert into products set name = :name,description = :description, price= :price, created= :created";
        $stmt = $con->prepare($query);
        $name = htmlentities($_POST['name']);
        $description = htmlentities($_POST['description']);
        $price = htmlentities($_POST['price']);
        $created = date('Y-m-d H:i:s',time());

        $stmt->bindParam(':name',$name );
        $stmt->bindParam(':description',$description);
        $stmt->bindParam(':price',$price);
        $stmt->bindParam(':created',$created);


        if($stmt->execute()){
           // die('here');
            echo '<div class="alert alert-success">Record saved</div>';
        }else{
            echo "ele here ";
            echo '<div class="alert alert-danger">Opps, something went wrong.</div>';
        }
    }catch(PDOException $e){
        die($e->getMessage());
    }
}else{
    die('njdhd');
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Create a Record</title>
      
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
          
</head>
<body>
  
    <!-- container -->
    <div class="container">
   
        <div class="page-header">
            <h1>Create Product</h1>
        </div>
      
    <!-- html form to create product -->
    <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control' /></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name='description' class='form-control'></textarea></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type='text' name='price' class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='index.php' class='btn btn-danger'>Back to read products</a>
            </td>
        </tr>
    </table>
</form>
          
    </div> <!-- end .container -->
      
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</body>
</html>
