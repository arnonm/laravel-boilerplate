@extends('frontend.layouts.app')

@section('title', __('cruds.action.edit').__('cruds.user.personal_details'))

@section('content')

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <x-form method="PATCH" :action="route('frontend.user.profile.contact.update')">
                    <x-frontend.card>
                        <div class="d-flex justify-content-between">
                            <x-slot name="header">
                                @lang('global.Edit') @lang('cruds.user_details.contact_information')
                            </x-slot>

                            <x-slot name="headerActions">
                                <x-utils.link class="card-header-action"
                                              :href="route('frontend.user.account','#contact')"
                                              :text="__('global.Cancel')"/>
                            </x-slot>
                        </div>
                        <x-slot name="body">
                            @bind($logged_in_user->details)
                            <x-form-input name="id" type="hidden"/>
                            <x-form-input name="cell_phone" required
                                          label="{{trans('cruds.user_details.fields.cell_phone')}}"/>
                            <x-form-input name="address" label="{{trans('cruds.user_details.fields.address')}}"/>
                            <x-form-input name="address2" label="{{trans('cruds.user_details.fields.address2')}}"/>
                            <x-form-input name="city" label="{{trans('cruds.user_details.fields.city')}}"/>
                            <x-form-input name="postcode" label="{{trans('cruds.user_details.fields.postcode')}}"/>
                            @endbind
                        </x-slot>
                        <x-slot name="footer">
                            @if (session()->has('lang-rtl'))
                                <x-form-submit
                                    class="btn btn-sm btn-primary float-left">@lang('global.Update')</x-form-submit>
                            @else
                                <x-form-submit
                                    class="btn btn-sm btn-primary float-right">@lang('global.Update')</x-form-submit>
                            @endif
                        </x-slot>
                        {{--                    @include('backend.auth.includes.permissions')--}}

                    </x-frontend.card>
                </x-form>
            </div>
        </div>

@endsection
