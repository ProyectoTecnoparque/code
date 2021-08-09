<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Historial;

class Puntos extends BaseController
{
      public function historial()
      {
            $punto_acum = new HistorialPuntos();
            $acumulador = $punto_acum->findAll();
            $data = ['datos' => $acumulador];

            echo view('template/header');
            echo view('Puntos/acum_puntos',$data);
            echo view('template/footer');
      }
}
