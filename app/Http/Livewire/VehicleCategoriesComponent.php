<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;

class VehicleCategoriesComponent extends Component
{
    public Collection $categories;

    public \Illuminate\Support\Collection $existingVehicleCategories;

    public Collection $notChosenCategories;

//    public function booted()
//    {
//        $this->notChosenCategories = $this->categories->diffAssoc($this->existingVehicleCategories);
//    }

    public function render(): View
    {
        return view('livewire.vehicle-categories');
    }

    /**
     * Generate row in the table.
     *
     * @return Void
     */
    public function addRow(): Void
    {
        $this->existingVehicleCategories->push($this->existingVehicleCategories->last());
    }

    /**
     * Delete the selected row from the table.
     *
     * @param int $categoryId
     * @return Void
     */
    public function deleteRow(int $categoryId): Void
    {
        $this->existingVehicleCategories = $this->existingVehicleCategories
            ->filter(function($category) use ($categoryId) {
                return $category->id !== $categoryId;
            });
    }
}
