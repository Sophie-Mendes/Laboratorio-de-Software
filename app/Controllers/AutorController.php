<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AutorModel;

class AutorController extends BaseController
{
    private $autorModel;
    public function __construct(){
        $this->autorModel = new AutorModel();
    }

    public function index()
    {
        $autores = $this->listar();
        echo view('autor/index', ['autores' => $autores]);
    }
    public function salvar(){
        $autor = $this->request->getPost();
        $this->autorModel->save($autor);
        return redirect()->to('AutorController/index');
        

    }
    public function listar(){
        $autores = $this->autorModel->findAll();
        return $autores;
    }
    public function procurar($id){
        $autor = $this->autorModel->find($id);
        return $autor;
        
    }
    public function editar($id){
        $autor = $this->procurar($id);
        echo view ('autor/edit',['autor' => $autor]);

    }
}
