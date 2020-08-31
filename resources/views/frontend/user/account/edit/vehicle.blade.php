@extends('frontend.layouts.app')

@section('title', __('cruds.actions.edit').__('cruds.user_vehicle.title_singular'))

@section('content')

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <x-form method="PATCH" action="{{ route('frontend.user.profile.vehicle.update',[$vehicle->id]) }}">
                    <x-frontend.card>
                        <div class="d-flex justify-content-between">
                            <x-slot name="header">
                                @lang('global.actions.Edit') @lang('cruds.user_vehicle.title_singular')
                            </x-slot>

                            <x-slot name="headerActions">
                                <x-utils.link class="card-header-action"
                                              :href="route('frontend.user.account','#vehicle')"
                                              :text="__('global.actions.Cancel')"/>
                            </x-slot>
                        </div>
                        <x-slot name="body">
                            @bind($vehicle)
                            <x-form-input name="id" type="hidden"/>
                            <x-form-input name="license_plate" required
                                          label="{{trans('cruds.user_vehicle.fields.license_plate')}}"/>
                            <x-form-input name="manufacturer" required
                                          label="{{trans('cruds.user_vehicle.fields.manufacturer')}}"/>
                            <x-form-input name="manufacturing_date"
                                          label="{{trans('cruds.user_vehicle.fields.manufacturing_date')}}"/>
                            <x-form-checkbox name="offroad"
                                             label="{{trans('cruds.user_vehicle.fields.offroad')}}"/>
                            <p></p>
                            <x-form-checkbox name="towing" label="{{trans('cruds.user_vehicle.fields.towing')}}"/>
                            @endbind
                        </x-slot>
                        <x-slot name="footer">
                            @if (session()->has('lang-rtl'))
                                <x-form-submit
                                    class="btn btn-sm btn-primary float-left">@lang('global.actions.Update')</x-form-submit>
                            @else
                                <x-form-submit
                                    class="btn btn-sm btn-primary float-right">@lang('global.actions.Update')</x-form-submit>
                            @endif
                        </x-slot>
                        {{--                    @include('backend.auth.includes.permissions')--}}

                    </x-frontend.card>
                </x-form>
            </div>
        </div>

@endsection
