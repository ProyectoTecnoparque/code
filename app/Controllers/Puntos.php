<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PuntosModel;

class Puntos extends BaseController
{
      public function historial_punto()
      {
            //echo view('Puntos/acum_puntos',$data);
            $punto_acum = new PuntosModel();
            $acumulador = $punto_acum->findAll();
            $data = ['datos' => $acumulador];

            echo view('template/header_admin');
            echo view('table_puntos',$data);
            echo view('template/footer');
      }

      public function BuscarNivel()
      {
      $punto_acum = new PuntosModel();
        
      }
}
