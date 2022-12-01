<?php

namespace App\Repositories;

use App\Http\Resources\SubscriptionNumberResource;
use App\Models\Subscription;
use App\Models\SubscriptionNumber;
use App\Models\SubscriptionStatus;
use Illuminate\Database\Eloquent\Collection;
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

    public function getSubStatusList(): Collection
    {
        return SubscriptionStatus::all();
    }

    public function selectNumbers(int $customer_id)
    {
        $number = SubscriptionNumber::with(
            'imsi',
            'imsi.imsiType',
            'imsi.imsiStatus',
            'subscription',
            'subscription.subscriptionStatus',
            'subscription.subscriptionType',
            'number',
            'number.numberStatus',
            'number.numberType',
            'number.numberCategory')
                        ->whereHas('subscription', function ($q) use ($customer_id) {
                            $q->where('customer_id', '=', $customer_id);
                        })->get();

        return SubscriptionNumberResource::collection(
            $number
        );
    }

    public function updateSubscriptionStatus(Subscription $subscription, array $validated)
    {
        $subscription->subscription_status_id = $validated['subscription_status_id'];
        $subscription->save();

        return $subscription;
    }
}
