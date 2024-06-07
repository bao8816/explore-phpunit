<?php
declare(strict_types=1);

namespace exp\src\tax;

define('REGION_ASIA', 1);
define('REGION_AMERICA', 2);
define('REGION_EUROPE', 3);

class TaxCalculator
{
    private float $tax_rate;

    public function __construct(int $region)
    {
        $this->tax_rate = match ($region) {
            REGION_ASIA => 0.1,
            REGION_AMERICA => 0.2,
            REGION_EUROPE => 0.3,
            default => 0.4,
        };
    }

    public function taxCalculate( $price ): float|int
    {
        return $this->tax_rate * $price;
    }
}
