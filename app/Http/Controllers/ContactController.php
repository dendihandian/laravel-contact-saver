<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Group;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::where('owner_id', auth()->user()->id)->get();
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::whereIn('id', Group::DEFAULT_GROUP_ID_ARRAY)
          ->orWhere('owner_id', auth()->user()->id)
          ->get();

        return view('contacts.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $contact = new Contact;
        $contact->owner_id = auth()->user()->id;
        $contact->group_id = $input['group'];
        $contact->first_name = $input['first_name'];
        $contact->middle_name = $input['middle_name'];
        $contact->last_name = $input['last_name'];
        $contact->email = $input['email'];
        $contact->phone = $input['phone'];
        $contact->address = $input['address'];
        $contact->save();

        return redirect()->route('contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $groups = Group::whereIn('id', Group::DEFAULT_GROUP_ID_ARRAY)
          ->orWhere('owner_id', auth()->user()->id)
          ->get();

        return view('contacts.edit', compact('contact', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $input = $request->all();

        $contact->owner_id = auth()->user()->id;
        $contact->group_id = $input['group'];
        $contact->first_name = $input['first_name'];
        $contact->middle_name = $input['middle_name'];
        $contact->last_name = $input['last_name'];
        $contact->email = $input['email'];
        $contact->phone = $input['phone'];
        $contact->address = $input['address'];
        $contact->save();

        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index');
    }
}
