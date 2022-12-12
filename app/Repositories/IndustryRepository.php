<?php


namespace App\Repositories;


use App\Models\Industry;

class IndustryRepository
{
    public function getAllIndustries()
    {
        return Industry::all();
    }

    public function createNewIndustry($name)
    {
        $newIndustry = new Industry();
        $newIndustry->name = $name;
        $newIndustry->save();
        return $newIndustry;
    }

    public function editIndustry($id, $name)
    {
        $industry = Industry::find($id);
        $industry->name = $name;
        $industry->save();
        return $industry;
    }

    public function deleteIndustry($id)
    {
        $industry = Industry::find($id);
        return $industry->delete();
    }
}
