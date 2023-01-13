<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gpu>
 */
class GpuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $hashrateMin = rand(2000, 9000);
        $powerMin = rand(($hashrateMin * 2), ($hashrateMin * 4));
        $gpus = ['rtx 3060', 'rtx 3070', 'rtx 3060 ti'];

        return [
            'name' => $gpus[array_rand($gpus)],
            'hashrateMin' => $hashrateMin,
            'hashrateMax' => rand($hashrateMin + 100, $hashrateMin + 400),
            'powerMin' => $powerMin,
            'powerMax' => rand($powerMin + 10, $powerMin + 100),
            'price' => rand($powerMin * 0.5, $powerMin)
        ];
    }
}
