<?php
    # include -> if missing, the program will run but get an error (Not so strict)
    # require_once -> if missing, the program will halt, an error will run the program below it (More strict)
    require_once "Database.php";

    # Note; The logic of our application e.g. (CRUD - CREATE, READ, UPDATE, DELETE) will be in this class file
    class User extends Database{
        # store function
        public function store($request){
            $first_name = $request['first_name'];
            $last_name = $request['last_name'];
            $username = $request['username'];
            $password = $request['password'];

            # Apply hashing algorithm
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            # SQL Query string
            $sql = "INSERT INTO users(`first_name`, `last_name`, `username`, `password`) 
            VALUES('$first_name', '$last_name', '$username', '$hashed_password')";

            # Execute the query string
            # The $this->conn --- came from the Database class
            if ($this->conn->query($sql)) {
                header('location: ../views'); //go to index.php or login.php.page... we will later on
                exit;
            } else {
                die('Error in creating the user: ' . $this->conn->error);
            }
        } // end of store function

        # login function
        public function login($request){ //username and password
            $username = $request['username'];
            $password = $request['password'];
        
            # Query string
            $sql = "SELECT * FROM users WHERE username = '$username'";

            $result = $this->conn->query($sql);

            # Check the username
            if($result->num_rows == 1) {
                # Check the password
                $user = $result->fetch_assoc();
                # $user = ['id' => 1, 'username' => 'john', 'password' => '$2uy10c9...'];

                if (password_verify($password, $user['password'])) { // if the password matched
                    # Create a session variables for future use
                    session_start();
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['fullname'] = $user['first_name'].' '.$user['last_name']; //inside [], it has to be matched to the field name of the table

                    header('location:../views/dashboard.php');
                } else {
                    die('password is incorrect');
                }
            } else {
                die('username does not exist');
            }
        } // end of login function

        # logout function
        public function logout(){
            session_start(); //start this to use session variables, it can be removable because session_start is on the top of dashboard
            session_unset(); //execute this to unset the session variables set in the login method
            session_destroy(); //destroy|remove the session variables from the memory

            header("location: ../views"); //redirect the user to the login page
            exit;
        }   

        # Retrieve all the users in the users table
        public function getAllUsers(){
            $sql = "SELECT id, first_name, last_name, username, photo FROM users";
            
            if($result = $this->conn->query($sql)) {
                return $result;
            } else {
                die("Error in retrieving users." . $this->conn->error);
            }
        }

        # Retrieved one user
        # Note: The %id is the id of the user we want to retrieve
        public function getUser($id){
            $sql = "SELECT * FROM users WHERE id = $id";

            if($result = $this->conn->query($sql)){
                return $result->fetch_assoc();
            } else {
                die("ERROR in retrieving one user." . $this->conn->error);
            }
        } 

        # $_POST($request), $_FILES ($files)
        public function update($request, $files){
            session_start();
            $id = $_SESSION['id']; //marywatson --- 1 
            $firstname = $request['first_name'];
            $lastname = $request['last_name'];
            $username = $request['username'];
            
            # Note: The file is handled differently
            $photo =$files['photo']['name']; //my_avater.png
            // The 'photo' is the name of the input field from the form
            // The 'name' --- the name of the file
            // Wat e veb buys

            // The 'photo' is the name of the input field from the form
            // The 'tmp_name' refers to the temporary storage of our computer where the image is teporarily saved
            $photo_tmp =$files['photo']['tmp_name']; 

            // Query string to update the firstname, lastname and username
            $sql = "UPDATE users SET first_name = '$firstname', last_name = '$lastname',  username = '$username' WHERE id = $id";

            // Execute the query string above
            if ($this->conn->query($sql)){ //assigning the new updated session variable
                $_SESSION['username'] =$username;
                $_SESSION['fullname'] ="$first_name $last_name";

                # If there is an uploaded photo, save it t the Fb and save file to do images folder
                if($photo) { // is it true thst the user uploaded a photo?
                    $sql = "UPDATE users SET Photo = '$photo' WHERE id = $id "; //$id is not string so no need ''
                    // file destination folder
                    $destination = "../assets/images/$photo";

                    // Execute the query above to save the image to the DB, and move the uploaded file
                    if($this->conn->query($sql)) {
                        if(move_uploaded_file($photo_tmp, $destination)) {
                            header('location: ../views/dashboard.php');
                            exit;
                        } else {
                            die("Error in moving the photo."); // image has too large size that php can't handle it/ If user upload not img file/ internet network problem 
                        }
                    } else {
                        die("Error in uploading photo: " . $this->conn->error);
                    }
                }
                header ('location: ../views/dashboard.php');
                exit;
            } else {
                die("Error in updating the user. " . $this->conn->error);
            }
        } // end of update function

        public function delete(){
            session_start();
            $id = $_SESSION['id']; //marywatson --- 1 

            # QUery string
            $sql = "DELETE FROM users WHERE id = $id";

            if($this->conn->query($sql)){
                $this->logout(); // call logout function, contains header('location; ../views') -- login page
            } else {
                die("Error in deleting your account. " . $this->conn->error);
            }
        } // end of delete function

    }

?>