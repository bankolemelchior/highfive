<?php 

class UsersController {
    private $userName;
    private $email;
    private $password;
    private $confPassword;
    private $check;


    public function __construct($u_userName, $u_email, $u_password, $u_confPassword, $check) {
        $this->userName= $u_userName;
        $this->email=  $u_email;
        $this->password = $u_password;
        $this->confPassword = $u_confPassword;
        $this->check = $check;
    }


    public function valideInput() {
        $this->emptyInputs();
        $this->validateUsername();
        $this->validateUseremail();
        $this->pwdMath();
        $this->checkbox();
    }


        /**
         * verifier si les inputs sont reseignés
         * @return boolean
         */
    public function emptyInputs() {
        if(empty($this->userName) || empty($this->email) || empty($this->password) || empty($this->confPassword)) {

            header("Location: /pages/register?msg=Tous les champs sont requis&username=$this->userName&email=$this->email");
            exit();
        }else {

            return false;
        }
    }

    public function validateUsername() {
        // correspond à un username commençant par un caractère alphabétique suivi d'un ou plusieurs caractères alphabétique|nombres|@|_|-
        if(!preg_match("/^\w[A-Za-z0-9_\-@]+$/i", $this->userName)) {

            header("Location: /pages/register?msg=Nom d'utilisateur invalide&username=$this->userName&email=$this->email");
            exit();
        }
        return false;
    }

    public function validateUseremail() {

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            header("Location: /pages/register?msg=Adresse email invalide&username=$this->userName&email=$this->email");
            exit();
        }
        return false;
    }

    public function pwdMath() {
        if(strlen($this->password) >= 6) {
            if(!preg_match("/d+/i", $this->password)) {

                if($this->password !== $this->confPassword) {
        
                    header("Location: /pages/register?msg=Mot de passe non conforme&username=$this->userName&email=$this->email");
                    exit();
                }
                return false;
            } else {

                header("Location: /pages/register?msg=Votre mot de passe doit contenir des caractères alpha numériques&username=$this->userName&email=$this->email");
                exit();
            }
            
        }else {
            header("Location: /pages/register?msg=Votre mot de passe doit être supérieur à caractères&username=$this->userName&email=$this->email");
            exit();
        }


    }

    public function checkbox() {

        if(!isset($this->check)) {
            header("Location: /pages/register?msg=Acceptez les conditions d'utilisation&username=$this->userName&email=$this->email");
            exit();
        }
        return false;
    }
}

?>