<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ObraModel;
use App\Controllers\GeneroController;
use CodeIgniter\HTTP\ResponseInterface;

class ObraController extends BaseController
{
    private $obraModel;

    public function __construct(){
        $this->obraModel = new ObraModel();
        $this->generoController = new GeneroController();
    }
    public function index()
    {
        $obras = $this->listar();
        $generos = $this->generoController->listar();
        echo view('obra/index',['obras' => $obras,'generos' => $generos
        ]);
    }
    public function listar(){
        return $this->obraModel->findAll();
    }

    public function salvar(){
        $obra = $this->request->getpost();
        $this->obraModel->save($obra);
        return redirect()->to("ObraController/index");
    }
    
    public function editar($id){
        $obra = $this->obraModel->find($id);
        $generos = $this->generoController->listar();

        echo view('obra/edit',[
            'obra' => $obra,
            'generos' => $generos 
        ]);
    
    }
    
}
