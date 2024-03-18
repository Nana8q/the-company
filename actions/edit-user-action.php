<?php
    include "../classes/User.php";

    # Create/Instantiate an object
    $user = new User;

    # Call the method
    # Note: The update method is doing the actual update
    $user->update($_POST, $_FILES); // if files included, $_FILES will be needed
    // The $_POST --- holds the data like first_name, last_name and username
    // The $_FILES --- holds the fild (image file) uploaded from the form
?>