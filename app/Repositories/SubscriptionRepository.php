<?php

namespace App\Repositories;

use App\Http\Resources\NumberResource;
use App\Http\Resources\SubscriptionNumberResource;
use App\Http\Resources\SubscriptionResource;
use App\Models\Number;
use App\Models\Subscription;
use App\Models\SubscriptionNumber;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SubscriptionRepository extends BaseRepository
{
    public function __construct()
    {
        // parent::__construct(new Subscription());
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

    // public function getCustomerSubscriptions($query)
    // {
    //     $builder = Number::query()->with('subscription_number','subscription_number.subscription', 'subscription.customer');

    //     return NumberResource::collection(
    //         $builder->get()
    //     );
    // }

    public function selectNumbers(int $customer_id)
    {
        $number = SubscriptionNumber::with('subscription')
                        ->whereHas('subscription', function ($q) use ($customer_id) {
                            $q->where('customer_id', '=', $customer_id);
                        })->get();

        return $number;
    }
}

// public function getCustomerSubscriptions($query)
// {
    //     $builder = Subscription::query()->select('id');
    //     if (env('DB_CONNECTION') === 'pgsql') {
    //         $builder->where('customer_id', 'iLike', $query);
    //     } else {
    //         $builder->where('customer_id', 'like', "%{$query}%");
    //     }
    //     $subs_id = SubscriptionResource::collection(
    //         $builder->get()
    //     );

    //     $arr=[];
    //     foreach($subs_id as $subs){
    //         $builder2 = SubscriptionNumber::query()->with('number')->select('number_id');
    //         if (env('DB_CONNECTION') === 'pgsql') {
    //             $builder2->where('subscription_id', 'iLike', $subs->id);
    //         } else {
    //             $builder2->where('subscription_id', 'like', "%{$subs->id}%");
    //         }
    //         $sub_number = SubscriptionNumberResource::collection(
    //             $builder2->get()
    //         );
    //         array_push($arr,$sub_number);
    //     }
    //     return $arr;
// }
