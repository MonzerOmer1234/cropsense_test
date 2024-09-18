<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FarmOperation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the farm that owns the FarmOperation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function farm(): BelongsTo
    {
        return $this->belongsTo(Farm::class);
    }


    /**
     * Get the worker that owns the FarmOperation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function worker(): BelongsTo
    {
        return $this->belongsTo(User::class,'worker_id');
    }


}

