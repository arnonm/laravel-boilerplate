<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\StoreProfileVehicleRequest;
use App\Http\Requests\Frontend\User\UpdateProfileVehicleRequest;
use App\Models\UserVehicle;
use Illuminate\Http\Request;

class ProfileVehicleController extends Controller
{
    public function edit(Request $request, UserVehicle $vehicle)
    {
        return view('frontend.user.account.edit.vehicle')->with('vehicle', $vehicle);
    }

    public function update(UpdateProfileVehicleRequest $request, UserVehicle $vehicle)
    {
        $input = $request->validated();
        $input['towing'] = ($input['towing'] ?? 0);
        $input['offroad'] = ($input['offroad'] ?? 0);
        $vehicle->update($input);
        $vehicle->save();

        return redirect()->route('frontend.user.account', ['#vehicle'])->withFlashSuccess(__('global.profile.successfully_updated'));

    }

    public function create()
    {
        return view('frontend.user.account.create.vehicle');
    }

    public function store(StoreProfileVehicleRequest $request)
    {
        $input = $request->validated();
        $input['user_id'] = $input['id'];
        $input['towing'] = ($input['towing'] ?? 0);
        $input['offroad'] = ($input['offroad'] ?? 0);
        $vehicle = UserVehicle::create($input);

        return redirect()->route('frontend.user.account', ['#vehicle'])->withFlashSuccess(__('global.profile.successfully_updated'));

    }

    public function destroy(UserVehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('frontend.user.account', ['#vehicle'])->withFlashSuccess(__('global.profile.vehicle_deleted'));
    }
}
