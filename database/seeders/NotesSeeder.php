<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $notes: 100 registros
        $notes = [];
        for ($i = 0; $i < 100; $i++) {
            $n = [
                "title" => "Title " . $i,
                "description" => "Description " . $i,
                "user_id" => ($i % 12) + 1,
            ];
            // push a $n array to $$notes array
            array_push($$notes, $n);
        }
        // insert $$notes array to notes table
        DB::table('notes')->insert($$notes);
    }
}
