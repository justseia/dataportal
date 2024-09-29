<?php

namespace App\Models\Client;

use App\Casts\ActionTypeCast;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientActivityLog extends Model
{
    use HasFactory;
    use UUID;

    protected $guarded = [];

    protected $casts = [
        'type' => ActionTypeCast::class,
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
