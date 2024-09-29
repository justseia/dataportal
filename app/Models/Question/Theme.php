<?php

namespace App\Models\Question;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Theme extends Model
{
    use HasFactory;
    use UUID;

    protected $guarded = [];

    public function year(): BelongsTo
    {
        return $this->belongsTo(Year::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
}
