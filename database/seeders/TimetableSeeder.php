<?php

namespace Database\Seeders;

use App\Models\Timetable;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TimetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $classes = ['7A', '7Б', '8А', '8Б', '9А', '9Б', '10А', '10Б','11А', '11Б'];

        foreach ($classes as $class) {
            // Generate a random timetable for each class
            for ($i = 0; $i < 5; $i++) {
                Timetable::create([
                    'class' => $class,
                    'day' => $faker->randomElement(['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница']),
                    'start_time' => $faker->time(),
                    'end_time' => $faker->time(),
                ]);
            }
        }
    }
}
