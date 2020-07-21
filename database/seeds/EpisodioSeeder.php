<?php

use App\Episodio;
use Illuminate\Database\Seeder;

class EpisodioSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Episodio::create([
            'temporada' => 10,
            'numero' => 5,
            'assistido' => false,
            'serie_id' => 1,
        ]);
    }
}
