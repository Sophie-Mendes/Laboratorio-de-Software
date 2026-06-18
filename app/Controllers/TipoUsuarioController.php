<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TipoUsuarioModel;
use CodeIgniter\HTTP\ResponseInterface;

class TipoUsuarioController extends BaseController
{
    private $tipoUsuarioModel;

    public function __construct(){
        $this->tipoUsuarioModel = new TipoUsuarioModel();
    }

    public function index(){
        $tipos_Usuario = $this->listar();
            echo view ('tipo_usuario/index', [
                'tipos_Usuario' => $tipos_Usuario
            ]);

    }

    public function listar(){
        return $this->tipoUsuarioModel->findAll();
    }

    public function salvar(){
        $tipo_Usuario = $this->request->getPost();
        $this->tipoUsuarioModel->save($tipo_Usuario);
        return redirect()->to('TipoUsuarioController/index');
    }

    public function procurar($id){
        $tipousuario = $this->tipoUsuarioModel->find($id);
        return $tipousuario;
    }

    public function editar($id){
        $tipos_Usuario = $this->procurar($id);
        echo view('tipo_usuario/edit',['tipos_Usuario' => $tipos_Usuario]);
    }



    
}

