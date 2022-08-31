<?php

namespace App\Models\User;

use App\Models\Client\Client;
use App\Models\Department\Department;
use App\Models\File\File;
use App\Models\Message\Message;
use App\Models\Order\Order;
use App\Models\Quotes\Quotes;
use App\Models\Task\Task;
use App\Models\WorkReport\WorkReport;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait RelationshipTrait
{
    /**
     * Return the Client that has the User.
     *
     * @return BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Return the departments that belong to the User.
     *
     * @return BelongsToMany
     */
    public function departments(): BelongsToMany
    {
        return $this->belongsToMany(Department::class);
    }

    /**
     * @return HasMany
     */
    public function workReports(): HasMany
    {
        return $this->hasMany(WorkReport::class);
    }

    /**
     * Return the orders that the user has created.
     *
     * @return HasMany
     */
    public function creatorOrders(): HasMany
    {
        return $this->hasMany(Order::class, 'created_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function files(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphToMany(File::class, 'fileable');
    }

    /**
     * @return BelongsToMany
     */
    public function messages(): BelongsToMany
    {
        return $this->belongsToMany(Message::class, 'message_recipients', 'recipient_id', 'message_id', 'id', 'id')
            ->withPivot('status');
    }

    /**
     * Return the Tasks that belong to the User.
     *
     * @return HasMany
     */
    public function recipientTasks(): HasMany
    {
        return $this->hasMany(Task::class, 'recipient_id');
    }

    /**
     * Return the Tasks that the User has created.
     *
     * @return HasMany
     */
    public function creatorTasks(): HasMany
    {
        return $this->hasMany(Task::class, 'created_by');
    }

    /**
     * @return HasMany
     */
    public function creatorQuotes(): HasMany
    {
        return $this->hasMany(Quotes::class, 'created_by');
    }

}
