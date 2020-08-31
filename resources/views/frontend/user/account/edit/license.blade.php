@extends('frontend.layouts.app')

@section('title', __('cruds.action.edit').__('cruds.user_license.title_singular'))

@section('content')

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <x-form method="PATCH" :action="route('frontend.user.profile.license.update')">
                    <x-frontend.card>
                        <div class="d-flex justify-content-between">
                            <x-slot name="header">
                                @lang('global.actions.Edit') @lang('cruds.user_license.title_singular')
                            </x-slot>

                            <x-slot name="headerActions">
                                <x-utils.link class="card-header-action"
                                              :href="route('frontend.user.account','#license')"
                                              :text="__('global.actions.Cancel')"/>
                            </x-slot>
                        </div>
                        <x-slot name="body">
                            @bind($logged_in_user->license)
                            <x-form-input name="id" type="hidden"/>
                            <x-form-input name="number" required label="{{trans('cruds.user_license.fields.number')}}"/>
                            <x-form-input name="year" label="{{trans('cruds.user_license.fields.year')}}"/>
                            <x-form-select name="type" label="{{trans('cruds.user_license.fields.type')}}"
                                           :options="$logged_in_user->license->license_types"/>
                            <x-form-input name="expires"
                                          label="{{trans('cruds.user_license.fields.expiration_date')}}"/>
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
