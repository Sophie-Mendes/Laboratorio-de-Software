<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class HomeController extends BaseController
{
    public function index()
    {
        $lista = array('Autor','Editora','Genero','Obra','TipoUsuario','Usuario','Livro','Emprestimo');
        echo view('_menu/index',['lista'=>$lista]);
        
    }
}
