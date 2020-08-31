<?php

namespace App\Http\Controllers\FrontEnd\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontEnd\User\StoreProfileEmergencyRequest;
use App\Http\Requests\FrontEnd\User\UpdateProfileEmergencyRequest;
use App\Models\UserContact;
use App\Models\UserVehicle;
use Illuminate\Http\Request;

class ProfileEmergencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.user.account.create.emergency');

    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfileEmergencyRequest $request)
    {
        $input = $request->validated();
        $input['user_id'] = $input['id'];
        $contact = UserContact::create($input);

        return redirect()->route('frontend.user.account', ['#emergency'])->withFlashSuccess(__('global.profile.successfully_updated'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, UserContact $contact)
    {
        return view('frontend.user.account.edit.emergency')->with('contact', $contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileEmergencyRequest $request, UserContact $contact)
    {
        $input = $request->validated();
        $contact->update($input);
        $contact->save();

        return redirect()->route('frontend.user.account', ['#emergency'])->withFlashSuccess(__('global.profile.successfully_updated'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserContact $contact)
    {
        $contact->delete();
        return redirect()->route('frontend.user.account', ['#emergency'])->withFlashSuccess(__('global.profile.contact_deleted'));
    }
}
