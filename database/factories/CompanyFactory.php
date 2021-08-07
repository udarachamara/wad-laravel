<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Traits\CommonTraits;

class CompanyFactory extends Factory
{
    use CommonTraits;
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->company;
        $domainFromName = $this->makeDomain($name);
        $domain = strtolower(trim($domainFromName . $this->faker->randomElement(['.com', '.net', '.org', '.biz'])));
        $email = strtolower(trim('hello@' . $domain));
        return [
            'name' => $name,
            'email' => $this->faker->unique()->safeEmail,
            'telephone' => $this->faker->e164PhoneNumber,
            'logo' => $this->faker->imageUrl(100, 100),
            'website' => $domain,
            'created_at' => $this->faker->dateTimeThisDecade
        ];
    }
}
