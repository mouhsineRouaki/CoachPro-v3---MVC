<?php

class AuthController{
    private $repo ; 

    public function __construct(){
    $this->repo = new UserRepository();

    }
    public function loginForm(){
        require_once __DIR__."../../Views/auth/auth.php";
    }
    public function login() {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $result = $this->repo->login($email,$password);
        if ($result['success']) {
            if($result["user"]["role"] === "coach"){
                header("Location: ../../pages/coach/dashbordCoach.php");
            }else{
                header("Location: ../../pages/sportif/dashbordSportif.php");
            }
            exit();   
        } else {
            header("Location: ../../public/index.php?message=" . urlencode($result['message']));
            exit();      
        }
    }
    public function register() {
        $register = new Register(
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['email'],
        $_POST['password'],
        $_POST['telephone'],
        $_POST['role'],
        $_POST['urlImage']
    );
        $result = $this->repo->register($register);

    if ($result['success']) {
        header("Location: /");
        exit();   
    } else {
        header("Location: /");
        exit();      
    }
    }

    public function logout() {
        session_destroy();
        header('Location: /');
    }
}