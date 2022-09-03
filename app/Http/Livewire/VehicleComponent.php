<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use App\Models\Vehicle\Vehicle;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class VehicleComponent extends Component
{
    public Vehicle $vehicle;
    public int $quantity;

    /**
     * Mounts the component on the template.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->quantity = 1;
    }

    /**
     * Renders the component on the browser.
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.vehicle');
    }

    /**
     * Adds an item to cart.
     *
     * @return void
     */
    public function addToCart(): void
    {
        Cart::add($this->vehicle);

        $this->emit('vehicleAddedToCart');
    }
}
