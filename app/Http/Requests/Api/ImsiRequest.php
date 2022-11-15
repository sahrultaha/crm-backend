<?php

namespace App\Http\Requests\Api;

class ImsiRequest
{
    public static function generate($isStoreRequest = true): array
    {
        return [
            'imsi' => [
                $isStoreRequest ? 'required' : 'nullable',
                'integer',
            ],
            'imsi_status_id' => [
                $isStoreRequest ? 'required' : 'nullable',
                'numeric',
                'integer',
                'exists:imsi_status,id',
            ],
            'imsi_type_id' => [
                $isStoreRequest ? 'required' : 'nullable',
                'numeric',
                'integer',
                'exists:imsi_type,id',
            ],
            'pin' => [
                $isStoreRequest ? 'required' : 'nullable',
                'numeric',
                'integer',
            ],
            'puk_1' => [
                $isStoreRequest ? 'required' : 'nullable',
                'numeric',
                'integer',
            ],
            'puk_2' => [
                $isStoreRequest ? 'required' : 'nullable',
                'numeric',
                'integer',
            ],
        ];
    }
}
