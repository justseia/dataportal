<?php

namespace App\Models\Question;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Year extends Model
{
    use HasFactory;
    use UUID;

    protected $guarded = [];

    public function themes(): HasMany
    {
        return $this->hasMany(Theme::class);
    }
}
