<?php

namespace App\Http\Controllers\Frontend\User;

use App\Domains\Auth\Models\User;
use App\Http\Requests\Frontend\User\UpdateProfileLicenseRequest;
use App\Models\UserLicense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProfileLicenseController extends Controller
{

    public function edit()
    {
//        $user= Auth()->user()->license->licenses;
//        dd($user);
        return view('frontend.user.account.edit.license');
    }

    public function update(UpdateProfileLicenseRequest $request, UserLicense $userLicense)
    {
        $userLicense = UserLicense::find($request['id']);
        $filtered = $request->validated();
        $filtered['expiration_date'] = $filtered['expires'];
        unset($filtered['expires']);
        unset($filtered['id']);
        $userLicense->update($filtered);

        return redirect()->route('frontend.user.account', ['#license'])->withFlashSuccess(__('global.profile.successfully_updated'));

    }
}
