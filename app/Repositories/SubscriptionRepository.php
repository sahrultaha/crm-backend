<?php

namespace App\Repositories;

use App\Http\Resources\SubscriptionResource; 
use App\Models\Subscription;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SubscriptionRepository
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
        
        $builder = Subscription::query()->with('customer')->orderBy('id', $sort);
        return SubscriptionResource::collection(
            $builder->paginate($limit)
        );
    }
}
