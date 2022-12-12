<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewRequest;
use App\Http\Requests\DeleteIdRequest;
use App\Http\Requests\EditRequest;
use App\Repositories\CountryRepository;

class CountryController extends Controller
{
    /**
     * @var CountryRepository
     */
    private $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function getAllCountries()
    {
        $countries = $this->countryRepository->getAllCountries();
        return response()->json(['data' => $countries], 200);
    }

    public function createNewCountry(CreateNewRequest $request)
    {
        $name = $request->get('name');
        $country = $this->countryRepository->createNewCountry($name);
        return response()->json(['data' => $country], 200);
    }

    public function editCountry(EditRequest $request)
    {
        $id = $request->get('id');
        $name = $request->get('name');
        $country = $this->countryRepository->editCountry($id, $name);
        return response()->json(['data' => $country], 200);
    }

    public function deleteCountry(DeleteIdRequest $request)
    {
        $id = $request->get('id');
        if($this->countryRepository->deleteCountry($id))
            return response()->json(['status' => 'success'], 200);

        return response()->json(['status' => 'error'], 502);

    }
}
