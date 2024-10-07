<?php

namespace App\Models\News;

use App\Helpers\StringHelper;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    use HasFactory;
    use UUID;

    protected $guarded = [];

    public function sections(): HasMany
    {
        return $this->hasMany(NewsSection::class);
    }

    public function scopeSearchByTitle($query, $title)
    {
        if (StringHelper::getStringOrNull($title)) {
            $query->where('title', 'ILIKE', '%' . $title . '%');
        }

        return $query;
    }

    public function scopeSearchByDescription($query, $description)
    {
        if (StringHelper::getStringOrNull($description)) {
            $query->where('description', 'ILIKE', '%' . $description . '%');
        }

        return $query;
    }
}
