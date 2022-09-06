<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;

class VehicleCategoriesComponent extends Component
{
    public Collection $categories;
    public array $vehicleCategories;
    public Collection $categoryOptions;

    public function mount(): void
    {
        $this->categoryOptions = $this->categories;
    }

    public function render(): View
    {
        return view('livewire.vehicle-categories');
    }

    /**
     * Generate row in the table.
     *
     * @return void
     */
    public function addRow(): void
    {
        $key = array_key_last($this->vehicleCategories) ? array_key_last($this->vehicleCategories)+1 : 1;

        $this->vehicleCategories[$key] = ['category_id' => null, 'extra' => ''];
    }

    /**
     * Delete the selected row from the table.
     *
     * @param int $vehicleCategoryKey
     * @return void
     */
    public function deleteRow(int $vehicleCategoryKey): void
    {
        unset($this->vehicleCategories[$vehicleCategoryKey]);
    }

    /**
     * Category option selected.
     *
     * @param int $choosenCategory
     * @param $vehicleCategoryKey
     */
    public function categorySelected(int $choosenCategory, $vehicleCategoryKey): void
    {
        if ($choosenCategory === 0) {
            return;
        }

        $this->vehicleCategories[$vehicleCategoryKey]['category_id'] = $choosenCategory;

        $this->categoryOptions = $this->categoryOptions
            ->filter(function($category) use ($choosenCategory) {
                return $category->id != $choosenCategory;
            });
    }
}
