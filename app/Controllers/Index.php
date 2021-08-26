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

      $usuarios_db = new UsuariosModel();
      $registros = $usuarios_db->where(['email' => $valor_email, 'password' => $valor_pass])->find();

      if (sizeof($registros) == 0) {
         $mensaje = 'ERROR##INVALID##DATA';
      } else {
          if ($registros[0]["estado"] == "INACTIVO") {
            $mensaje = 'NOT##STATUS##OFF';
         } else {
            unset($registros[0]['password']);

            $this->session->set($registros[0]);
            $mensaje = 'OK##DATA##LOGIN';
         }
      }
      echo $mensaje;;
    }

    // Cargar Vista del usuario


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
	

		// Verificar que el documento no este previamente registrado
		$usuario = new ModelUsuario();
		$consulta = $usuario->where(['documento' => $documento])->find();
		if (sizeof($consulta) > 0) {
			$mensaje = "FAIL#DOCUMENTO";
		} else {
            // Verificar que el correo no se encuentre en la bd
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
					'puntos' => $puntos,
					// Administrador
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


  public function cargarVistaInicio()
   {

   	 if ($this->session->has("tipo_usuario")) {
        $punto_acum = new PuntosModel();
		$acumulador = $punto_acum->findAll();
		$data = ['datos' => $acumulador];

		echo view('template/header_admin');
		echo view('table_puntos',$data);
		echo view('template/footer');
      } else {
         return view('login');
      }




   }

}

