<?php

namespace App\Repositories;

use App\Http\Resources\SubscriptionNumberResource;
use App\Http\Resources\SubscriptionResource;
use App\Models\Subscription;
use App\Models\SubscriptionNumber;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SubscriptionNumberRepository
{
    public function getListOfSubscriptions($query): AnonymousResourceCollection
    {
        $limit = $query['limit'] ?? 10;
        if (! is_numeric($limit) || intval($limit) === 0) {
            $limit = 10;
        }

        $sort = $query['sort'] ?? 'desc';
        if ($sort !== 'asc' && $sort !== 'desc') {
            $sort = 'desc';
        }

        $builder = SubscriptionNumber::query()->with('subscription', 'subscription.customer', 'number', 'imsi')->orderBy('id', $sort);

        return SubscriptionNumberResource::collection(
            $builder->paginate($limit)
        );
    }
}
