<?php
// form handling

if ($_SERVER['REQUEST_METHOD'] = 'POST') {
    echo "<h1> Registration successful </h1>";
    echo "<div> Your details are: </div>";
    echo "<div> Name: ". htmlSpecialchars($_POST['name']). "</div>";
    echo "<div> Email: ". $_POST['email']. "</div>";
    echo "<div> Password: ". password_hash($_POST['password'], PASSWORD_DEFAULT) . "</div>";


} else {
    echo "<h1> We only accept post requests </h1>";

}







?>