<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EditoraModel;
use CodeIgniter\HTTP\ResponseInterface;

class EditoraController extends BaseController
{

    private $editoraModel;

    public function __construct(){
    $this->editoraModel = new EditoraModel();
    }

    public function index()
    {
        $editoras = $this->listar();
        echo view(
            'editora/index',
            [
                'editoras' => $editoras
            ]);
    }

    public function listar(){
        return $this->editoraModel->findAll();
    }

    public function salvar(){
        $editora = $this->request->getPost();
        $this->editoraModel->save($editora);
        return redirect()->to('EditoraController/index');
    }

    public function procurar($id){
        return $this->editoraModel->find($id);
    }

    public function editar($id){
        $editora = $this->procurar($id);
        return view(
            'editora/edit',
            [
                'editora' => $editora
            ]
        );
    }
}
