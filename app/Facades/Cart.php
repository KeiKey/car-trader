<?php

namespace App\Facades;

use App\Models\Vehicle\Vehicle;
use App\Services\CartService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * @method static void addItem(Vehicle $vehicle)
 * @method static void updateQuantity(int $id, int $differenceInQuantity)
 * @method static void remove(int $id)
 * @method static void clear()
 * @method static Collection items()
 */
class Cart extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return CartService::class;
    }
}
