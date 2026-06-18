<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\TipoUsuarioController;

class UsuarioController extends BaseController
{
    private $UsuarioModel;

    public function __construct(){
        $this->UsuarioModel = new UsuarioModel();
        $this->TipoUsuarioController = new TipoUsuarioController();
    }

    public function index()
    {
        $Usuario = $this->listar();
        $TipoUsuario = $this->TipoUsuarioController->listar();
            echo view ('usuario/index', [
                'Usuario' => $Usuario , 'TipoUsuario' => $TipoUsuario
            ]);
    }

    public function listar(){
        return $this->UsuarioModel->findAll();
    }

    public function salvar(){
        $Usuario = $this->request->getPost();
        $this->UsuarioModel->save($Usuario);
        return redirect()->to('UsuarioController/index');
    }

    public function procurar($id){
        $usuario = $this->UsuarioModel->find($id);
        return $usuario;
    }

    public function editar($id){
        $Usuario = $this->procurar($id);
        $TipoUsuario = $this->TipoUsuarioController->listar();
        echo view('usuario/edit',['Usuario' => $Usuario, "TipoUsuario" => $TipoUsuario]);
    }
}
