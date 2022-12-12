<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewRequest;
use App\Http\Requests\DeleteIdRequest;
use App\Http\Requests\EditRequest;
use App\Repositories\CityRepository;

class CityController extends Controller
{
    /**
     * @var CityRepository
     */
    private $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function getAllCities()
    {
        $cities = $this->cityRepository->getAllCities();
        return response()->json(['data' => $cities], 200);
    }

    public function createNewCity(CreateNewRequest $request)
    {
        $name = $request->get('name');
        $city = $this->cityRepository->createNewCity($name);
        return response()->json(['data' => $city], 200);
    }

    public function editCity(EditRequest $request)
    {
        $id = $request->get('id');
        $name = $request->get('name');
        $city = $this->cityRepository->editCity($id, $name);
        return response()->json(['data' => $city], 200);
    }

    public function deleteCity(DeleteIdRequest $request)
    {
        $id = $request->get('id');
        if($this->cityRepository->deleteCity($id))
            return response()->json(['status' => 'success'], 200);

        return response()->json(['status' => 'error'], 502);

    }
}
