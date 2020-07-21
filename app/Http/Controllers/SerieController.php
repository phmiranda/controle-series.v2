<?php
/**
 * User: phmiranda
 * Project: controle-series-v2
 * Description: this file execute...!
 * Date: 20/07/2020
 */

namespace App\Http\Controllers;

use App\Serie;

class SerieController extends BaseController {
    public function __construct() {
        $this->class = Serie::class;
    }
}
