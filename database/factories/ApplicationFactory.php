<?php

namespace Database\Factories;

use App\Models\Application;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @return void
     */
    protected $model = Application::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "loan_amount" => $this->faker->randomNumber(9),
            "loan_purpose" => $this->faker->word(),
            "loan_duration" => $this->faker->randomNumber(2),
            "firstname" => $this->faker->name(),
            "middlename" => $this->faker->name(),
            "lastname" => $this->faker->name(),
            "dob" => $this->faker->date(),
            "phone" => $this->faker->tollFreePhoneNumber(),
            "email" => $this->faker->email(),
            "address" => $this->faker->streetAddress(),
            "zip" => $this->faker->postcode(),
            "state" => $this->faker->state(),
            "city" => $this->faker->city(),
            "employer" => $this->faker->word(),
            "employment_type" => $this->faker->word(),
            "income" =>$this->faker->randomNumber(9),
            "ssn" => $this->faker->phoneNumber()
        ];
    }
}