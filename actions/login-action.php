<?php
    include "../classes/User.php";

    # Create/Instantiate an object
    $user = new User;

    # Call the login method
    $user->login($_POST);
?>