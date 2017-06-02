<?php
require '../controller/Handling_form_validate.php';
require '../controller/Student_controller.php';
$student_controller = new Student_controller();
if (isset($_POST['btnAddNew'])) {
    $avatar = $_FILES['avatar']['name'];
    if ($avatar != NULL) {
        if ($_FILES['avatar']['type'] == "image/jpeg"
            || $_FILES['avatar']['type'] == "image/png"
            || $_FILES['avatar']['type'] == "image/gif"
        ) {
            if ($_FILES['avatar']['size'] > 2097152) {
                echo "File have to smaller than 2MB";
            } else {
                $handling_form = new Handling_form_validate();
                $handling_form->form_validate($_POST['txtID'], $_POST['txtName'], $_POST['txtEmail'], $avatar);
                $students = $student_controller->getAllStudents();
                $tmp_name = $_FILES['avatar']['tmp_name'];
                $name = $_FILES['avatar']['name'];
                move_uploaded_file($tmp_name,'./upload/'.$name);
            }
        }
        else
        {
            echo "Invalid file type";
        }

    }
    else
    {
        echo "Choose your avatar please!";
    }
}
if (isset($_POST['btnUpdate'])) {
    $avatar = $_FILES['avatar']['name'];
    $students = $student_controller->updateStudent($_POST['txtID'], $_POST['txtName'], $_POST['txtEmail'], $avatar);
}
if (isset($_POST['btnDelete'])) {
    $student_id = $_POST['student_id'];
    $students = $student_controller->deleteStudent($student_id);
    unlink('./upload/'.$_POST['avatar']);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" action="" enctype="multipart/form-data">
    <table cellpadding="5" cellspacing="0">
        <tr>
        <tr>
            <td>ID:</td>
            <td><input type="text" name="txtID"
                       value="<?php echo isset($_POST['txtID']) ? $_POST['txtID'] : '' ?>">
                <?php echo isset($_SESSION['error']['id']) ? $_SESSION['error']['id'] : '' ?></td>
        </tr>
        <td>Your name:</td>
        <td><input type="text" name="txtName"
                   value="<?php echo isset($_POST['txtName']) ? $_POST['txtName'] : '' ?>">
            <?php echo isset($_SESSION['error']['name']) ? $_SESSION['error']['name'] : '' ?></td>
        </tr>
        <tr>
            <td>Your email:</td>
            <td><input type="text" name="txtEmail"
                       value="<?php echo isset($_POST['txtEmail']) ? $_POST['txtEmail'] : '' ?>">
                <?php echo isset($_SESSION['error']['email']) ? $_SESSION['error']['email'] : '' ?></td>
        </tr>
        <tr>
            <td>Avatar:</td>
            <td><input type="file" name="avatar" size="20"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btnAddNew" value="Add">
                <input type="submit" name="btnUpdate" value="Update"></td>
        </tr>

    </table>
</form>
<table border="1" cellspacing="0" cellpadding="0">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Avatar</td>
        <td>Delete</td>
    </tr>
    <?php if (isset($students)) { foreach ($students as $item) { ?>
        <tr>
            <td><?php echo $item['student_id'] ?></td>
            <td><?php echo $item['student_name'] ?></td>
            <td><?php echo $item['student_email'] ?></td>
            <td><?php echo $item['avatar'] ?></td>
            <td>
                <form method="post">
                    <input type="hidden" value="<?php echo $item['student_id']; ?>" name="student_id"/>
                    <input type="hidden" value="<?php echo $item['avatar']; ?>" name="avatar"/>
                    <input type="submit" name="btnDelete" value="Delete"
                           onclick="return confirm('Are you sure to delete this student?')">
                </form>
            </td>
        </tr>
    <?php }} ?>
</table>

</body>
</html>