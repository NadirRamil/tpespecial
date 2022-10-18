<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class View{
    private $smarty;

    function __construct($user) {
        $this->smarty = new Smarty();
        $this->smarty->assign('user', $user);

    }
    function showrecitales($recitales, $artistas){
        $this->smarty->assign('titulo', 'Agrega un recital');
        $this->smarty->assign('recitales', $recitales);
        $this->smarty->assign('artistas', $artistas);
        $this->smarty->display('templates/recitaleslist.tpl');
    }
    function showartistas($artistas, $error){
        $this->smarty->assign('cantante', $artistas);
        $this->smarty->assign('error', $error);
        $this->smarty->assign('titulo', 'Agrega un artista');
        $this->smarty->display('templates/artistalist.tpl');
        
    }
    function showrecital($recital){
        $this->smarty->assign('recital', $recital);
        $this->smarty->display('templates/viewrecital.tpl');

    }
    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

    function showartistaRecitales($artistaRecitales ,$artista){
        $this->smarty->assign('artista', $artista);
        $this->smarty->assign('recitales', $artistaRecitales);
        $this->smarty->display('templates/artistaRecitales.tpl');
    }    

   function editrecital($recital, $artistas){
    $this->smarty->assign('titulo', 'Edita el recital');
    $this->smarty->assign('recital', $recital);
    $this->smarty->assign('artista', $artistas);
    $this->smarty->display('./templates/editrecital.tpl');

   }
   function showFormEdit($artista){
    $this->smarty->assign('titulo', 'Edita el artista');
    $this->smarty->assign('artista', $artista);
    $this->smarty->display('./templates/editartista.tpl');

   }
   function showFormLogin($error = null) {
    $this->smarty->assign("title", 'Log in');
    $this->smarty->assign("error", $error);
    $this->smarty->display('templates/login.tpl');
}

function showErrorDefault(){
    $this->smarty->assign('error', '404 page not found');
    $this->smarty->display('templates/errordefault.tpl');
}

}?>
