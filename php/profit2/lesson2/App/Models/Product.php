<?php

namespace App\Models;

use App\Model;

class Product extends Model implements HasPriceInterface, HasWeightInterface
{

    protected const TABLE = 'products';

    public string $name;
    public float $weight;

    use HasPriceTrait;

    public function getWeight(): float
    {
        return $this->weight;
    }
}
