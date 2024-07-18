<?php

namespace Database\Factories\User;

use App\Enums\DocumentTypeEnum;
use App\Enums\UserTypeEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userType = $this->faker->randomElement(UserTypeEnum::cases());

        return [
            'id' => $this->faker->uuid(),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'document_type' => DocumentTypeEnum::toString($userType->value),
            'document_number' => $this->faker->randomNumber(5),
            'user_type' => $userType->value,
        ];
    }
}