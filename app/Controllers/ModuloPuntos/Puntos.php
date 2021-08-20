<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\PuntosModel;

class Index extends BaseController

{
	public function puntos()
	{  
      $puntos_nivel= new PuntosModel();
      $niveles = $this->punto_nivel->findAll();
      $data =['datos' => $niveles];

	return view('template/header');
      return view('table_puntos',$data);
      return view('template/footer');
	}

	
	
}

