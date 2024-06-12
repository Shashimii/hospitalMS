<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Record;
use Illuminate\Support\Number;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Record::create([
            'patient' => 'Emily Jones',
            'diagnosis' => 'Common Cold',
            'doctor' => 'Daniel Young',
            'date' => '2024-06-11', 
            'doctor_id' => fake()->randomNumber(1),
            'patient_id' => fake()->randomNumber(1),
        ]);
        
        Record::create([
            'patient' => 'Daniel Young',
            'diagnosis' => 'Back Pain',
            'doctor' => 'Ashley Walker',
            'date' => '2024-06-11', 
            'doctor_id' => fake()->randomNumber(1),
            'patient_id' => fake()->randomNumber(1),
        ]);
        
        Record::create([
            'patient' => 'Ashley Walker',
            'diagnosis' => 'Skin Rash',
            'doctor' => 'Kevin Allen',
            'date' => '2024-06-11', 
            'doctor_id' => fake()->randomNumber(1),
            'patient_id' => fake()->randomNumber(1),
        ]);
        
        Record::create([
            'patient' => 'Kevin Allen',
            'diagnosis' => 'Stomach Ache',
            'doctor' => 'Jessica Moore',
            'date' => '2024-06-11',
            'doctor_id' => fake()->randomNumber(1),
            'patient_id' => fake()-> randomNumber(1),
        ]);
        
        Record::create([
            'patient' => 'Jessica Moore',
            'diagnosis' => 'Pink Eye',
            'doctor' => 'Sam Besa',
            'date' => '2024-06-11', 
            'doctor_id' => fake()->randomNumber(1),
            'patient_id' => fake()->randomNumber(1),
        ]);        

        Record::create([
            'patient' => 'Sarah Jones',
            'diagnosis' => 'Migraine',
            'doctor' => 'Dr. Brown',
            'date' => '2024-06-11',
            'doctor_id' => fake()->randomNumber(1),
            'patient_id' => fake()->randomNumber(1),
        ]);
        
        Record::create([
            'patient' => 'Michael Smith',
            'diagnosis' => 'Sprained Ankle',
            'doctor' => 'Dr. Hernandez',
            'date' => '2024-06-11',
            'doctor_id' => fake()->randomNumber(1),
            'patient_id' => fake()->randomNumber(1),
        ]);
        
        Record::create([
            'patient' => 'David Lee',
            'diagnosis' => 'Common Cold',
            'doctor' => 'Dr. Lopez',
            'date' => '2024-06-11',
            'doctor_id' => fake()->randomNumber(1),
            'patient_id' => fake()->randomNumber(1),
        ]);
        
        Record::create([
            'patient' => 'Emily Williams',
            'diagnosis' => 'Pink Eye',
            'doctor' => 'Dr. Clark',
            'date' => '2024-06-11',
            'doctor_id' => fake()->randomNumber(1),
            'patient_id' => fake()->randomNumber(1),
        ]);
        
        Record::create([
            'patient' => 'Charles Taylor',
            'diagnosis' => 'Back Pain',
            'doctor' => 'Dr. Martinez',
            'date' => '2024-06-11',
            'doctor_id' => fake()->randomNumber(1),
            'patient_id' => fake()->randomNumber(1),
        ]);
    }
}
