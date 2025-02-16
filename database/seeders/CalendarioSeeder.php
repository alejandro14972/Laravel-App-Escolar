<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CalendarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eventos = [
            [
                'event' => 'Reunión de planificación',
                'start_date' => Carbon::now()->addDays(2)->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->addDays(2)->addHours(2)->format('Y-m-d H:i:s'),
                'user_id' => 1, 
            ],
            [
                'event' => 'Entrega de proyecto',
                'start_date' => Carbon::now()->addDays(7)->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->addDays(7)->addHours(1)->format('Y-m-d H:i:s'),
                'user_id' => 1,
            ],
            [
                'event' => 'Taller de capacitación',
                'start_date' => Carbon::now()->addWeeks(1)->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->addWeeks(1)->addHours(3)->format('Y-m-d H:i:s'),
                'user_id' => 1,
            ],
            [
                'event' => 'Conferencia de tecnología',
                'start_date' => Carbon::now()->addWeeks(2)->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->addWeeks(2)->addHours(4)->format('Y-m-d H:i:s'),
                'user_id' => 1,
            ],
            [
                'event' => 'Cierre de mes y evaluación',
                'start_date' => Carbon::now()->endOfMonth()->subDays(2)->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->endOfMonth()->subDays(2)->addHours(2)->format('Y-m-d H:i:s'),
                'user_id' => 1,
            ],
        ];

        DB::table('calendarios')->insert($eventos);
    }
}
