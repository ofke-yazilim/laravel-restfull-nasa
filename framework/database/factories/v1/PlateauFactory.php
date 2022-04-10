<?php

namespace Database\Factories\v1;

use App\Models\v1\Plateau;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlateauFactory extends Factory
{
    protected $model = Plateau::class; // Faker data oluşturulacak Model dosyası tanımlanıyor.
    /**
     * Nasıl oluşturuldu : php artisan make:factory v1/Plateau
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
