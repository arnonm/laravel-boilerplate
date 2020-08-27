<?php

namespace App\Http\Controllers\Frontend\User;

use App\Domains\Auth\Models\User;
use App\Http\Requests\Frontend\User\UpdateProfileLicenseRequest;
use App\Http\Requests\Frontend\User\UpdateProfileUniformRequest;
use App\Models\UserLicense;
use App\Models\UserUniform;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProfileUniformController extends Controller
{

    public function edit()
    {
        return view('frontend.user.account.edit.uniform');
    }

    public function update(UpdateProfileUniformRequest $request, UserUniform $userUniform)
    {
        $userUniform = UserUniform::find($request['id']);
        $filtered = $request->validated();
        unset($filtered['id']);
        $userUniform->update($filtered);

        return redirect()->route('frontend.user.account', ['#uniform'])->withFlashSuccess(__('global.profile.successfully_updated'));

    }
}
