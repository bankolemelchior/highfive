<?php 

require_once('Connexion.php');

class UsersModel extends Connexion {

    // private $userName;
    // private $userEmail;
    // private $userPassword;
    // private $userPicture;
    // private $userRole = "Suscriber";
    // private $userCreateDate;

    // public function __construct($un, $ue, $up, $upic, $createAt) 
    // {
    //     $this->userName = $un;
    //     $this->userEmail = $ue;
    //     $this->userPassword = $up;
    //     $this->userPicture = $upic;
    //     $this->userCreateDate = $createAt;
    // }


    //This method is to check if an email already exist in the database
    public function checkExistEmail($userEmail)
    {
        // connexion à la base de donnée
        $conn = $this->connect();
        // on vérifie si l'adresse email et le username entrés par l'utilisateur existe déjà dans la db
        $req = $conn->prepare("SELECT * FROM `blog_highFive`.users WHERE email = ? LIMIT 1");
        $req->execute(array($userEmail));
        $result = $req->fetchAll();

        return $result;

    }

    //This method is to check if a user name already exist in the database
    public function checkExistUsername($userName) 
    {
        // connexion à la base de donnée
        $conn = $this->connect();
        // on vérifie si l'adresse email et le username entrés par l'utilisateur existe déjà dans la db
        $req = $conn->prepare("SELECT * FROM `blog_highFive`.users WHERE username = ? LIMIT 1");
        $req->execute(array($userName));
        $result = $req->fetchAll();
        
        return $result;
        
    }


    //This method insert a new user
    public function newUser($userName, $userEmail, $userPassword, $userPicture, $userRole, $userCreateDate)
    {
        // connexion à la base de donnée
        $conn = $this->connect();

        $reqInsert = "INSERT INTO `blog_highFive`.users
                        VALUES (NULL, :userName, :userEmail, :userPassword, :userPicture, :userRole, :userCreateDate)";
            
        //Prepare statement
        $stmt = $conn->prepare($reqInsert);
        //Statement template
        $stmt->execute([
            ":userName" => $userName,
            ":userEmail" => $userEmail,
            "userPassword" => password_hash($userPassword, PASSWORD_DEFAULT),
            ":userPicture" =>  $userPicture,
            ":userRole" =>  $userRole,
            ":userCreateDate" =>  $userCreateDate
        ]);

    }

    public function connectUser($userEmail, $userN) 
    {
        // connexion à la base de donnée
        $conn = $this->connect();

        //Prepare statement
        $reqSelect = $conn->prepare("SELECT * FROM `blog_highFive`.users WHERE email = ? OR username = ? ");
            
        $reqSelect->execute([$userEmail, $userN]);
        $result = $reqSelect->fetchAll();
            
        return $result;
    }

        /**
     * To select all users
     */

    public function AllUsers()
    {
        // connection to the database
        $conn = $this->connect();
        // This SQL request select all Users from the database
        $req = "SELECT * FROM `blog_highFive`.users";
        $forQuery = $conn->query($req);
        $result = $forQuery->fetchAll();

        return $result;

    }

    public function oneUser($userId)
    {
        // connection to the database
        $conn = $this->connect();
        // This SQL request select one Users from the database
        $req = $conn->prepare("SELECT * FROM `blog_highFive`.users WHERE id = ?");
        $req->execute([$userId]);
        $result = $req->fetchAll();

        return $result;

    }

    public function updateRole( $role, $userId)
    {
        // connection to the database
        $conn = $this->connect();
        // This SQL request update Users role in the database
        $req = $conn->prepare("UPDATE `blog_highFive`.users SET `users`.`role` = ? WHERE id = ?");
        $req->execute([$role, $userId]);

    }

    public function deleteUser($userId)
    {
        // connection to the database
        $conn = $this->connect();
        // This SQL request delete a User from the database
        $req = $conn->prepare("DELETE FROM `blog_highFive`.users WHERE id = ?");
        $req->execute([$userId]);

    }




}