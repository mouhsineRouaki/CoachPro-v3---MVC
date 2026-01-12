<?php
class AuthController{
    public function loginForm(){
        require_once __DIR__."../../Views/auth/auth.php";
    }
    public function login() {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $result = Utilisateur::login($email,$password);
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

    public function logout() {
        session_destroy();
        header('Location: /');
    }
}