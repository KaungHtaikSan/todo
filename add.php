<?php
require 'config.php';
if ($_POST) {
    $title=$_POST['title'];
    $desc=$_POST['description'];

    $sql ="INSERT INTO todo(title,description) VALUES (:title,:description)";
    $pdostatement=$pdo->prepare($sql);
    $result = $pdostatement->execute(
        array(
            ':title'=>$title,
            ':description'=>$desc
        )
    );

    if($result){
        echo "<script>alert('New Todo is added');window.location.href='index.php';</script>";
    }
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New</title>

</head>
<body>
    <div class="card">
        <div class="card-body">
            <h2>Create New</h2>
            <form action="add.php" method="post">
                
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" required><br><br>
                
                
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" id=""></textarea><br><br>
                
                
                    <input type="submit" class="btn btn-primary" name="" value="Add">
                    <a href="index.php" type="button" class="btn btn-warning" name="">Back</a>

                
            </form>
        </div>
    </div>
</body>
</html>