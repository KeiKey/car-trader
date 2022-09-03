<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Models\Category\Category;
use App\Models\Vehicle\Vehicle;
use App\Services\VehicleService;
use Illuminate\Http\RedirectResponse;
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
        return view('vehicles.index', ['vehicles' => Vehicle::all()]);
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
        dd($request->all());
        $this->vehicleService->createVehicle($request->validated());

        return redirect()->route('vehicles.index');
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
        $this->vehicleService->updateVehicle($vehicle, $request->validated());

        return redirect()->route('vehicles.index');
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

            return redirect()->route('vehicles.index');
        } catch (Throwable $exception) {
            return redirect()->route('vehicles.index');
        }
    }
}
