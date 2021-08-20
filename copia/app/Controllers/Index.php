<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ModelUsuario;
use App\Models\PuntosModel;

class Index extends BaseController
{  
	// LOGIN USUARIO
	public function index()
	{
	return view('login');
	}
	public function ValidarDatosIngreso()
    {
       $valor_email = $this->request->getPostGet('email');
       $valor_pass = md5($this->request->getPostGet('password'));
 
       $usuario = new ModelUsuario();
       $registros = $usuario->where(['email' => $valor_email, 'password' => $valor_pass])->find();
 
       if (sizeof($registros) == 0) {
			echo view('template/header');
			echo view('table_puntos');
			echo view('template/footer');
       } else {
             $this->session->set($registros[0]);
             $mensaje = 'OK##DATA##LOGIN';

			echo view('template/header');
			echo view('table_puntos');
			echo view('template/footer');
       }
       echo $mensaje;
    }
	public function cargarVistaInicio()
	{
		$punto_nivel= new PuntosModel();
		$niveles = $punto_nivel->findAll();
		$data =['datos' => $niveles];
  
	    echo view('template/header');
		echo view('table_puntos',$data);
		echo view('template/footer');
	  
	}

	public function cerrarsession()
	{
		echo view('login');
	}

    //    REGISTRO DE USUARIO
	public function registro(){
      echo view('registro');
	}
	public function registrarusuario()
	{
		$documento = $this->request->getPostGet('documento');
		$nombres = $this->request->getPostGet('nombres');
		$apellidos = $this->request->getPostGet('apellidos');
		$email = $this->request->getPostGet('email');
		$password = $this->request->getPostGet('password');
		$direccion = $this->request->getPostGet('direccion');
		$genero = $this->request->getPostGet('genero');
		$departamento = $this->request->getPostGet('departamento');

		$usuario = new ModelUsuario();

		$consulta = $usuario->where(['documento' => $documento])->find();

		if (sizeof($consulta) > 0) {
			$mensaje = "FAIL#DOCUMENTO";
		} else {
			$consulta = $usuario->where(['email' => $email])->find();

			if (sizeof($consulta) > 0) {
				$mensaje = "FAIL#EMAIL";
			} else {
				$registros = $usuario->save([
					'documento' => $documento,
					'nombres' => $nombres,
					'apellidos' => $apellidos,
					'email' => $email,
					'password' => md5($password),
					'direccion' => $direccion,
					'genero' => $genero,
					'departamento' => $departamento,
					'estado' => 'Activo',
				]);
				if ($registros) {
					$mensaje = "OK#CORRECT#DATA";
				} else {
					$mensaje = "OK#INVALID#DATA";
				}
			}
		}
		echo $mensaje;
	}

}

