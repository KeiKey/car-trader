<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use Illuminate\Support\Collection;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class CartComponent extends Component
{
    protected Collection $items;
    protected $listeners = [
        'itemAddedToCart' => 'updateCart',
    ];

    /**
     * Mounts the component on the template.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->updateCart();
    }

    /**
     * Renders the component on the browser.
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.cart', ['items' => $this->items]);
    }

    /**
     * Removes a cart item by id.
     *
     * @param int $id
     * @return void
     */
    public function removeFromCart(int $id): void
    {
        Cart::remove($id);

        $this->updateCart();
    }

    /**
     * Clears the cart content.
     *
     * @return void
     */
    public function clearCart(): void
    {
        Cart::clear();

        $this->updateCart();
    }

    /**
     * Increase quantity of cart item.
     *
     * @param int $id
     * @return void
     */
    public function increaseCartItemQuantity(int $id): void
    {
        Cart::updateQuantity($id, 1);

        $this->updateCart();
    }

    /**
     * Decrease quantity of cart item.
     *
     * @param int $id
     * @return void
     */
    public function decreaseCartItemQuantity(int $id): void
    {
        Cart::updateQuantity($id, -1);

        $this->updateCart();
    }

    /**
     * Rerenders the cart items.
     *
     * @return void
     */
    public function updateCart(): void
    {
        $this->items = Cart::items();
    }
}
