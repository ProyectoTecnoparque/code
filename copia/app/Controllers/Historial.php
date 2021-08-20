<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HistorialModel;

class Historial extends BaseController
{
      public function historial_expe()
      {
            echo view('template/header');
            echo view('Historial/HistorialExp');
            echo view('template/footer');
      }
}
