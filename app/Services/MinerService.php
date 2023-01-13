<?php

namespace App\Services;

use App\Models\Gpu;

class MinerService 
{
    public function buildMiner($budget, $provision, $name, $gpu, $partsCost)
    {

        $budget = $budget - $provision;
        $gpu = Gpu::find($gpu)->first()->toArray();

        $gpuPerMiner = $this->countGpusPerMiner($gpu['price'], $budget, $partsCost);

        $minerPrice = $this->countMinerCost($gpu['price'], $gpuPerMiner, $partsCost);

        $minersAmount = $this->countMiners($minerPrice, $budget);

        $remainingBudget = $this->countRemainingBudget($budget, $minerPrice, $minersAmount);

        $totalGpus = $minersAmount * $gpuPerMiner;

        if ($remainingBudget >= $partsCost + $gpu['price']) {
            $minersAmount++;
            $totalGpus += $this->countGpusPerMiner($gpu['price'], $remainingBudget, $partsCost);
        }

        $hashrateMin = $totalGpus * $gpu['hashrateMin'];
        $hashrateMax = $totalGpus * $gpu['hashrateMax'];
        $powerMin = $totalGpus * $gpu['powerMin'];
        $powerMax = $totalGpus * $gpu['powerMax'];
        $minerPrice = $totalGpus * $gpu['price'] + $partsCost * $minersAmount;
        $provisionReal = ($budget - $minerPrice) + $provision;

        return [
            'name' => $name,
            'gpu' => $gpu['name'],
            'hashrate' => [$hashrateMin, $hashrateMax],
            'power' => [$powerMin, $powerMax],
            'minersAmount' => $minersAmount,
            'gpuAmount' => $totalGpus,
            'minerPrice' => $minerPrice,
            'provisionReal' => $provisionReal
        ];
    }

    //Helpers

    private function countGpusPerMiner($gpuCost, $budget, $partsCost)
    {
        $gpus = ($budget - $partsCost) / $gpuCost;

        return $gpus >= 12 ? 12 : floor($gpus);
    }

    private function countMinerCost($gpuPrice, $gpuPerMiner, $partsCost)
    {
        return $partsCost + ($gpuPrice * $gpuPerMiner);
    }

    private function countMiners($minerPrice, $budget)
    {
        return floor($budget / $minerPrice);
    }

    private function countRemainingBudget($budget, $minerPrice, $minersAmount)
    {
        return $budget - $minerPrice * $minersAmount;
    }
}
