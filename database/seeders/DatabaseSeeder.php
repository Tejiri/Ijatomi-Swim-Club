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
        $this->createParentAndChild();
        User::factory(50)->create();
        $this->generateGenders();
        $this->createSquads();
        $this->createAdmin();
        $this->createCoaches();
    }

    function generateGenders()
    {
        $genders = Gender::all();
        if (count($genders)) {
        } else {
            Gender::create([
                "name" => "Male",
            ]);

            Gender::create([
                "name" => "Female",
            ]);
        }
    }

    function createParentAndChild()
    {
        $parent = User::where('email', 'parent1@gmail.com')->get();
        $child = User::where('email', 'child1@gmail.com')->get();
        if (count($parent) || count($child)) {
        } else {
            User::create(
                [
                    "username" => fake()->userName(),
                    "first_name" => fake()->firstName(),
                    "last_name" => fake()->lastName(),
                    "date_of_birth" => fake()->date(),
                    'address' => fake()->address(),
                    'postcode' => fake()->postcode(),
                    'phone_number' => fake()->phoneNumber(),
                    'email' => "parent1@gmail.com",
                    'password' => Hash::make("aaaaa"),
                    'role' => "parent",
                    'gender_id' => 1,
                    'squad_id' => null,
                ]
            );

            User::create(
                [
                    "username" => fake()->userName(),
                    "first_name" => fake()->firstName(),
                    "last_name" => fake()->lastName(),
                    "date_of_birth" => fake()->date(),
                    'address' => fake()->address(),
                    'postcode' => fake()->postcode(),
                    'phone_number' => fake()->phoneNumber(),
                    'email' => "child1@gmail.com",
                    'password' => Hash::make("aaaaa"),
                    'role' => "swimmer",
                    'gender_id' => 1,
                    'squad_id' => rand(1, 3),
                    "parent" => 1
                ]
            );
        }
    }

    function  createSquads()
    {

        $squads = Squad::all();
        if (count($squads)) {
        } else {
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
        }
    }

    function  createAdmin()
    {
        $admin = User::where('email', 'admin@gmail.com')->get();
        if (count($admin)) {
        } else {
            User::create(
                [
                    "username" => fake()->userName(),
                    "first_name" => fake()->firstName(),
                    "last_name" => fake()->lastName(),
                    "date_of_birth" => fake()->date(),
                    'address' => fake()->address(),
                    'postcode' => fake()->postcode(),
                    'phone_number' => fake()->phoneNumber(),
                    'email' => "admin@gmail.com",
                    'password' => Hash::make("aaaaa"),
                    'role' => "admin",
                    'gender_id' => 1,
                    'squad_id' => null,

                ]
            );
        }
    }

    function  createCoaches()
    {
        $coach1 = User::where('email', 'coach1@gmail.com')->get();
        $coach2 = User::where('email', 'coach2@gmail.com')->get();
        $coach3 = User::where('email', 'coach3@gmail.com')->get();
        if (count($coach1) || count($coach2) || count($coach3)) {
        } else {
            User::create(
                [
                    "username" => fake()->userName(),
                    "first_name" => fake()->firstName(),
                    "last_name" => fake()->lastName(),
                    "date_of_birth" => fake()->date(),
                    'address' => fake()->address(),
                    'postcode' => fake()->postcode(),
                    'phone_number' => fake()->phoneNumber(),
                    'email' => "coach1@gmail.com",
                    'password' => Hash::make("aaaaa"),
                    'role' => "coach",
                    'gender_id' => 1,
                    'squad_id' => 1,

                ]
            );

            User::create(
                [
                    "username" => fake()->userName(),
                    "first_name" => fake()->firstName(),
                    "last_name" => fake()->lastName(),
                    "date_of_birth" => fake()->date(),
                    'address' => fake()->address(),
                    'postcode' => fake()->postcode(),
                    'phone_number' => fake()->phoneNumber(),
                    'email' => "coach2@gmail.com",
                    'password' => Hash::make("aaaaa"),
                    'role' => "coach",
                    'gender_id' => 1,
                    'squad_id' => 2,

                ]
            );

            User::create(
                [
                    "username" => fake()->userName(),
                    "first_name" => fake()->firstName(),
                    "last_name" => fake()->lastName(),
                    "date_of_birth" => fake()->date(),
                    'address' => fake()->address(),
                    'postcode' => fake()->postcode(),
                    'phone_number' => fake()->phoneNumber(),
                    'email' => "coach3@gmail.com",
                    'password' => Hash::make("aaaaa"),
                    'role' => "coach",
                    'gender_id' => 1,
                    'squad_id' => 3,

                ]
            );
        }
    }
}
