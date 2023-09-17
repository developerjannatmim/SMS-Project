<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classes extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'school_id'
    ];

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function exam(): HasMany
    {
        return $this->hasMany(Exam::class);
    }
}
