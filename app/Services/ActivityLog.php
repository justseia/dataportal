<?php

namespace App\Services;

use App\Models\Client\ClientActivityLog;
use Illuminate\Database\Eloquent\Model;

class ActivityLog
{
    protected string $type;
    protected string $value;

    public function __construct($type, $value)
    {
        $this->type = $type;
        $this->value = $value;
    }

    public function create(): Model
    {
        $data = [
            'type' => $this->type,
            'value' => $this->value,
            'client_id' => auth()->id(),
        ];

        return ClientActivityLog::query()->create($data);
    }
}
