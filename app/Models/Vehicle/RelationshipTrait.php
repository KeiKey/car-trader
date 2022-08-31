<?php

namespace App\Models\Car;

use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait RelationshipTrait
{
    public function categoryOptions(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
