<?php

namespace App\Repositories;

use App\Http\Resources\SubscriptionResource; 
use App\Http\Resources\SubscriptionNumberResource; 
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
        
        $builder = SubscriptionNumber::query()->with('subscription','subscription.customer', 'number', 'imsi')->orderBy('id', $sort);
        return SubscriptionNumberResource::collection(
            $builder->paginate($limit)
        );
    }
    
    public function getSubscriptionId($id): AnonymousResourceCollection
    {  

        $builder = Subscription::query()->select('id');
        if (env('DB_CONNECTION') === 'pgsql') {
            $builder->where('customer_id','iLike', $id);
        } else {
            $builder->where('customer_id', 'like', "%{$id}%");
        }

        return SubscriptionResource::collection($builder->get());
    }

    public function getCustomerSubscription($subscription_ids)
    {   
        $res = [];
        foreach ($subscription_ids as $subscription_id)
        {    
            $builder = SubscriptionNumber::query()->with('number', 'imsi', 'subscription')->select('id','subscription_id', 'number_id', 'imsi_id');
            if (env('DB_CONNECTION') === 'pgsql') {
                $builder->where('subscription_id','iLike', $subscription_id);
            } else {
                $builder->where('subscription_id', 'like', "%{$subscription_id}%");
            }
            array_push($res, SubscriptionNumberResource::collection($builder->get()));
        }
        return $res;
    }
}
