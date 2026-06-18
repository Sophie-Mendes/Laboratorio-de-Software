<?php

namespace App\Controllers;

use App\Models\LivroModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\ObraController;
use App\Controllers\EditoraController;

class LivroController extends BaseController
{
    private $LivroModel;

    public function __construct(){
        $this->LivroModel = new LivroModel();
        $this->ObraController = new ObraController();
        $this->EditoraController = new EditoraController();
    }

    public function index()
    {
        $Livro = $this->listar();
        $Obra = $this->ObraController->listar();
        $Editora = $this->EditoraController->listar();
        echo view('livro/index', [
            'Livro' => $Livro , 'Obra' => $Obra , 'Editora' => $Editora
        ]);
    }

    public function listar(){
        return $this->LivroModel->findAll();
    }

    public function salvar(){
        $Livro = $this->request->getPost();
        $this->LivroModel->save($Livro);
        return redirect()->to('LivroController/index');
    }

    public function procurar($id){
        $Livro = $this->LivroModel->find($id);
        return $Livro;
    }

    public function editar($id)
    {
        $Livro = $this->procurar($id);
        $Obra = $this->ObraController->listar();
        $Editora = $this->EditoraController->listar();
        echo view('livro/edit', [
            'Livro' => $Livro , 'Obra' => $Obra , 'Editora' => $Editora
        ]);
    }
}
