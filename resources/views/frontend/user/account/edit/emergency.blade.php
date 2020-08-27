@extends('frontend.layouts.app')

@section('title', __('cruds.action.edit').__('cruds.emergency_info.title'))

@section('content')

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @foreach ($contacts as $contact)
                    <x-form method="PATCH" :action="route('frontend.user.profile.emergency.update')"
                            name="form-{{$loop->iteration}}">
                        <x-frontend.card>
                            <div class="d-flex justify-content-between">
                                <x-slot name="header">
                                    @lang('global.Edit') @lang('cruds.emergency_info.title_singular') {{$loop->iteration}}
                                </x-slot>

                                <x-slot name="headerActions">
                                    <x-utils.link class="card-header-action"
                                                  :href="route('frontend.user.account','#emergency')"
                                                  :text="__('global.Cancel')"/>
                                </x-slot>
                            </div>
                            <x-slot name="body">
                                @bind($logged_in_user)
                                <x-form-input name="id" type="hidden"/>
                                @endbind
                                @bind($contact)
                                <x-form-input name="id" type="hidden"/>
                                <x-form-input name="name" required
                                              label="{{trans('cruds.emergency_info.fields.name')}}"/>
                                <x-form-input name="relation"
                                              label="{{trans('cruds.emergency_info.fields.relation')}}"/>
                                <x-form-input name="national_id"
                                              label="{{trans('cruds.emergency_info.fields.national_id')}}"/>
                                <x-form-input name="phone" label="{{trans('cruds.emergency_info.fields.phone')}}"/>
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
                    <hr>
                @endforeach

            </div>
        </div>

@endsection
