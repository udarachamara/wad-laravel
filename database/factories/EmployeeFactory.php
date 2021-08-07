<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $company = Company::factory()->create();
        $firstName = $this->faker->firstName;
        $lastName = $this->faker->lastName;
        $email = strtolower(trim($firstName. '.' . $lastName . '@' . $company->website));
        return [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'phone' => $this->faker->e164PhoneNumber,
            'profile_photo' => $this->faker->imageUrl(640, 480),
            'company_id' => $company->id,
            'created_at' => $this->faker->dateTimeThisDecade
        ];
    }
}
