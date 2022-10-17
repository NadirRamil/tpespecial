<?php
require_once './models/UserModel.php';
require_once './views/View.php';
require_once './helpers/AuthHelper.php';

class AuthController{
    private $model;
    private $view;
    private $authHelper;

    function __construct(){
        $this->authHelper= new AuthHelper();
        $this->model= new UserModel();
        $this->view= new View($this->authHelper->getUser());    }

    public function showFormLogin() {
        $this->view->showFormLogin();
    }
    
    public function validateUser() {
        // toma los datos del form
        $email = $_POST['email'];
        $password = $_POST['password'];

        // busco el usuario por email
        $user = $this->model->getUserByEmail($email);

        // verifico que el usuario existe y que las contraseñas son iguales
        if ($user && password_verify($password, $user->password)) {

            // inicio una session para este usuario
            session_start();
            $_SESSION['USER_ID'] = $user->id;
            $_SESSION['USER_EMAIL'] = $user->email;
            $_SESSION['IS_LOGGED'] = true;

            header("Location: " . BASE_URL);
        } else {
            // si los datos son incorrectos muestro el form con un error
           $this->view->showFormLogin("El usuario o la contraseña no existe.");
        } 
    }
    public function logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL);
    }



}