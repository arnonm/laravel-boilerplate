<?php

namespace App\Http\Controllers\Frontend\User;

use Illuminate\Http\Request;
use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;

class ProfileEmergencyController extends Controller
{
    public function edit()
    {
        $contacts = Auth()->user()->contacts->all();
        return view('frontend.user.account.edit.emergency')
            ->with('contacts', $contacts);
    }

}
