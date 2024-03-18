<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
    <title>Register</title>
</head>
<body class="bg-light">
    <div style="height: 100vh"> <!-- vh = view for height, similar to 100% -->
        <div class="row h-100 m-0">
            <div class="card w-25 mx-auto my-auto">
                <div class="card-header bg-white border-0 py-3">
                    <h1 class="text-center">REGISTER</h1>
                </div>
                
                <div class="card-body">
                    <form action="..//actions/register-action.php" method="post" autocomplete="off">
                        <div class="mb-3">
                            <label for="first-name" class="form-label">Firstname</label>
                            <input type="text" name="first_name" id="first-name" class="form-control" autofocus required>
                        </div>

                        <div class="mb-3">
                            <label for="last-name" class="form-label">Lastname</label>
                            <input type="text" name="last_name" id="last-name" class="form-control" required>
                        </div>
                        
                        <!-- Bold for emphasis -->
                        <div class="mb-3">
                            <label for="username" class="form-label fw-bold">Username</label>
                            <input type="text" name="username" id="username" class="form-control fw-bold" maxlength="15" required>
                        </div>

                        <div class="mb-5">
                            <label for="password" class="form-label fw-bold">Password</label>
                            <input type="password" name="password" id="password" class="form-control fw-bold" minlength="8" aria-describedBy="password-info" required>
                            <div class="form-text" id="password-info">
                                Password must be at least 8 chatacters long.
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Register</button>

                    </form>
                    <p class="text-center mt-3 small">Registered already? <a href="../views">Login</a></p>
                    <p class="text-center mt-3 small">Kredo @ 2024</p>
                    <p class="text-center mt-3 small">Test it a test update</p>
                </div>
            </div>
        </div>
    </div>

    <!-- it's not necessary  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>