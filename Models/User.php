<?php

           //@RR changer lea autres requires et includes
           require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/tools/db.php';

class User {

    public  $idUser;
    private $firstname;
    private $lastname;
    public $username;
    private $password;

     public function __construct($idUser =null,$username="",$password="",$firstname="",$lastname="") 
             {
        if($idUser)
        {
        
        $this->getUserFromDatabase($idUser);
        }else{
            $this->username = $username;
            $this->lastname = $lastname;
            $this->password = $password;
        }
    
    }
 
 

   /**
     * Getter and Setter
     * @return type
     */
   
    
    
    public function getFirstNameUser() {
        return $this->firstname;
    }

    public function getLastnameUser() {
        return $this->lastname;
    }

    

    public function setPasswordUser($password) {
        $this->password = $password;
    }
    public function getPasswordUser()
    {
        return $this->password;
    }
    

   

    // Va chercher les infos du client dans la base de donnees et initialise le membres de la classe
    public function getUserFromDatabase($idUser) {
        $connection = connect_db();
        $queryUser = "SELECT * from users where iduser = '" . $idUser . "'";
        $res = null;
        $res = $connection->query($queryUser);
        if ($res != null && $res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $this->idUser = $row["iduser"];
            $this->username =  $row["username"];
            $this->firstname = $row["firstname"];
            $this->lastname = $row["lastname"];
            $this->password = $row["password"];
        } else return null;
        disconnect_db($connection);
        return $this;
    }

    public function getLoginInfo() {
        $connection = connect_db();
        $row = null;
        $select = "SELECT * from users where username = '$this->username' and password='$this->password'";
        $res = $connection->query($select);
        if ($res!=null && $res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $this->idUser = $row["iduser"];
            $this->firstname = $row["firstname"];
            $this->lastname = $row["lastname"];
            
        } else return null;
        
        disconnect_db($connection);
        return $this;
    }
    
    public static function getAllUsername(){
		$connection = connect_db();
                $res =null;
                $row = null;
                $listUsers = array();
		$select = "SELECT * from users";
                $res = $connection->query($select);
                if($res!=null && $res->num_rows>0)
                {
                while ($row = $res->fetch_assoc())
                {
                $user = new User();
                $user->idUser =$row["iduser"];
		$user->username = $row["username"]; 
                $listUsers[] = $user;
                }
                
                
                }
    
               disconnect_db($connection) ;
               return $listUsers;
                
    }
}

?>