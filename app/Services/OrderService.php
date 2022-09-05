<?php

namespace App\Services;

use App\Models\Order\Order;
use App\Models\User\User;
use App\Models\Vehicle\Vehicle;
use Exception;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function __construct(private CartService $cartService)
    {
    }

    /**
     * Create a new order and attach vehicles to it.
     * Remove quantity from vehicles and clear cart.
     *
     * @param array $orderData
     * @param User $purchaser
     * @return Order
     * @throws Exception
     */
    public function createOrder(array $orderData, User $purchaser): Order
    {
        return DB::transaction(function () use ($orderData, $purchaser) {
            /** @var Order $order */
            $order = Order::query()->create(['purchased_by' => $purchaser->id]);

            $this->attachVehiclesToOrder($order, $orderData['orderItems']);

            $this->cartService->clear();

            return $order;
        });
    }

    /**
     * Cancel an order and restore the vehicle's quantity.
     *
     * @param Order $order
     * @param User $canceler
     * @return void
     * @throws Exception
     */
    public function cancelOrder(Order $order, User $canceler)
    {
        $order->load('vehicles');

        return DB::transaction(function () use ($order, $canceler) {
            $order->fill(['canceled_at' => now(), 'canceled_by' => $canceler->id])->save();

            //todo - restore the vehicle quantity

            return $order;
        });
    }

    /**
     * Assert if vehicles quantity is sufficient and attach them to the order.
     *
     * @param Order $order
     * @param array $vehiclesData
     * @throws Exception
     */
    private function attachVehiclesToOrder(Order $order, array $vehiclesData): void
    {
        foreach ($vehiclesData as $vehicleData) {
            $data = explode('~', $vehicleData);
            $vehicleId = $data[0];
            $orderVehicleQuantity = $data[1];

            /** @var Vehicle $vehicle */
            $vehicle = Vehicle::query()->firstWhere('id', $vehicleId);
            if ($vehicle->quantity < $orderVehicleQuantity) {
                throw new Exception(__('general.quantity_insufficient'));
            }

            $vehicle->decrement('quantity', $orderVehicleQuantity);
            $order->vehicles()->attach($vehicleId, ['quantity' => $orderVehicleQuantity]);
        }
    }
}
