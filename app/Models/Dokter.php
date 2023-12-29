<?php

namespace App\Models;

use App\Models\Spesialis;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dokter extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the spesialis that owns the Dokter
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function spesialis(): BelongsTo
    {
        return $this->belongsTo( related: spesialis::class);
    }
}
