<?php

namespace App\Models\News;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsSection extends Model
{
    use HasFactory;
    use UUID;

    protected $guarded = [];
}
