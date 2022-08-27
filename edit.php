<?php
require 'config.php';

if($_POST){
    $title=$_POST['title'];
    $desc=$_POST['description'];
    $id=$_POST['id']; 

    $pdostatement=$pdo->prepare("UPDATE todo SET title='$title',description='$desc' WHERE id='$id'");
    $result=$pdostatement->execute();

    if($result){
        echo "<script>alert('Updated!');window.location.href='index.php';</script>";
    }
}else{
    $pdostatement=$pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
    $pdostatement->execute();
    $result=$pdostatement->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update</title>

</head>
<body>
    <div class="card">
        <div class="card-body">
            <h2>Edit Page</h2>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $result[0]['id']?>">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $result[0]['title']?>" required>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" id="" ><?php echo $result[0]['description']?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="" value="Update">
                    <a href="index.php" type="button" class="btn btn-warning" name="">Back</a>

                </div>
            </form>
        </div>
    </div>
</body>
</html>