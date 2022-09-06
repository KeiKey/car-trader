<?php

namespace App\Services;

use App\Models\Category\Category;
use App\Models\Vehicle\Vehicle;
use Exception;
use Illuminate\Support\Facades\DB;

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
        return DB::transaction(function () use ($vehicleData) {
            /** @var Vehicle $vehicle */
            $vehicle = Vehicle::query()->create([
                'make'  => $vehicleData['make'],
                'model' => $vehicleData['model'],
                'price' => $vehicleData['price'],
                'color' => $vehicleData['color'],
                'serial_number'   => $vehicleData['serial_number'],
                'engine_size'     => $vehicleData['engine_size'],
                'quantity'        => $vehicleData['quantity'],
                'production_year' => $vehicleData['production_year'],
                'disabled_at'     => $vehicleData['active'] ? now() : null
            ]);

            $this->attachCategoriesToVehicle($vehicle, $vehicleData['vehicleCategories']);

            return $vehicle;
        });
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
        return DB::transaction(function () use ($vehicle, $vehicleData) {
            $vehicle->update([
                'make'  => $vehicleData['make'],
                'model' => $vehicleData['model'],
                'price' => $vehicleData['price'],
                'color' => $vehicleData['color'],
                'serial_number'   => $vehicleData['serial_number'],
                'engine_size'     => $vehicleData['engine_size'],
                'quantity'        => $vehicleData['quantity'],
                'production_year' => $vehicleData['production_year'],
                'disabled_at'     => $vehicleData['active'] ? now() : null
            ]);

//            foreach ($vehicleData['vehicleCategories'] as $vehicleCategory) {
//                $data = explode('~', $vehicleCategory);
//                $vehicle->categories()->attach($data[1], ['extra' => $data[0]]);
//            }

            return $vehicle;
        });
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

    /**
     * Attach categories to vehicle.
     *
     * @param Vehicle $vehicle
     * @param $vehicleCategories
     * @return void
     */
    private function attachCategoriesToVehicle(Vehicle $vehicle, $vehicleCategories): void
    {
        $attachedCategories = [];

        foreach ($vehicleCategories as $vehicleCategory) {
            $data = explode('~', $vehicleCategory);
            $categoryId = $data[1];
            $extra = $data[0];

            $category = Category::query()->firstWhere('id', $categoryId);
            if (!$category || in_array($categoryId, $attachedCategories)) {
                continue;
            }

            $vehicle->categories()->attach($categoryId, ['extra' => $extra]);
            $attachedCategories[] = $categoryId;
        }
    }
}
