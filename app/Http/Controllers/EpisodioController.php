<?php
/**
 * User: phmiranda
 * Project: controle-series-v2
 * Description: this file execute...!
 * Date: 20/07/2020
 */

namespace App\Http\Controllers;

use App\Episodio;

class EpisodioController extends BaseController {
    public function __construct() {
        $this->class = Episodio::class;
    }

    public function pesquisarPorSerie(int $id) {
        $episodios = Episodio::query()->where('serie_id', $id)->paginate();
        return $episodios;
    }
}
