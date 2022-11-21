<?php
session_start();




$name = $email = $password = $image = "";
$name_error = $email_error = $password_error = $image_error = "";


//
function cleanup(string $data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

}

function uploadFile($file, $allowed_types = [], &$error_message = ''){
    $target_dir = 'uploads/';
    $target_file = $target_dir. rand() . basename($file['name']);
    $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(count($allowed_types) < 1 || in_array($file_extension, $allowed_types)){
            move_uploaded_file($file['tmp_name'], $target_file);
        } else {
            $error_message = "we only allow" . implode(',', $allowed_types);
        }
    
}

function checkEmpty($data, &$error_str){
    if(empty($data)){
        $error_str = "This input is empty!";

    }


}

function displayError($error){
    echo "<br><span style='color:red; font-size:12px'>".$error."</span>";

}


if($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Assign post data to variables after cleanup

    $name = cleanup ($_POST['name']);
    $email = cleanup ($_POST['email']);
    $password = cleanup ($_POST['password']);

    //Check if name is empty
    checkEmpty($name, $name_error);

        //Check if email is empty
    checkEmpty($email, $email_error);

        //Check if password is empty
    checkEmpty($password, $password_error);

    //validating for email to check if is empty and if its a valid email

    if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_error = "Please enter a valid email address!";

    }

    //validating for password to check if is empty and if its less tha 6 characters long
    if(!empty($password) && strlen($password) < 6){
        $password_error = "Password should be atleast 6 characters long!";

    }
    $allChecks = empty($name_error) && empty($email_error) && empty($password_error);


    if (isset($_FILES['image']['name']) &&!empty($_FILES['image']['name']) && $allChecks) {
        uploadFile($_FILES['image'], ['png', 'jpg', 'jpeg', 'gif'], $image_error);
    }else {
        $image_error = "Please select an image!";
    }


    if (empty($image_error)){
        //store a valid data in session

        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;

        //redirect to success.php(login page)
        header('location: success.php');
    
    }






}








?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype = "multipart/form-data">
        <label for="name">Name</label><br>
        <input type="text" name="name" id="name" placeholder="Enter a name" value = "<?php echo $name?>">
        <?php  echo isset($name_error) && !empty($name_error) ? displayError($name_error): '';?>
        <br><br>
        <label for="email">Email</label><br>
        <input type="text" name="email" id="email" <?php echo $email ?>>
        <?php  echo isset($email_error) && !empty($email_error) ? displayError($email_error): '';?>
        <br><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password">
        <?php  echo isset($password_error) && !empty($password_error) ? displayError($password_error): '';?>
        <br><br>
        <label for="image">Upload Profile Pic:</label><br>
        <input type="file" name="image" id="image">
        <?php  echo isset($image_error) && !empty($image_error) ? displayError($image_error): '';?>

        <br><br>
        <input type="submit" value="Register">
    
    </form>
</body>
</html>