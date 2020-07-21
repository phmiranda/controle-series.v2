<?php
/**
 * User: phmiranda
 * Project: controle-series-v2
 * Description: this file execute...!
 * Date: 20/07/2020
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Serie extends Model {
    public $timestamps = false;
    protected $fillable = ['nome'];
    protected $appends = ['links'];

    public function episodios() {
     return $this->hasMany(Episodio::class);
    }

    public function getLinksAttribute() : array {
        return [
            'self' => '/api/series/'. $this->id,
            'episodios' => '/api/series/'. $this->id. '/episodios'
        ];
    }
}
