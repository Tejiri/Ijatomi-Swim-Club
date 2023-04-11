<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Gender;
use App\Models\Squad;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(50)->create();

        $this->generateGenders();
        $this->createSquads();
        $this->createAdmin();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }

    function generateGenders()
    {
        Gender::create([
            "name" => "Male",
        ]);

        Gender::create([
            "name" => "Female",
        ]);
    }

    function  createSquads()
    {

        Squad::create([
            'minimum_age' => 6,
            'maximum_age' => 11,
            'name' => 'Development Squad',
            'description' => 'A development squad swim club membership is a type of membership for children who are just starting to learn how to swim and want to develop their skills in a supportive and nurturing environment. Typically, development squad swim clubs are designed for children aged between 6 and 12 years old who are able to swim at least 25 meters without assistance.'
        ]);

        Squad::create([
            'minimum_age' => 12,
            'maximum_age' => 17,
            'name' => 'Intermediate Squad',
            'description' => 'An intermediate squad swim club membership is a type of membership for children who have already developed a certain level of swimming proficiency and are looking to take their skills to the next level. Typically, intermediate squad swim clubs are designed for children aged between 10 and 14 years old who have already completed the development squad program or have demonstrated a high level of swimming proficiency.'
        ]);

        Squad::create([
            'minimum_age' => 18,
            'maximum_age' => 28,
            'name' => 'Performance Squad',
            'description' => 'A performance squad swim club membership is a type of membership for swimmers who have achieved a high level of swimming proficiency and are looking to compete at the highest levels of the sport. Typically, performance squad swim clubs are designed for swimmers aged 14 years old and above who have already completed the intermediate squad program or have demonstrated a high level of swimming proficiency at regional or national competitions.'
        ]);

        // Squad::create([
        //     'minimum_age' => 6,
        //     'maximum_age' => 25,
        //     'name' => 'Para Swimming Squad',
        //     'description' => 'A Para swimming squad swim club membership is a type of membership for swimmers with a disability who are looking to develop their skills and compete in the sport of swimming. Para swimming squad swim clubs are designed to cater to swimmers with a wide range of disabilities, including physical, sensory, and intellectual impairments.'
        // ]);
    }

    function  createAdmin()
    {
        User::create(
            [
                "username" => "Tejiri",
                "first_name" => "Tejiri",
                "last_name" => "Ijatomi",
                "date_of_birth" => fake()->date(),
                'address' => fake()->address(),
                'postcode' => fake()->postcode(),
                'phone_number' => fake()->phoneNumber(),
                'email' => "steveijatomi@gmail.com",
                'password' => Hash::make("aaaaa"),
                'role' => "admin",
                'gender_id' => 1,
                'squad_id' => null,

            ]
        );
        // Squad::create([
        //     'minimum_age' => 6,
        //     'maximum_age' => 25,
        //     'name' => 'Para Swimming Squad',
        //     'description' => 'A Para swimming squad swim club membership is a type of membership for swimmers with a disability who are looking to develop their skills and compete in the sport of swimming. Para swimming squad swim clubs are designed to cater to swimmers with a wide range of disabilities, including physical, sensory, and intellectual impairments.'
        // ]);
    }
}
