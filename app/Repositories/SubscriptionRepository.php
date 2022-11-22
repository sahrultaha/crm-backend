<?php

namespace App\Repositories;

use App\Http\Resources\SubscriptionResource;
use App\Models\Subscription;
use App\Models\SubscriptionNumber;
use App\Http\Resources\SubscriptionNumberResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\JsonResponse;

class SubscriptionRepository extends BaseRepository
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

        $builder = SubscriptionNumber::query()->with('subscription', 'subscription.customer',
        'subscription.subscriptionType','subscription.subscriptionStatus', 'number', 'imsi')->orderBy('id', $sort);

        return SubscriptionNumberResource::collection(
            $builder->paginate($limit)
        );
    }

    public function getCustomerSubscriptions($query): AnonymousResourceCollection
    {

        $builder = Subscription::query();
        if (env('DB_CONNECTION') === 'pgsql') {
            $builder->where('customer_id', 'iLike', $query);
        } else {
            $builder->where('customer_id', 'like', "%{$query}%");
        }
        $subs_id = SubscriptionResource::collection(
                $builder->get()
            );
        
        return $subs_id;
    }
}
