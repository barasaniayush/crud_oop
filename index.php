<?php
include 'controller.php';

$crud = new Crud();

if (isset($_POST['submit'])) {
    $crud->insertRecord($_POST);
}

if (isset($_POST['update'])) {
    $crud->updateRecord($_POST);
}

if (isset($_GET['deleteid'])) {
    $deleteid = $_GET['deleteid'];
    $crud->deleteRecord($deleteid);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>CRUD Project</title>
</head>

<body>
    <a href="add.php"><button class="btn btn-primary m-5">Add New User</button></a>
    <div class="container m-5">
        <h4>Display Records</h4>
        <table class="table table-dark table-striped">
            <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>
            <?php
            $data = $crud->displayRecord();
            $sn = 1;
            foreach ($data as $value) {
            ?>
                <tr class="text-center">
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $value['name']; ?></td>
                    <td><?php echo $value['email']; ?></td>
                    <td><?php echo $value['address']; ?></td>
                    <td><?php echo $value['phone']; ?></td>
                    <td><?php echo $value['gender']; ?></td>
                    <td>
                        <a href="add.php?updateid=<?php echo $value['id']; ?>"><button class="btn btn-primary">Edit</button></a>
                        <a href="index.php?deleteid=<?php echo $value['id']; ?>"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>