<?php
    session_start();

    require_once "../classes/User.php";

    $user_obj = new user;
    $user = $user_obj->getUser($_SESSION['id']); //marywatson -> id = 1
    //  print_r($users); //for testing purpose,
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Style CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    
    <title>Edit User</title>
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark" style="margin-bottom: 80px;">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">The Company</h1> <!-- it's ok for use h3 tag, there is a slight different which is not seen -->
            </a>
            <div class="navbar-nav">
                <span class="navbar-text"><?= $_SESSION['fullname'] ?></span>
                <form action="../actions/logout-action.php" method="post" class="d-flex ms-2">
                    <button type="submit" class="btn btn-danger text-danger bg-transparent border-0">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="row justify-content-center gx-0">
        <div class="col-4">
            <h2 class="text-center mb-4">EDIT USER</h2>

            <!-- enctype="multipart/form-data" = encodingtype : png, tiff, jpeg, jpg | which is set as input file, accept="image/*"-->
            <form action="../actions/edit-user-action.php" method="post" enctype="multipart/form-data" class="">
                <div class="row justify-content-center mb-3">
                    <div class="col-6">
                        <?php
                            if($user['photo']){
                        ?>
                            <img src="../assets/images/<?= $user['photo'] ?>" alt="<?= $user['photo'] ?>" class="d-block mx-auto edit-photo">
                        <?php
                            } else {
                        ?>
                            <i class="fa-solid fa-user text-secondary d-block text-center edit-icon" style="font-size: 7em;"></i>
                        <?php
                            }
                        ?>

                        <input type="file" name="photo" id="" class="form-control mt-2" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="first-name" class="form-label">Firstname</label>
                        <input type="text" name="first_name" id="first-name" class="form-control" value="<?=$user['first_name']?>" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="last-name" class="form-label">Lastname</label>
                        <input type="text" name="last_name" id="last-name" class="form-control" value="<?=$user['last_name']?>" required> 
                    </div>
                    <div class="mb-4">
                        <label for="username" class="form-label fw-bold">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?=$user['username']?>" required> 
                    </div>
                    
                    <!-- Cancel and Save button -->
                    <div class="text-end">
                        <a href="dashboard.php" class="btn btn-secondary btn-sm">Cancel</a>
                        <button type="submit" class="btn btn-warning btn-sm px-5">Save</button>
                    </div>
                </div>
            


            </form>
        </div>
    </main>


    
</body>
</html>