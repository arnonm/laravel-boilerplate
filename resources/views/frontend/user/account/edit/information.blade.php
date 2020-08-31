@extends('frontend.layouts.app')

@section('title', __('cruds.action.edit').__('cruds.user.personal_details'))

@push('after-styles')
    <style>
        .btn-avatar {
            position: relative;
            vertical-align: bottom;
            overflow: hidden;
            height: 50%;
            bottom: 0;
            text-align: left;
        }

        .btn-avatar input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }
    </style>
@endpush

@section('content')

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <x-forms.patch :action="route('frontend.user.profile.update')" enctype="multipart/form-data">
                    <x-frontend.card>
                        <div class="d-flex justify-content-between">
                            <x-slot name="header">
                                @lang('global.actions.Edit') @lang('cruds.user_details.contact_information')
                            </x-slot>

                            <x-slot name="headerActions">
                                <x-utils.link class="card-header-action"
                                              :href="route('frontend.user.account','#contact')"
                                              :text="__('global.actions.Cancel')"/>
                            </x-slot>
                        </div>
                        <x-slot name="body">
                            @bind($logged_in_user)
                            <x-form-input name="name" type="text" label="{{trans('cruds.user.fields.name')}}"/>

                            @if ($logged_in_user->canChangeAvatar())

                                <div class="form-group">
                                    <label for="avatar">@lang('cruds.user.fields.avatar')</label>

                                    <div class="col-md-9 d-flex align-text-bottom row">
                                        <img src="{{ asset($logged_in_user->avatar) }}" class=""/>
                                        <div class="btn btn-primary btn-avatar">
                                            @lang('global.actions.Browse')<input type="file" name="avatar" id="avatar">
                                        </div>
                                    </div>
                                </div>
                            @endif




                            @if ($logged_in_user->canChangeEmail())

                                <div class="form-group">
                                    <label for="email"
                                           class="">@lang('cruds.user.fields.email')</label>

                                    <div class="">
                                        <x-utils.alert type="info" class="mb-3" :dismissable="false">
                                            <i class="fas fa-info-circle"></i> @lang('global.If you change your e-mail you will be logged out until you confirm your new e-mail address.')
                                        </x-utils.alert>

                                        <input type="email" name="email" id="email" class="form-control"
                                               placeholder="{{ __('cruds.user.fields.email') }}"
                                               value="{{ old('email') ?? $logged_in_user->email }}" required
                                               autocomplete="email"/>
                                    </div>
                                </div><!--form-group-->
                            @endif
                        </x-slot>
                        <x-slot name="footer">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-sm btn-primary float-right"
                                        type="submit">@lang('global.actions.Update')</button>
                            </div>
                        </x-slot>
                    </x-frontend.card>
                </x-forms.patch>
            </div>
        </div>
    </div>
@endsection
