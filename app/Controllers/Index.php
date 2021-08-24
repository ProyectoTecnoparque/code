<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\HistorialModel;
use App\Models\ModelUsuario;
use App\Models\PuntosModel;

class Index extends BaseController
{  
	// LOGIN USUARIO
	public function index()
	{
	return view('login');
	}
    // Validar datos de ingreso
	public function ValidarDatosIngreso()
    {
       $valor_email = $this->request->getPostGet('email');
       $valor_pass = md5($this->request->getPostGet('password'));
 
       $usuario = new ModelUsuario();
       $registros = $usuario->where(['email' => $valor_email, 'password' => $valor_pass])->find();

       if (count($registros) > 0) {
			    $mensaje = 'OK##DATA##LOGIN';
       } else {
             $this->session->set($registros[0]);
             $mensaje = 'ERROR##INVALID##DATA';
       }
       echo $mensaje;
    }
    	
    public function login() {
		$usuario = $this->request->getPost('usuario');
		$password = $this->request->getPost('password');
		$Usuario = new ModelUsuario();

		$datosUsuario = $Usuario->obtenerUsuario(['usuario' => $usuario]);

		if (count($datosUsuario) > 0 && 
			password_verify($password, $datosUsuario[0]['password'])) {

			$data = [
						"usuario" => $datosUsuario[0]['usuario'],
						"type" => $datosUsuario[0]['type']
					];

			$session = session();
			$session->set($data);

			return redirect()->to(base_url('/inicio'))->with('mensaje','1');

		} else {
			return redirect()->to(base_url('/'))->with('mensaje','0');
		}
	}
   

    // Cargar Vista del usuario
	public function cargarVistaInicio()
	{
		$punto_nivel= new PuntosModel();
		$niveles = $punto_nivel->findAll();
		$data =['datos' => $niveles];
  
	    echo view('template/header');
		echo view('table_puntos',$data);
		echo view('template/footer');
	  
	}

	 public function cerrarSession()
   {
     return view('login');
   }

    // Cerrar Sesión 
	public function salir() {
		$session = session();
		$session->destroy();
		return redirect()->to(base_url('/'));
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
		$puntos =$this->request->getPostGet('puntos');
	
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
					'tipo_usuario' => 'Usuario',
					// Administrador
				]);
				if ($registros) {
					$punto_nivel= new PuntosModel();
					$acumpoint = $punto_nivel->where(['puntos' <= $puntos])->find('id');

		         // Ingresando datos DB Historial de puntos 
					$db_puntos =new HistorialModel();
					$db_puntos ->insert([
						'usuario_id' => $usuario->getInsertID(),
						'acum_point' => $puntos,
						'id_nivel'   => $acumpoint,
					]);

					$mensaje = "OK#CORRECT#DATA";
				} else {
					$mensaje = "OK#INVALID#DATA";
				}
			}
		}
		echo $mensaje;
	}
  public function cargarVistaInicio()
   {
      if ($this->session->has("tipo_usuario")) {
         echo view('template/header');
         echo view('ModuloUsuarios/perfil');
         echo view('template/footer');
      } else {
         return view('login');
      }
   }

}

