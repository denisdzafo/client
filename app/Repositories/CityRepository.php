<?php


namespace App\Repositories;


use App\Models\City;

class CityRepository
{
    public function getAllCities()
    {
        return City::all();
    }

    public function createNewCity($name)
    {
        $newCity = new City();
        $newCity->name = $name;
        $newCity->save();
        return $newCity;
    }

    public function editCity($id, $name)
    {
        $city = City::find($id);
        $city->name = $name;
        $city->save();
        return $city;
    }

    public function deleteCity($id)
    {
        $city = City::find($id);
        return $city->delete();
    }
}
