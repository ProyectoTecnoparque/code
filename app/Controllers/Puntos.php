<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HistorialModel;

class Puntos extends BaseController
{
      public function historial_punto()
      {
            $punto_acum = new HistorialModel();
            $acumulador = $punto_acum->findAll();
            $data = ['datos' => $acumulador];

            echo view('template/header');
            echo view('Puntos/acum_puntos',$data);
            echo view('template/footer');
      }
}
