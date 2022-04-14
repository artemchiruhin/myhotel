<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $room_number = rand(100, 2000);
        return [
             'number' => $room_number,
             'floor' => floor($room_number / 100),
             'rooms_number' => rand(1, 4),
             'category_id' => rand(1, 5),
             'price_per_day' => rand(100, 500) * 10,
             'images' => json_encode(['default.png']),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
    }
}
