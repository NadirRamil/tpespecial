<?php
require_once './models/recitalesModel.php';
require_once './models/artistasModel.php';
require_once './views/View.php';
require_once './helpers/AuthHelper.php';


class RecitalesController{

    private $model;
    private $view;
    private $artistasModel;
   

    function __construct(){
        $this->model = new RecitalesModel();
        $this->artistasModel = new ArtistasModel();
        $this->authHelper = new AuthHelper();
        $this->view = new View($this->authHelper->getUser());  
    }

    function showHome(){
        $artistas = $this->artistasModel->getAllartistas();
        $recitales = $this->model->getAllrecitales();
        $this->view->showrecitales($recitales , $artistas);
        
    }
    function viewrecital($id){
        $recital = $this-> model->getrecital($id);
        $this->view->showrecital($recital);

    }

    function addrecital() {
        $this->authHelper->checkLoggedIn();
        if((isset($_POST['fecha'])) && (isset($_POST['lugar'])) && (isset($_POST['artista_id']))){
        $fecha = $_POST['fecha'];
        $lugar = $_POST['lugar'];
        $artista_id = $_POST['artista_id'];
        $id = $this->model->Insertarrecital($fecha, $lugar, $artista_id);
        header("Location: ".BASE_URL);
        }
    }
    function deleterecital($id){
        $this->authHelper->checkLoggedIn();
        $this->model->deleterecitalFromDB($id);
        $this->view->showHomeLocation();
    }

    function updaterecital($id){
        $this->authHelper->checkLoggedIn();
        $artistas = $this->artistasModel->getAllartistas();
        $recital = $this->model->getrecital($id);
        $this->view->editrecital($recital, $artistas);
            
    }
    function editrecital($id){
         $this->authHelper->checkLoggedIn();
        if((isset($_POST['fecha'])) && (isset($_POST['lugar'])) && (isset($_POST['artista_id']))){
            $fecha = $_POST['fecha'];
            $lugar = $_POST['lugar'];
            $artista_id = $_POST['artista_id'];
            $id_recital = $id;
            $id = $this->model->editrecital($fecha, $lugar, $artista_id, $id_recital);
            header("Location: ".BASE_URL);
            }
            
    }
    function showErrorDefault(){
        $this->view->showErrorDefault();
    }

 }
