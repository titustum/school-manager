<?php

namespace Database\Factories;

use App\Models\ClassRoom;
use App\Models\ClassStream;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition(): array
    {
        // Create a Kenyan Faker instance
        $faker = FakerFactory::create('en_KE');

        // Add Kenyan providers
        $faker->addProvider(new \KenyaFaker\Provider\en_KE\Person($faker));
        $faker->addProvider(new \KenyaFaker\Provider\en_KE\PhoneNumber($faker));

        // Gender logic
        $gender = $this->faker->randomElement(['male', 'female']);

        // Disability logic
        $hasDisability = $this->faker->boolean(10); // 10% chance
        $disabilityType = $hasDisability
            ? $this->faker->randomElement(['hearing', 'visual', 'physical'])
            : null;

        // Vulnerability logic
        $vulnerability = $this->faker->randomElement([
            'none',
            'single_parent',
            'half_orphan',
            'full_orphan',
        ]);

        return [
            'firstname'       => $faker->firstName($gender),
            'lastname'        => $faker->lastName(),
            'middlenames'     => $this->faker->optional()->firstName(),

            'class_room_id'   => ClassRoom::inRandomOrder()->first()->id,
            'class_stream_id' => ClassStream::inRandomOrder()->first()->id,

            'gender'          => $gender,
            'phone'           => $faker->phoneNumber(),

            'disability'      => $hasDisability,
            'disability_type' => $disabilityType,

            'accommodation'   => $this->faker->randomElement(['day', 'boarding']),
            'vulnerability'   => $vulnerability,

            'parent_name'     => $faker->name(),
            'parent_phone'    => $faker->phoneNumber(),
        ];
    }
}
