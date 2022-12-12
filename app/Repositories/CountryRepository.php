<?php


namespace App\Repositories;


use App\Models\Country;

class CountryRepository
{
    public function getAllCountries()
    {
        return Country::all();
    }

    public function createNewCountry($name)
    {
        $newCountry = new Country();
        $newCountry->name = $name;
        $newCountry->save();
        return $newCountry;
    }

    public function editCountry($id, $name)
    {
        $country = Country::find($id);
        $country->name = $name;
        $country->save();
        return $country;
    }

    public function deleteCountry($id)
    {
        $country = Country::find($id);
        return $country->delete();
    }
}
