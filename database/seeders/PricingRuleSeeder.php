<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PricingRule;

class PricingRuleSeeder extends Seeder
{
    public function run(): void
    {
        $rules = [
            [
                'house_type' => 'sederhana',
                'base_price_per_m2' => 2500000,
                'bed_additional_cost' => 5000000,
                'bath_additional_cost' => 8000000,
            ],
            [
                'house_type' => 'menengah',
                'base_price_per_m2' => 4000000,
                'bed_additional_cost' => 8000000,
                'bath_additional_cost' => 12000000,
            ],
            [
                'house_type' => 'mewah',
                'base_price_per_m2' => 6000000,
                'bed_additional_cost' => 12000000,
                'bath_additional_cost' => 20000000,
            ],
        ];

        foreach ($rules as $rule) {
            PricingRule::create($rule);
        }
    }
}