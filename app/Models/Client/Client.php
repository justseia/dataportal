<?php

namespace App\Models\Client;

use App\Helpers\PhoneNumberHelper;
use App\Helpers\StringHelper;
use App\Traits\UUID;
use App\Casts\PhoneNumberCast;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Client extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use HasFactory;
    use HasApiTokens;
    use UUID;
    use Authenticatable;
    use CanResetPassword;
    use Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'phone_number' => PhoneNumberCast::class,
    ];

    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function fullName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function activityLogs(): HasMany
    {
        return $this->hasMany(ClientActivityLog::class);
    }

    public function clientType(): BelongsTo
    {
        return $this->belongsTo(ClientType::class);
    }

    public function scopeSearchByFirstName($query, $firstName)
    {
        if (StringHelper::getStringOrNull($firstName)) {
            $query->where('first_name', 'ILIKE', '%' . $firstName . '%');
        }

        return $query;
    }

    public function scopeSearchByLastName($query, $lastName)
    {
        if (StringHelper::getStringOrNull($lastName)) {
            $query->where('last_name', 'ILIKE', '%' . $lastName . '%');
        }

        return $query;
    }

    public function scopeSearchByPhoneNumber($query, $phoneNumber)
    {
        if (StringHelper::getStringOrNull($phoneNumber)) {
            $phoneNumber = PhoneNumberHelper::formatPhoneNumberForStorage($phoneNumber);
            $query->where('phone_number', 'ILIKE', '%' . $phoneNumber . '%');
        }

        return $query;
    }

    public function scopeSearchByOrganization($query, $organization)
    {
        if (StringHelper::getStringOrNull($organization)) {
            $query->where('organization', 'ILIKE', '%' . $organization . '%');
        }

        return $query;
    }

    public function scopeSearchByClientType($query, $clientTypeId)
    {
        if (StringHelper::getStringOrNull($clientTypeId)) {
            $query->where('client_type_id', $clientTypeId);
        }

        return $query;
    }

    public function scopeSearchByEmail($query, $email)
    {
        if (StringHelper::getStringOrNull($email)) {
            $query->where('email', 'ILIKE', '%' . $email . '%');
        }

        return $query;
    }

    public function accessPaidContent(): string
    {
        return $this->trueOrFalseIcon($this->access_paid_content);
    }

    public function closeAllContent(): string
    {
        return $this->trueOrFalseIcon($this->close_all_content);
    }

    public function trueOrFalseIcon($check): string
    {
        $icon = '';
        if ($check) {
            $icon = '
            <div class="align-start d-flex justify-content-start"
                data-bs-toggle="tooltip"
                data-bs-placement="left"
                title="Активен">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="icon icon-tabler icon-tabler-square-rounded-check text-success"
                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                     stroke="currentColor" fill="none" stroke-linecap="round"
                     stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M9 12l2 2l4 -4"/>
                    <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"/>
                </svg>
            </div>';
        } else {
            $icon = '
            <div class="align-start d-flex justify-content-start"
                data-bs-toggle="tooltip"
                data-bs-placement="left"
                title="Не активен">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="icon icon-tabler icon-tabler-square-rounded-x text-danger"
                     width="24"
                     height="24" viewBox="0 0 24 24" stroke-width="2"
                     stroke="currentColor" fill="none" stroke-linecap="round"
                     stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M10 10l4 4m0 -4l-4 4"/>
                    <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"/>
                </svg>
            </div>';
        }

        return $icon;
    }
}
