<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Group;
use App\Http\Requests\ContactForm;

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
        $userGroups = Group::whereIn('id', Group::DEFAULT_GROUP_ID_ARRAY)
          ->orWhere('owner_id', auth()->user()->id)
          ->get();

        $groups = [];
        foreach($userGroups as $group) {
            $groups[$group->id] = $group->name;
        }

        return view('contacts.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ContactForm  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactForm $request)
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

        if($request->hasFile('photo')){
            // get photo filename
            $photo = $request->file('photo');
            $fileName = $photo->getClientOriginalName();
            // set path or destination
            $destination = public_path('uploads/' . auth()->user()->email);
            // move photo to destination
            $photo->move($destination, $fileName);
            // assign photo to request data
            $contact->photo = $fileName;
        }

        $contact->save();

        return redirect()->route('contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($contact)
    {
        $contact = Contact::leftJoin('groups', 'contacts.group_id', '=', 'groups.id')
          ->where('contacts.id', $contact)
          ->select('contacts.*', 'groups.name as group')
          ->first();

        $disableForms = true;
        return view('contacts.show', compact('contact', 'disableForms'));
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
     * @param  \Illuminate\Http\ContactForm  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(ContactForm $request, Contact $contact)
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

        if($request->hasFile('photo')){

            // TODO: delete old photo

            // get photo filename
            $photo = $request->file('photo');
            $fileName = $photo->getClientOriginalName();
            // set path or destination
            $destination = public_path('uploads/' . auth()->user()->email);
            // move photo to destination
            $photo->move($destination, $fileName);
            // assign photo to request data
            $contact->photo = $fileName;
        }

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
