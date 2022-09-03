<?php

namespace App\Models\CategoryVehicle;

use App\Models\Department\Department;
use App\Models\Equipment\Equipment;
use App\Models\EquipmentType\EquipmentType;
use App\Models\Station\Station;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait RelationshipTrait
{
    /**
     * Return the Station that has the Equipment.
     *
     * @return BelongsTo
     */
    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class);
    }

    /**
     * Return the Equipment that has the Equipment.
     *
     * @return BelongsTo
     */
    public function equipment(): BelongsTo
    {
        return $this->belongsTo(Equipment::class);
    }
}
