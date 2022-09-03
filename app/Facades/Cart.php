<?php

namespace App\Facades;

use App\Models\Vehicle\Vehicle;
use App\Services\CartService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * @method static void add(Vehicle $vehicle)
 * @method static void update(string $id, string $action)
 * @method static void remove(string $id)
 * @method static void clear()
 * @method static Collection content()
 * @method static string total()
 */
class Cart extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return CartService::class;
    }
}
