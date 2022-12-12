<?php


namespace App\Repositories;


use App\Models\Contact;

class ContactRepository
{
    public function createNewContact($info, $contactTypeId, $clientId)
    {
        $newContact = new Contact();
        $newContact->info = $info;
        $newContact->contact_type_id = $contactTypeId;
        $newContact->client_id = $clientId;
        $newContact->save();
    }

    public function editContact($id, $info, $contactTypeId)
    {
        $contact = Contact::find($id);
        $contact->info = $info;
        $contact->contact_type_id = $contactTypeId;
        $contact->save();
    }

    public function deleteContact($clientId)
    {
        $contacts = Contact::where('client_id', '=', $clientId)->get();
        foreach($contacts as $contact)
        {
            $contact->delete();
        }

    }
}
