<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {
        return [
            'username' => fake()->unique()->userName(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'date_of_birth' => fake()->date(),
            'address' => fake()->address(),
            'postcode' => fake()->postcode(),
            'middle_name' => null,
            'parent' => null,
            'phone_number' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'role' => "swimmer",
            'gender_id' => rand(1,2),
            'squad_id' => rand(1,3),
            'email_verified_at' => now(),
            'password' => Hash::make('aaaaa'), // password
            'remember_token' => Str::random(10),
        ];
        $userRoles = array("swimmer","parent","coach");
        $randomUserRole= $userRoles[array_rand($userRoles)];
        switch ($randomUserRole) {
            case 'swimmer':
                return [
                    'username' => fake()->unique()->userName(),
                    'first_name' => fake()->firstName(),
                    'last_name' => fake()->lastName(),
                    'date_of_birth' => fake()->date(),
                    'address' => fake()->address(),
                    'postcode' => fake()->postcode(),
                    'middle_name' => null,
                    'parent' => null,
                    'phone_number' => fake()->phoneNumber(),
                    'email' => fake()->unique()->safeEmail(),
                    'role' => $randomUserRole,
                    'gender_id' => '1',
                    'squad_id' => rand(1,3),
                    'email_verified_at' => now(),
                    'password' => Hash::make('aaaaa'), // password
                    'remember_token' => Str::random(10),
                ];
                break;
            
            default:
                # code...
                break;
        }
       
        // $table->date('date_of_birth');
        // $table->string('address');
        // $table->string('postcode');
        // $table->string('middle_name')->nullable();
        // $table->string('parent')->nullable();
        // $table->string('phone_number');
        // $table->string('email')->unique();
        // $table->timestamp('email_verified_at')->nullable();
        // $table->string('password');
        // $table->string('role');
        // $table->foreignId('gender_id');
        // $table->foreignId('squad_id')->nullable();
        // return [
        //     'username' => fake()->unique()->userName(),
        //     'first_name' => fake()->firstName(),
        //     'last_name' => fake()->lastName(),
        //     'date_of_birth' => fake()->date(),
        //     'address' => fake()->address(),
        //     'postcode' => fake()->postcode(),
        //     'middle_name' => null,
        //     'parent' => null,
        //     'phone_number' => fake()->phoneNumber(),
        //     'email' => fake()->unique()->safeEmail(),
        //     'role' => $randomUserRole,
        //     'gender_id' => '1',
        //     'squad_id' => '3',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('aaaaa'), // password
        //     'remember_token' => Str::random(10),
        // ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
