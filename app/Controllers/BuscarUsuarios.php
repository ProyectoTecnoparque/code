<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ModelUsuario;


class BuscarUsuarios extends BaseController
{
	public function listar_usuarios()
	{ 
		$usuario = new ModelUsuario();
		$usuarios = $usuario->findAll();
		$data = ['datos' => $usuarios];
		 

		echo view('template/header');
		echo view('ModuloUsuario/BuscarUsuarios', $data);
		echo view('template/footer');
	}

}
	