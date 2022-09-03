<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use Illuminate\Support\Collection;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class CartComponent extends Component
{
    protected $total;
    protected $content;
    protected $listeners = [
        'vehicleAddedToCart' => 'updateCart',
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
        return view('livewire.cart', [
            'total' => $this->total,
            'content' => $this->content,
        ]);
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
     * Updates a cart item.
     *
     * @param int $id
     * @param string $action
     * @return void
     */
    public function updateCartItem(int $id, string $action): void
    {
        Cart::update($id, $action);
        $this->updateCart();
    }

    /**
     * Rerenders the cart items and total price on the browser.
     *
     * @return void
     */
    public function updateCart()
    {
        $this->total = Cart::total();
        $this->content = Cart::content();
    }
}
