<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Models\Category\Category;
use App\Models\Vehicle\Vehicle;
use App\Services\VehicleService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Lang;
use Illuminate\View\View;
use Throwable;

class VehicleController extends Controller
{
    private VehicleService $vehicleService;

    public function __construct(VehicleService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }

    /**
     * Display a listing of the vehicles.
     *
     * @return View
     */
    public function index(): View
    {
        return view('vehicles.index', ['vehicles' => Vehicle::query()->paginate(10)]);
    }

    /**
     * Show the form for creating a new vehicle.
     *
     * @return View
     */
    public function create(): View
    {
        return view('vehicles.create', ['categories' => Category::all('id', 'name')]);
    }

    /**
     * Store a newly created vehicle.
     *
     * @param VehicleRequest $request
     * @return RedirectResponse
     */
    public function store(VehicleRequest $request): RedirectResponse
    {
        try {
            $vehicle = $this->vehicleService->createVehicle($request->validated());

            return RedirectResponse::success('vehicles.index', Lang::get('general.create_success', ['title' => $vehicle->model]));
        } catch (Exception $exception) {
            return RedirectResponse::error(null, $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified vehicle.
     *
     * @param Vehicle $vehicle
     * @return View
     */
    public function edit(Vehicle $vehicle): View
    {
        return view('vehicles.edit', ['vehicle' => $vehicle, 'categories' => Category::all('id', 'name')]);
    }

    /**
     * Update the specified vehicle.
     *
     * @param VehicleRequest $request
     * @param Vehicle $vehicle
     * @return RedirectResponse
     */
    public function update(VehicleRequest $request, Vehicle $vehicle): RedirectResponse
    {
        try {
            $this->vehicleService->updateVehicle($vehicle, $request->validated());

            return RedirectResponse::success('vehicles.index', Lang::get('general.update_success', ['title' => $vehicle->model]));
        } catch (Exception $exception) {
            return RedirectResponse::error(null, $exception->getMessage());
        }
    }

    /**
     * Remove the specified vehicle.
     *
     * @param Vehicle $vehicle
     * @return RedirectResponse
     */
    public function destroy(Vehicle $vehicle): RedirectResponse
    {
        try {
            $this->vehicleService->deleteVehicle($vehicle);

            return RedirectResponse::success('vehicles.index', Lang::get('general.delete_success', ['title' => $vehicle->model]));
        } catch (Throwable $exception) {
            return RedirectResponse::error(null, $exception->getMessage());
        }
    }
}
