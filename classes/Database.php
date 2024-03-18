<?php
    class Database{
        #Define properties
        private $server_name = "localhost"; //XAMPP or MAMP
        private $username = "root"; //username by default
        private $password =""; //Empty for XAMPP, "root" for MAMP
        private $db_name = "the_company"; //the name of the database
        protected $conn;

        #Define the constructor
        public function __construct(){
            $this->conn = new mysqli($this->server_name, $this->username, $this->password, $this->db_name); //"mysqli()" is a built-in class file in php
            # Note: in my sqli() it also have properties (variables) and methods (functions) that we can call in order to use it.

            # Check if there is no error in connecting to the database
            if ($this->conn->connect_error) { //Boolean: true or false
                die("Unable to connect to the database." . $this->conn->connect_error);
            } // this if statement is not necessary, because user class extends 
        }
    }

// if this files only has php code, you don't need closing tag
?> 