<?php

namespace App\Repositories;

use App\Http\Resources\SubscriptionResource; 
use App\Models\Subscription;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SubscriptionNumberRepository
{ //find by subscription id here
    public function getListOfSubscriptions($query): AnonymousResourceCollection
    {
        $builder = Subscription::query();
        if (isset($query['search']) && mb_strlen($query['search']) > 3) {
            if (env('DB_CONNECTION') === 'pgsql') {
                $builder->whereRaw('subscription_id @@ to_tsquery(?)', [$query['search']]);
            } else {
                $builder->where('subscription_id', 'like', "%{$query['search']}%");
            }
        }
    }
}
