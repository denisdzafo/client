<?php


namespace App\Repositories;


use App\Models\Client;

class ClientRepository
{
    public function getAllClients($table = 'clients', $orderBy = 'id')
    {
        return Client::with(['contacts.contactType'])
        ->leftJoin('cities', 'clients.city_id', '=', 'cities.id')
        ->leftJoin('countries', 'clients.country_id', '=', 'countries.id')
        ->leftJoin('industries', 'clients.industry_id', '=', 'industries.id')
        ->select('clients.address as address', 
        'clients.id as id',
        'cities.name as cityName',
        'cities.id as cityId',
        'clients.name as name',
        'countries.name as countryName',
        'countries.id as countryId',
        'industries.name as industryName',
        'industries.id as industryId')
        ->groupBy('id')
        ->orderBy($table.'.'.$orderBy)
        ->get();
    }

    public function createNewClient($address, $cityId, $countryId, $name = null, $industryId = null)
    {
        $newClient = new Client();
        $newClient->address = $address;
        $newClient->city_id = $cityId;
        $newClient->country_id = $countryId;
        $newClient->name = $name;
        $newClient->industry_id = $industryId;
        $newClient->save();
        return $newClient;
    }

    public function editClient($id, $address, $cityId, $countryId, $name = null, $industryId = null)
    {
        $client = Client::find($id);
        $client->address = $address;
        $client->city_id = $cityId;
        $client->country_id = $countryId;
        $client->name = $name;
        $client->industry_id = $industryId;
        $client->save();
        return $client;
    }

    public function deleteClient($id)
    {
        $client = Client::find($id);
        return $client->delete();
    }
    
}
