<?php

namespace App\Services;

use App\Models\Client\ClientActivityLog;
use Illuminate\Database\Eloquent\Model;

class ActivityLog
{
    protected string $type;
    protected string $value;
    protected string $cross;

    public function __construct($type, $value, $cross = null)
    {
        $this->type = $type;
        $this->value = $value;
        $this->cross = $cross;
    }

    public function create(): Model
    {
        $data = [
            'type' => $this->type,
            'value' => $this->value,
            'cross' => $this->cross,
            'client_id' => auth()->id(),
        ];

        return ClientActivityLog::query()->create($data);
    }
}
