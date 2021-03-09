<?php

namespace App\Models;

use App\Model;

class Service extends Model implements HasPriceInterface
{

    protected const TABLE = 'service';

    public string $name;

    use HasPriceTrait;
}
