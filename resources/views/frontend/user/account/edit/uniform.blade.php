@extends('frontend.layouts.app')

@section('title', __('cruds.action.edit').__('cruds.user_uniform.title_singular'))

@section('content')

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <x-form method="PATCH" :action="route('frontend.user.profile.uniform.update')">
                    <x-frontend.card>
                        <div class="d-flex justify-content-between">
                            <x-slot name="header">
                                @lang('global.Edit') @lang('cruds.user_uniform.title_singular')
                            </x-slot>

                            <x-slot name="headerActions">
                                <x-utils.link class="card-header-action"
                                              :href="route('frontend.user.account','#uniform')"
                                              :text="__('global.Cancel')"/>
                            </x-slot>
                        </div>
                        <x-slot name="body">
                            @bind($logged_in_user->uniform)
                            <x-form-input name="id" type="hidden"/>
                            <x-form-select name="shirt_size" required
                                           label="{{trans('cruds.user_uniform.fields.shirt_size')}}"
                                           :options="$logged_in_user->uniform->sizes"/>
                            <x-form-select name="pant_size" required
                                           label="{{trans('cruds.user_uniform.fields.pant_size')}}"
                                           :options="$logged_in_user->uniform->sizes"/>
                            <x-form-input name="belt_size" label="{{trans('cruds.user_uniform.fields.belt_size')}}"/>
                            <x-form-select name="sweatshirt_size"
                                           label="{{trans('cruds.user_uniform.fields.sweatshirt_size')}}"
                                           :options="$logged_in_user->uniform->sizes"/>
                            <x-form-select name="coat_size" label="{{trans('cruds.user_uniform.fields.coat_size')}}"
                                           :options="$logged_in_user->uniform->sizes"/>
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
