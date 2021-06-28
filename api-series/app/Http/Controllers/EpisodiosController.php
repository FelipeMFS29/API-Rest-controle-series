<?php

namespace App\Http\Controllers;

use App\Episodio;

class EpisodiosController extends BaseController
{
    //avisando que o controller base precisa chamar a classe episodio
    public function __construct()
    {
        $this->classe = Episodio::class;
    }

    public function buscaPorSerie(int $serieId)
    {
        $episodios = Episodio::query()->where('serie_id', $serieId)->paginate();

        return $episodios;
    }
}
