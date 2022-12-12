<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\DeleteIdRequest;
use App\Http\Requests\EditClientRequest;
use App\Repositories\ClientRepository;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * @var ClientRepository
     */
    private $clientRepository;
    /**
     * @var ContactRepository
     */
    private $contactRepository;

    public function __construct(ClientRepository $clientRepository, ContactRepository $contactRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->contactRepository = $contactRepository;
    }

    public function getAllClients(Request $request)
    {
        $table = $request->get('table');
        $orderBy = $request->get('orderBy');
        $clients = $this->clientRepository->getAllClients($table, $orderBy);
        return response()->json(['data' => $clients], 200);
    }

    public function createNewClient(CreateClientRequest $request)
    {
        $address = $request->get('address');
        $cityId = $request->get('cityId');
        $countryId = $request->get('countryId');
        $contacts = $request->get('contacts');
        $name = $request->get('name');
        $industryId = $request->get('industryId');
        $client = $this->clientRepository->createNewClient($address, $cityId, $countryId, $name, $industryId);
        $this->saveContact($contacts, $client->id);
        return response()->json(['data' => $client], 200);
    }

    public function editClient(EditClientRequest $request)
    {
        $id = $request->get('id');
        $address = $request->get('address');
        $cityId = $request->get('cityId');
        $countryId = $request->get('countryId');
        $contacts = $request->get('contacts');
        $name = $request->get('name');
        $industryId = $request->get('industryId');
        $client = $this->clientRepository->editClient($id, $address, $cityId, $countryId, $name, $industryId);
        $this->contactRepository->deleteContact($client->id);
        $this->saveContact($contacts, $client->id);
        return response()->json(['data' => $client], 200);
    }

    public function deleteClient(DeleteIdRequest $request)
    {
        $id = $request->get('id');
        if($this->clientRepository->deleteClient($id)){
            $this->contactRepository->deleteContact($id);
            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'error'], 502);
    }

    private function saveContact($contacts, $clientId)
    {
        foreach($contacts as $contact)
        {
            $this->contactRepository->createNewContact($contact['info'], $contact['contact_type_id'], $clientId);
        }
    }

}
