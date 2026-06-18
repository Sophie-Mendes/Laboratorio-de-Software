<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GeneroModel;
use CodeIgniter\HTTP\ResponseInterface;

class GeneroController extends BaseController
{
    private $generoModel;
    public function __construct(){
        $this->generoModel = new generoModel();
    }
    public function index()
    {
        $generos = $this->listar();
        echo view ('genero/index', [
            'generos' => $generos
        ]);
        
    }
    public function listar(){
        return $this->generoModel->findAll();
    }
    public function salvar(){
        $genero = $this->request->getPost();
        $this->generoModel->save($genero);
        return redirect()->to('GeneroController/index');
    } 
    public function procurar($id){
        $genero = $this->generoModel->find($id);
        return $genero;
    }
    public function editar($id){
        $genero = $this->procurar($id);
        echo view('genero/edit',['genero' => $genero]);
    }

}
