<?php

namespace App\Repositories;

use App\Models\Subscription;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SubscriptionRepository
{
    //find by customer id here
    public function getListOfSubscriptions($query): AnonymousResourceCollection
    {
        $builder = Subscription::query();
        if (isset($query['search']) && mb_strlen($query['search']) > 3) {
            if (env('DB_CONNECTION') === 'pgsql') {
                $builder->whereRaw('customer_id @@ to_tsquery(?)', [$query['search']]);
            } else {
                $builder->where('customer_id', 'like', "%{$query['search']}%");
            }
        }
    }
}
