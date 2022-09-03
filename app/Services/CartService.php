<?php

namespace App\Services;

use App\Models\Vehicle\Vehicle;
use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;

class CartService
{
    const MINIMUM_QUANTITY = 1;
    const DEFAULT_INSTANCE = 'shopping-cart';

    protected SessionManager $session;
    protected $instance;

    /**
     * Constructs a new cart object.
     *
     * @param SessionManager $session
     */
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
    public function add(Vehicle $vehicle): void
    {
        $content = $this->getContent()->put($vehicle->id, $vehicle);

        $this->session->put(self::DEFAULT_INSTANCE, $content);
    }

    /**
     * Updates the quantity of a cart item.
     *
     * @param int $id
     * @param string $action
     * @return void
     */
    public function update(int $id, string $action): void
    {
        $content = $this->getContent();

        if ($content->has($id)) {
            $cartItem = $content->get($id);

            switch ($action) {
                case 'plus':
                    $cartItem->put('quantity', $content->get($id)->get('quantity') + 1);
                    break;
                case 'minus':
                    $updatedQuantity = $content->get($id)->get('quantity') - 1;

                    if ($updatedQuantity < self::MINIMUM_QUANTITY) {
                        $updatedQuantity = self::MINIMUM_QUANTITY;
                    }

                    $cartItem->put('quantity', $updatedQuantity);
                    break;
            }

            $content->put($id, $cartItem);

            $this->session->put(self::DEFAULT_INSTANCE, $content);
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
        $content = $this->getContent();

        if ($content->has($id)) {
            $this->session->put(self::DEFAULT_INSTANCE, $content->except($id));
        }
    }

    /**
     * Clears the cart.
     *
     * @return void
     */
    public function clear(): void
    {
        $this->session->forget(self::DEFAULT_INSTANCE);
    }

    /**
     * Returns the content of the cart.
     *
     * @return Collection
     */
    public function content(): Collection
    {
        return is_null($this->session->get(self::DEFAULT_INSTANCE)) ? collect([]) : $this->session->get(self::DEFAULT_INSTANCE);
    }

    /**
     * Returns total price of the items in the cart.
     *
     * @return string
     */
    public function total(): string
    {
//        $content = $this->getContent();
//
//        $total = $content->reduce(function ($total, $item) {
//            return $total += $item->get('price') * $item->get('quantity');
//        });

//        return number_format($total, 2);
        return 5000;
    }

    /**
     * Returns the content of the cart.
     *
     * @return Collection
     */
    protected function getContent(): Collection
    {
        return $this->session->has(self::DEFAULT_INSTANCE) ? $this->session->get(self::DEFAULT_INSTANCE) : collect([]);
    }
}
