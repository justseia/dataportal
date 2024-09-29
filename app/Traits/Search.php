<?php

namespace App\Traits;

use App\Helpers\StringHelper;
use Illuminate\Database\Eloquent\Builder;

trait Search
{
    public function scopeSearchByFullName($query, $search): Builder
    {
        if (StringHelper::getStringOrNull($search)) {
            return $query->whereRaw("LOWER(CONCAT(first_name, ' ', last_name)) LIKE ?", ['%' . strtolower($search) . '%']);
        }

        return $query;
    }

    public function scopeSearchByStatus($query, $status): Builder
    {
        if (StringHelper::getStringOrNull($status)) {
            return $query->where('user_status_id', $status);
        }

        return $query;
    }

    public function scopeSearchByCountry($query, $country): Builder
    {
//        if (StringHelper::getStringOrNull($country)) {
//            return $query->where('user_status_id', $country);
//        }

        return $query;
    }

    public function scopeSearchByRating($query, $from, $to): Builder
    {
        if (StringHelper::getStringOrNull($from)) {
            $query->having('rating', '>', $from);
        }

        if (StringHelper::getStringOrNull($to)) {
            $query->having('rating', '<=', $to);
        }

        return $query;
    }

}
