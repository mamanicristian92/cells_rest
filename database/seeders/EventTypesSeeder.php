<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_types')->insert( [
            [
                'name' => 'Domingo de celebración',
                'description' => 'Culto general.\nMañana de 10 a 12hs\nTarde-noche de 19 a 21hs'
            ],
            [
                'name' => 'Reunión de oración',
                'description' => 'Martes 21hs'
            ],
            [
                'name' => 'Red de Jóvenes',
                'description' => 'Jóvenes de 18 años o más.\nSábados 20:30hs'
            ],
            [
                'name' => 'Red de Adolescentes',
                'description' => 'Chicos y chicas de 13 años o más.\nSábados 18hs'
            ],
            [
                'name' => 'Encuentro con Dios',
                'description' => 'Tres días a solas con Dios.\nPersonas de 13 años o más'
            ],
            [
                'name' => 'Encuentro Rescate',
                'description' => 'Encuentro para líderes'
            ],
            [
                'name' => 'Campamento Juvenil',
                'description' => 'Campemento para personas de 13 años o más'
            ],
            [
                'name' => 'Encuentro de Cantares',
                'description' => 'Sólo mujeres'
            ],
            [
                'name' => 'Seminario para Líderes',
                'description' => 'Líderes con o sin ceélula y estudiantes del 3er nivel de la esc. de líd.'
            ],
            [
                'name' => 'Bautismo',
                'description' => 'Personas que hayan hecho el pre-bautismo'
            ]
        ]);
    }
}
