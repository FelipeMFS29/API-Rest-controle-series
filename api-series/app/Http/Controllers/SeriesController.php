<?php

namespace App\Http\Controllers;

use App\Serie;

class SeriesController extends BaseController
{
    //avisando que o controller precisa chamar a classe serie
   public function __construct()
   {
       $this->classe = Serie::class;
   }
}
