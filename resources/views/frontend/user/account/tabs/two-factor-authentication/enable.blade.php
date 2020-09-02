@extends('frontend.layouts.app')

@section('title', __('global.2fa.Enable Two Factor Authentication'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('global.2fa.Enable Two Factor Authentication')
                    </x-slot>

                    <x-slot name="body">
                        <div class="row">
                            <div class="col-xl-4">
                                <h5><strong>@lang('global.2fa.Step 1: Configure your 2FA app')</strong></h5>

                                <p>@lang('global.2fa.To enable 2FA, you need a 2FA authenticator')</p>

                                <p>@lang('global.2fa.Most applications will let QR code')</p>
                            </div><!--col-->

                            <div class="col-xl-8">
                                <div class="text-center">
                                    {!! $qrCode !!}

                                    <p><i class="fa fa-key"> {{ $secret }}</i></p>
                                </div>
                            </div><!--col-->
                        </div><!--row-->

                        <hr/>

                        <h5><strong>@lang('global.2fa.Step 2: Enter a 2FA code')</strong></h5>

                        <p>@lang('global.2fa.Generate a code from your 2FA app and enter it below:')</p>

                        <livewire:two-factor-authentication></livewire:two-factor-authentication>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-8-->
        </div><!--row-->
    </div><!--container-->
@endsection
