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

        $hashrateMin = rand(30, 200);
        $powerMin = rand(($hashrateMin * 2), ($hashrateMin * 3));
        $gpus = ['rtx 3060', 'rtx 3070', 'rtx 3060 ti', 'rx 580', 'rx 5700XT'];

        return [
            'name' => $gpus[array_rand($gpus)],
            'hashrateMin' => $hashrateMin,
            'hashrateMax' => rand($hashrateMin + 10, $hashrateMin + 20),
            'powerMin' => $powerMin,
            'powerMax' => rand($powerMin + 30, $powerMin + 60),
            'price' => rand($hashrateMin * 10, $hashrateMin * 30)
        ];
    }
}
