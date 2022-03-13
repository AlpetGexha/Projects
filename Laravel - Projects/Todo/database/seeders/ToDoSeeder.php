<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Todo;

use function Symfony\Component\Translation\t;

class ToDoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $f = Faker::create();

        foreach (range(0, 50) as $i) {
            Todo::create([
                'title' => $f->sentence(25),
                'com' => 0
            ]);
        }
    }
}
