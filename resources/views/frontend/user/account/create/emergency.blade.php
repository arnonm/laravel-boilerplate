@extends('frontend.layouts.app')

@section('title', __('cruds.actions.Add').__('cruds.user_emergency.title_singular'))

@section('content')

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <x-form method="POST" action="{{ route('frontend.user.profile.emergency.store') }}">
                    <x-frontend.card>
                        <div class="d-flex justify-content-between">
                            <x-slot name="header">
                                @lang('global.actions.Add') @lang('cruds.user_emergency.title_singular')
                            </x-slot>

                            <x-slot name="headerActions">
                                <x-utils.link class="card-header-action"
                                              :href="route('frontend.user.account','#emergency')"
                                              :text="__('global.actions.Cancel')"/>
                            </x-slot>
                        </div>
                        <x-slot name="body">
                            <x-form-input name="id" :bind="$logged_in_user" type="hidden"/>

                            <x-form-input name="name" required
                                          label="{{trans('cruds.user_emergency.fields.name')}}"/>
                            <x-form-input name="relation" required
                                          label="{{trans('cruds.user_emergency.fields.relation')}}"/>
                            <x-form-input name="national_id"
                                          label="{{trans('cruds.user_emergency.fields.national_id')}}"/>
                            <x-form-input name="phone" label="{{trans('cruds.user_emergency.fields.phone')}}"/>
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
