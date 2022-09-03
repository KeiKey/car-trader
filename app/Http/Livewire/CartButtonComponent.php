<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use Illuminate\Support\Collection;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class CartButtonComponent extends Component
{
    protected $total;
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
        return view('livewire.cart-button', [
            'total' => $this->total,
        ]);
    }

    /**
     * Rerenders the cart items and total price on the browser.
     *
     * @return void
     */
    public function updateCart()
    {
        $this->total = Cart::content()->count();
    }
}
