<?php

namespace App\Services;

use App\Models\Vehicle\Vehicle;
use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;

class CartService
{
    const SESSION_CART_INSTANCE = 'shopping-cart';

    protected SessionManager $session;

    public function __construct(SessionManager $session)
    {
        $this->session = $session;
    }

    /**
     * Adds a new item to the cart.
     *
     * @param Vehicle $vehicle
     * @return void
     */
    public function addItem(Vehicle $vehicle): void
    {
        $content = $this->getCartItems()->put($vehicle->id, $this->createCartItem($vehicle));

        $this->session->put(self::SESSION_CART_INSTANCE, $content);
    }

    /**
     * Updates the quantity of a cart item.
     *
     * @param int $id
     * @param int $differenceInQuantity
     * @return void
     */
    public function updateQuantity(int $id, int $differenceInQuantity): void
    {
        $content = $this->getCartItems();

        if ($content->has($id)) {
            $cartItem = $content->get($id);
            $cartItem->put('quantity', $cartItem->get('quantity') + $differenceInQuantity);

            $content->put($id, $cartItem);

            $this->session->put(self::SESSION_CART_INSTANCE, $content);
        }
    }

    /**
     * Removes an item from the cart.
     *
     * @param int $id
     * @return void
     */
    public function remove(int $id): void
    {
        $content = $this->getCartItems();

        if ($content->has($id)) {
            $this->session->put(self::SESSION_CART_INSTANCE, $content->except($id));
        }
    }

    /**
     * Clears the cart.
     *
     * @return void
     */
    public function clear(): void
    {
        $this->session->forget(self::SESSION_CART_INSTANCE);
    }

    /**
     * Returns the content of the cart.
     *
     * @return Collection
     */
    public function items(): Collection
    {
        return is_null($this->session->get(self::SESSION_CART_INSTANCE)) ? collect([]) : $this->session->get(self::SESSION_CART_INSTANCE);
    }

    /**
     * Creates a new cart item based on the vehicle.
     *
     * @param Vehicle $vehicle
     * @return Collection
     */
    private function createCartItem(Vehicle $vehicle): Collection
    {
        return collect([
            'id'       => $vehicle->id,
            'name'     => $vehicle->make.' - '.$vehicle->model,
            'quantity' => 1,
            'totalQuantity' => $vehicle->quantity,
        ]);
    }

    /**
     * Returns the content of the cart.
     *
     * @return Collection
     */
    private function getCartItems(): Collection
    {
        return $this->session->has(self::SESSION_CART_INSTANCE) ? $this->session->get(self::SESSION_CART_INSTANCE) : collect([]);
    }
}
