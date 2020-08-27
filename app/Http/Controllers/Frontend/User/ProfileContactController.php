<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Requests\Frontend\User\UpdateProfileContactRequest;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;

class ProfileContactController extends Controller
{
    public function edit(Request $request, User $user)
    {
        return view('frontend.user.account.edit.contact');
    }

    public function update(UpdateProfileContactRequest $request, UserDetails $userDetails)
    {
        $userDetails = UserDetails::find($request['id']);
        $filtered = $request->validated();
        unset($filtered['id']);
        $userDetails->update($filtered);

        return redirect()->route('frontend.user.account', ['#information'])->withFlashSuccess(__('global.profile.successfully_updated'));

    }
}
