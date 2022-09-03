<?php

namespace App\Services;

use App\Models\Vehicle\Vehicle;
use Exception;

class VehicleService
{
    /**
     * Create a new vehicle.
     *
     * @param array $vehicleData
     * @return Vehicle
     */
    public function createVehicle(array $vehicleData): Vehicle
    {
        /** @var Vehicle $vehicle */
        $vehicle = Vehicle::query()->create([
            'make' => $vehicleData['make'],
            'model' => $vehicleData['model'],
            'price' => $vehicleData['price'],
            'color' => $vehicleData['color'],
            'serial_number' => $vehicleData['serial_number'],
            'engine_size' => $vehicleData['engine_size'],
            'production_year' => $vehicleData['production_year'],
            'disabled_at' => $vehicleData['active'] ? now() : null
        ]);

        foreach ($request->equipment as $equipment) {
            $data = explode('-', $equipment);
            $vehicle->categories()->attach($data[1], ['extra' => $data[0]]);
        }

        return $vehicle;
    }

    /**
     * Update an existing vehicle.
     *
     * @param Vehicle $vehicle
     * @param array $vehicleData
     * @return Vehicle
     */
    public function updateVehicle(Vehicle $vehicle, array $vehicleData): Vehicle
    {
        return $vehicle->update(['name' => $vehicleData['name']]);
    }

    /**
     * Delete a vehicle.
     *
     * @param Vehicle $vehicle
     * @return void
     * @throws Exception
     */
    public function deleteVehicle(Vehicle $vehicle): void
    {
        $vehicle->delete();
    }
}
