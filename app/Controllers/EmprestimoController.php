<?php

namespace App\Controllers;

use App\Models\EmprestimoModel;
use App\Controllers\UsuarioController;
use App\Controllers\LivroController;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class EmprestimoController extends BaseController
{
    private $EmprestimoModel;
    public function __construct(){
        $this->EmprestimoModel = new EmprestimoModel();
        $this->LivroController = new LivroController();
        $this->UsuarioController = new UsuarioController();
    }
    public function index()
    {
        $Emprestimo = $this->listar();
        $Livro = $this->LivroController->listar();
        $Usuario = $this->UsuarioController->listar();
        echo view('emprestimo/index', [
            'Emprestimo' => $Emprestimo , 'Livro' => $Livro , 'Usuario' => $Usuario
        ]);
    }

    public function listar(){
        return $this->EmprestimoModel->findAll();
    }

    public function salvar(){
        $Emprestimo = $this->request->getPost();
        $this->EmprestimoModel->save($Emprestimo);
        return redirect()->to('EmprestimoController/index');
    }

    public function procurar($id){
        $Emprestimo = $this->EmprestimoModel->find($id);
        return $Emprestimo;
    }

    public function editar($id)
    {
        $Emprestimo = $this->procurar($id);
        $Livro = $this->LivroController->listar();
        $Usuario = $this->UsuarioController->listar();
        echo view('emprestimo/edit', [
            'Emprestimo' => $Emprestimo , 'Livro' => $Livro , 'Usuario' => $Usuario
        ]);
    }
}
