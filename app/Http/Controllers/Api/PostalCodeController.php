<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PostalCode;
use App\Repositories\PostalCodeRepository;
use Illuminate\Http\Request;

class PostalCodeController extends Controller
{
    private PostalCodeRepository $repository;

    public function __construct(PostalCodeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostalCode  $village
     * @return \Illuminate\Http\Response
     */
    public function showPostalCode($postal_code_id)
    {
        $postal_code = $this->repository->showPostalCode($postal_code_id);

        return response()->json($address->toArray());
    }

    public function postalcode(Request $request)
    {
        $data = PostalCode::with('village')
                    ->select('id', 'name', 'village_id')
                    ->where('id', 'iLIKE', '%'.$request->get('search').'%')
                    ->take(1)
                    ->get();

        return response()->json($data);
    }
}
