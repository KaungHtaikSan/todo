<?php

require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>

</head>
<body>
    <?php
    $pdostatement=$pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
    $pdostatement->execute();
    $result=$pdostatement->fetchAll();
    ?>
    <div class="card">
        <div class="card-body">
            <h2>Index Page</h2>
            <a href="add.php" type="button" class="btn btn-success">Create New</a><br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                        if ($result) {
                            foreach($result as $value){
                    ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $value['title']?></td>
                        <td><?php echo $value['description']?></td>
                        <td><?php echo date('Y-m-d',strtotime($value['created_at']))?></td>
                        <td>
                            <a type="button" class="btn btn-warning" href="edit.php?id=<?php echo $value['id'];?>">Edit</a>
                            <a href="delete.php?id=<?php echo $value['id'];?>" type="button" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php
                        $i++;
                                
                            }
                        }
                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>