<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewRequest;
use App\Http\Requests\DeleteIdRequest;
use App\Http\Requests\EditRequest;
use App\Repositories\IndustryRepository;

class IndustryController extends Controller
{
    /**
     * @var IndustryRepository
     */
    private $industryRepository;

    public function __construct(IndustryRepository $industryRepository)
    {
        $this->industryRepository = $industryRepository;
    }

    public function getAllIndustries()
    {
        $industries = $this->industryRepository->getAllIndustries();
        return response()->json(['data' => $industries], 200);
    }

    public function createNewIndustry(CreateNewRequest $request)
    {
        $name = $request->get('name');
        $industry = $this->industryRepository->createNewIndustry($name);
        return response()->json(['data' => $industry], 200);
    }

    public function editIndustry(EditRequest $request)
    {
        $id = $request->get('id');
        $name = $request->get('name');
        $industry = $this->industryRepository->editIndustry($id, $name);
        return response()->json(['data' => $industry], 200);
    }

    public function deleteIndustry(DeleteIdRequest $request)
    {
        $id = $request->get('id');
        if($this->industryRepository->deleteIndustry($id))
            return response()->json(['status' => 'success'], 200);

        return response()->json(['status' => 'error'], 502);

    }
}
