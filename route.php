<?php
require_once './controllers/recitalesController.php';
require_once './controllers/artistasController.php';
require_once './controllers/AuthController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
$params = explode('/', $action);


//TABLA DE RUTEO
switch($params[0]){
    case 'home':
        $recitalesController = new RecitalesController();
        $recitalesController-> showHome();
        break;
    case 'login':
        $authController= new AuthController();
        $authController->showFormLogin();
        break;
    case 'validate':
        $authController = new AuthController();
        $authController->validateUser();
        break;
    case 'logout':
        $authController= new AuthController();
        $authController->logout();
        break;
    case 'artistas':
        $artistasController= new ArtistasController();
        $artistasController->showartistas();
        break;
    case 'viewrecital':
        $recitalesController = new RecitalesController();
        $recitalesController->viewrecital($params[1]);
        break;
    case 'deleterecital':
        $recitalesController = new RecitalesController();
        $recitalesController->deleterecital($params[1]);
        break;
    case 'addrecital':
        $recitalesController = new RecitalesController();
        $recitalesController->addrecital();
        break;
    case 'addartista':
        $artistasController= new ArtistasController();
        $artistasController->addartista();
        break;
    case 'deleteartista':
        $artistasController= new ArtistasController();
        $artistasController->deleteartista($params[1]);
        break;
    case 'editrecitalesform': //formulario para editar un recital
        $recitalesController = new RecitalesController();
        $recitalesController->updaterecital($params[1]);
        break;
    case 'editArtistaForm'://formulario para editar un artista
        $artistasController= new ArtistasController();
        $artistasController->updateartista($params[1]);
        break;
    case 'editrecital':
        $recitalesController = new RecitalesController();
        $recitalesController->editrecital($params[1]);
        break;
    case 'editartista':
        $artistasController= new ArtistasController();
        $artistasController->editartista($params[1]);
        break;
    case 'viewartistaRecitales':
        $artistasController= new ArtistasController();
        $artistasController->viewartistaRecitales($params[1]);
        break;
     default:
        $recitalesController=new RecitalesController();
        $recitalesController->showErrorDefault();
     break;
   }
