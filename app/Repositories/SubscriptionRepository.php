<?php

namespace App\Repositories;

use App\Http\Resources\SubscriptionNumberResource;
use App\Models\Subscription;
use App\Models\SubscriptionNumber;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SubscriptionRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(new Subscription());
    }

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
            'subscription.subscriptionType', 'subscription.subscriptionStatus', 'number', 'imsi')->orderBy('id', $sort);

        return SubscriptionNumberResource::collection(
            $builder->paginate($limit)
        );
    }

    public function selectNumbers(int $customer_id)
    {
        $number = SubscriptionNumber::with('subscription', 'number')
                        ->whereHas('subscription', function ($q) use ($customer_id) {
                            $q->where('customer_id', '=', $customer_id);
                        })->get();

        return SubscriptionNumberResource::collection(
            $number
        );
    }
}
