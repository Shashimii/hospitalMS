<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Appointment;
use Faker\Factory as Faker;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Appointment::create([
            'name' => 'Zaria Khan',
            'description' => 'Persistent cough and difficulty breathing',
            'doctor' => 'Dr. Emily Jones',
            'patient' => 'Zaria Khan',
            'schedule' => '2024-02-10',
            'doctor_id' => fake()->randomNumber(1),
            'patient_id' => fake()->randomNumber(1),
        ]);
        
        Appointment::create([
            'name' => 'Enzo Conti',
            'description' => 'Sudden sharp pain in lower right abdomen',
            'doctor' => 'Dr. David Hernandez',
            'patient' => 'Enzo Conti',
            'schedule' => '2024-04-23',
            'doctor_id' => fake()->randomNumber(1),
            'patient_id' => fake()->randomNumber(1),
        ]);
        
        Appointment::create([
            'name' => 'Xiomara Rivera',
            'description' => 'Follow-up appointment for recent allergy testing',
            'doctor' => 'Dr. Sarah Garcia',
            'patient' => 'Xiomara Rivera',
            'schedule' => '2024-01-17',
            'doctor_id' => fake()->randomNumber(1),
            'patient_id' => fake()->randomNumber(1),
        ]);
        
        Appointment::create([
            'name' => 'Kasimir Petrov',
            'description' => 'Feeling dizzy and lightheaded frequently',
            'doctor' => 'Dr. Jane Smith',
            'patient' => 'Kasimir Petrov',
            'schedule' => '2024-03-14',
            'doctor_id' => fake()->randomNumber(1),
            'patient_id' => fake()->randomNumber(1),
        ]);
        
        Appointment::create([
            'name' => 'Aisha Patel',
            'description' => 'Annual physical checkup',
            'doctor' => 'Dr. Michael Lee',
            'patient' => 'Aisha Patel',
            'schedule' => '2024-05-02',
            'doctor_id' => fake()->randomNumber(1),
            'patient_id' => fake()->randomNumber(1),
        ]);
        
        Appointment::create([
            'name' => 'Nguyen Thi My',
            'description' => 'Trouble sleeping and waking up tired',
            'doctor' => 'Dr. Daniel Young',
            'patient' => 'Nguyen Thi My',
            'schedule' => '2024-06-05',
            'doctor_id' => fake()->randomNumber(1),
            'patient_id' => fake()->randomNumber(1),
        ]);
        
        Appointment::create([
            'name' => 'Dr. Jessica Moore (Ophthalmologist)',
            'description' => 'Routine eye exam',
            'doctor' => 'Optician Jones',
            'patient' => 'Dr. Jessica Moore',
            'schedule' => '2024-07-12',
            'doctor_id' => fake()->randomNumber(1),
            'patient_id' => fake()->randomNumber(1),
        ]);
        
        Appointment::create([
            'name' => 'Omar Lopez',
            'description' => 'Anxiety and feeling overwhelmed',
            'doctor' => 'Dr. Ashley Walker',
            'patient' => 'Omar Lopez',
            'schedule' => '2024-08-21',
            'doctor_id' => fake()->randomNumber(1),
            'patient_id' => fake()->randomNumber(1),
        ]);        
    }
}
