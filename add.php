<?php
include 'controller.php';

$student = new Student();

//insert    
if (isset($_POST['submit'])) {
    $student->insertRecord();
}

if (isset($_POST['update'])) {
    $student->updateRecord($id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <a href="index.php"><button class="btn btn-success my-3">Return Home</button></a>
    <?php
        if (isset($_GET['updateid'])) {
            $updateid = $_GET['updateid'];
            $myrecord = $student->displayRecordById($updateid);
        ?>
        <h3>Update Record</h3>
            <form action="index.php" method="post">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="name" value="<?php echo $myrecord['name']; ?>" class="form-control"><br>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" id="email" value="<?php echo $myrecord['email']; ?>" class="form-control"><br>
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="address" id="address" value="<?php echo $myrecord['address']; ?>" class="form-control"><br>
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" name="phone" id="phone" value="<?php echo $myrecord['phone']; ?>" class="form-control"><br>
                </div>
                <div class="form-group">
                    <label for="">Gender</label>
                    <input type="radio" name="gender" value="Male" id="male">Male
                    <input type="radio" name="gender" value="Female" id="female">Female<br><br>
                </div>
                <div class="form-group">
                    <input type="hidden" name="hid" value="<?php echo $myrecord['id']; ?>">
                    <input type="submit" value="Update" name="update" id="update" class="btn btn-primary">
                </div>
            </form><br>
        <?php
        } else {
        ?>
        <h3 class="my-5">Add New User</h3>
        <form action="index.php" method="post">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="name" class="form-control" required><br>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" id="email" class="form-control" required><br>
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="address" id="address" class="form-control" required><br>
            </div>
            <div class="form-group">
                <label for="">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" required><br>
            </div>
            <div class="form-group">
                <label for="">Gender</label>
                <input type="radio" name="gender" value="Male" id="male">Male
                <input type="radio" name="gender" value="Female" id="female">Female<br><br>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" name="submit" id="name" class="btn btn-primary">
            </div>
        </form><br>
        <?php } ?>
    </div>
</body>
</html>