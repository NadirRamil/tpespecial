<?php
require_once './models/artistasModel.php';
require_once './views/View.php';
require_once './helpers/AuthHelper.php';

class ArtistasController {
    private $model;
    private $view;
    private $authHelper;

    function __construct(){
        $this->model = new ArtistasModel();
        $this->authHelper = new AuthHelper();
        $this->view =new View($this->authHelper->getUser());

        
    }
    function showartistas(){
        $artistas = $this->model->getAllartistas();
        $this->view->showartistas($artistas, $error = false);
    }
    function viewartistaRecitales($id){
        $artistaRecitales = $this-> model->getrecitales($id);
        $artista = $this-> model ->getartista($id);
        $this->view->showartistaRecitales($artistaRecitales, $artista);

    }
    function addartista() {
        $this->authHelper->checkLoggedIn();
        //todo: validar entrada de datos
        $nombre= $_POST['nombre'];
        $nacionalidad= $_POST['nacionalidad'];
        $id = $this->model->insertartista($nombre, $nacionalidad);
         header("Location: " . BASE_URL . 'artistas'); 
    }

    function deleteartista($id){
        $this->authHelper->checkLoggedIn();
        try{ 
            $this->model->deleteartistaById($id);
            header("Location: " . BASE_URL . 'artistas');

        }catch(Exception $e){
            $artistas = $this->model->getAllartistas();
            $this->view->showartistas($artistas, "No se puede eliminar el artista ya que esta tiene recitales asociados, elimine primero el recital.");
        }
    }
    function updateartista($id){
        $this->authHelper->checkLoggedIn();
        $artista = $this->model->getartista($id);
        $this->view->showFormEdit($artista);
    }

    function editartista ($id){
        $this->authHelper->checkLoggedIn();
        if((isset($_POST['nombre']))){
            $artista_id = $id;
            $nombre= $_POST['nombre'];
            $nacionalidad= $_POST['nacionalidad'];
        
        $id = $this->model->editartista($nombre, $nacionalidad, $artista_id, );
        header("Location: ".BASE_URL. 'artistas');
        }
    }

    }
