<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\CountryRepository;

class CountryController extends Controller
{
    private CountryRepository $repository;

    public function __construct(CountryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listCountry()
    {
        $country = $this->repository->getAllCountries();

        return $country->toArray();
    }
}
