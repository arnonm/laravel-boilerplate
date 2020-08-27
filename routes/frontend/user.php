<?php

use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\ProfileContactController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\ProfileEmergencyController;
use App\Http\Controllers\Frontend\User\ProfileLicenseController;
use App\Http\Controllers\Frontend\User\ProfileUniformController;
use Tabuna\Breadcrumbs\Trail;

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the user has not confirmed their email
 */
Route::group(['as' => 'user.', 'middleware' => ['auth', 'password.expires', config('boilerplate.access.middleware.verified')]], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])
        ->middleware('is_user')
        ->name('dashboard')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('global.Dashboard'), route('frontend.user.dashboard'));
        });

    Route::get('account', [AccountController::class, 'index'])
        ->name('account')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('global.My Account'), route('frontend.user.account'));
        });


    Route::get('profile/contact/edit', [ProfileContactController::class, 'edit'])
        ->name('profile.contact.edit');

    Route::get('profile/information/edit', function () {
        return view('frontend.user.account.edit.information');
    })->name('profile.information.edit');

    Route::get('profile/vehicle/edit', function () {
        return view('frontend.user.account.edit.vehicle');
    })->name('profile.vehicle.edit');

    Route::get('profile/license/edit', [ProfileLicenseController::class, 'edit'])
        ->name('profile.license.edit');

    Route::get('profile/emergency/edit', [ProfileEmergencyController::class, 'edit'])
        ->name('profile.emergency.edit');

    Route::get('profile/uniform/edit', [ProfileUniformController::class, 'edit'])
        ->name('profile.uniform.edit');

    Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');


    Route::patch('profile/contact/update', [ProfileContactController::class, 'update'])
        ->name('profile.contact.update');

    Route::patch('profile/emergency/update', [ProfileContactController::class, 'update'])
        ->name('profile.emergency.update');

    Route::patch('profile/contact/update', [ProfileLicenseController::class, 'update'])
        ->name('profile.license.update');

    Route::patch('profile/uniform/update', [ProfileUniformController::class, 'update'])
        ->name('profile.uniform.update');

});
