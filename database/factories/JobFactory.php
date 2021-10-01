<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    protected $job_types = [
        'Full Time',
        'Part Time',
        'Permanent',
        'Contract',
        'Temporary'
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraphs(6, true),
            'company_id' => 1,
            'job_type' => $this->job_types[array_rand($this->job_types, 1)],
        ];
    }
}
