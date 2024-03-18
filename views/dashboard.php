<?php
    session_start();

    require_once "../classes/User.php";

    $user_obj = new user;
    $all_users = $user_obj->getAllUsers();
    // print_r($all_users); for testing purpose,
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

    <title>Dashboard</title>
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

    <main class="row justify-content-center gx-o">
        <div class="col-6">
        <h2 class="textcenter">User Lists</h2>

        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>ID</th>
                    <th>FIRSTNAME</th>
                    <th>LASTNAME</th>
                    <th>USERNAME</th>
                    <th>EDIT|DELETE</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    while ($user = $all_users->fetch_assoc()) {
                ?>
                    <tr>
                        <td>
                            <?php
                                if($user['photo']){
                            ?>
                                <img src="../assets/images/<?=$user['photo']?>" alt="<?= $user['photo']?>" class="d-block mx-auto dashboard-photo">
                            <?php
                            } else {   
                            ?>
                                <i class="fa-solid fa-user text-secondary d-block text-center dashboard-icon"></i>
                            <?php
                                }
                            ?>
                        </td>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['first_name'] ?></td>
                        <td><?= $user['last_name'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td>
                            <?php
                                if($_SESSION['id'] === $user['id']) { //true
                            ?>
                                <a href="edit-user.php" class="btn btn-warning" title="Edit">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="delete-user.php" class="btn btn-danger" title="Delete">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>

                <?php
                }
                ?>
            </tbody>

        </table>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    
</body>
</html>