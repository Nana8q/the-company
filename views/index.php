<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login</title>
</head>
<body>
    <div class="bg-light">
        <div style="height: 100vh;">
            <div class="row h-100 m-0">
                <div class="card w-25 mx-auto my-auto">
                    <div class="card-header bg-white border-0 py-3">
                        <h1 class="text-center">LOGIN</h1>
                    </div>
                    <div class="card-body">
                        <form action="../actions/login-action.php" method="post" autocomplete="off">
                            <input type="text" name="username" id="" class="form-control mb-2" placeholder="USERNAME" required autofocus>
                            <input type="password" name="password" id="" class="form-control mb-5" placeholder="PASSWORD required">

                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>

                        <p class="text-center small mt-3"><a href="register.php">Create Account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>