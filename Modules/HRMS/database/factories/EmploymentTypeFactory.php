<?php

namespace Modules\HRMS\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmploymentTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\HRMS\app\Models\EmploymentType::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

