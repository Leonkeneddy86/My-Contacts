<?php

namespace App\Http\Controllers\Api;

use App\Models\Contacts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
    public function index()
    {
        return response()->json(Contacts::all(), 200);
    }

    public function show(string $id)
    {
        return response()->json(Contacts::findOrFail($id), 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
        ]);

        $contact = Contacts::create($validatedData);

        return response()->json($contact, 201);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
        ]);

        $contact = Contacts::findOrFail($id);

        $contact->update($validatedData);

        return response()->json($contact, 200);
    }

    public function destroy() 
{
    Contacts::truncate(); 

    return response()->json(null, 204);
}

public function destroyOne(string $id)
{
    $contact = Contacts::findOrFail($id);
    $contact->delete();
    return response()->json(null, 200);
}

}