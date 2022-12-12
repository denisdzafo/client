<?php


namespace App\Repositories;


use App\Models\ContactType;

class ContactTypeRepository
{
    public function getAllContactType()
    {
        return ContactType::all();
    }

    public function createNewContactType($name)
    {
        $newContactType = new ContactType();
        $newContactType->name = $name;
        $newContactType->save();
        return $newContactType;
    }

    public function editContactType($id, $name)
    {
        $contactType = ContactType::find($id);
        $contactType->name = $name;
        $contactType->save();
        return $contactType;
    }

    public function deleteContactType($id)
    {
        $contactType = ContactType::find($id);
        return $contactType->delete();
    }
}
