<?php

namespace App\Http\Controllers;



use App\Http\Requests\CreateNewRequest;
use App\Http\Requests\DeleteIdRequest;
use App\Http\Requests\EditRequest;
use App\Repositories\ContactTypeRepository;

class ContactTypeController extends Controller
{
    /**
     * @var ContactTypeRepository
     */
    private $contactTypeRepository;

    public function __construct(ContactTypeRepository $contactTypeRepository)
    {
        $this->contactTypeRepository = $contactTypeRepository;
    }

    public function getAllContactTypes()
    {
        $contactTypes = $this->contactTypeRepository->getAllContactType();
        return response()->json(['data' => $contactTypes], 200);
    }

    public function createNewContactType(CreateNewRequest $request)
    {
        $name = $request->get('name');
        $contactType = $this->contactTypeRepository->createNewContactType($name);
        return response()->json(['data' => $contactType], 200);
    }

    public function editContactType(EditRequest $request)
    {
        $id = $request->get('id');
        $name = $request->get('name');
        $contactType = $this->contactTypeRepository->editContactType($id, $name);
        return response()->json(['data' => $contactType], 200);
    }

    public function deleteContactType(DeleteIdRequest $request)
    {
        $id = $request->get('id');
        if($this->contactTypeRepository->deleteContactType($id))
            return response()->json(['status' => 'success'], 200);

        return response()->json(['status' => 'error'], 502);

    }
}
