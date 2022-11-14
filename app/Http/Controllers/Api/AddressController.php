<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\AddressRepository;

class AddressController extends Controller
{
    private AddressRepository $repository;

    public function __construct(AddressRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function showAddress($id)
    {
        $postal_code = $this->repository->showPostalCode($postal_code_id);

        return response()->json($address->toArray());
    }
}
