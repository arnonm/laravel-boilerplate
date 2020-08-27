@extends('frontend.layouts.app')

@section('title', __('global.My Account'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('cruds.user.My Account')
                    </x-slot>

                    <x-slot name="body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <x-utils.link
                                    :text="__('cruds.user.My Profile')"
                                    class="nav-link active"
                                    id="profile-tab"
                                    data-toggle="pill"
                                    href="#profile"
                                    role="tab"
                                    aria-controls="profile"
                                    aria-selected="true"/>

                                <x-utils.link
                                    :text="__('cruds.user_details.personal_details')"
                                    class="nav-link"
                                    id="personal-tab"
                                    data-toggle="pill"
                                    href="#personal"
                                    role="tab"
                                    aria-controls="personal"
                                    aria-selected="true"/>

                                <x-utils.link
                                    :text="__('cruds.user_details.contact_information')"
                                    class="nav-link"
                                    id="contact-tab"
                                    data-toggle="pill"
                                    href="#contact"
                                    role="tab"
                                    aria-controls="contact"
                                    aria-selected="true"/>

                                <x-utils.link
                                    :text="__('cruds.emergency_info.title')"
                                    class="nav-link"
                                    id="emergency-tab"
                                    data-toggle="pill"
                                    href="#emergency"
                                    role="tab"
                                    aria-controls="emergency"
                                    aria-selected="true"/>

                                <x-utils.link
                                    :text="__('cruds.user_uniform.title_singular')"
                                    class="nav-link"
                                    id="uniform-tab"
                                    data-toggle="pill"
                                    href="#uniform"
                                    role="tab"
                                    aria-controls="uniform"
                                    aria-selected="true"/>

                                <x-utils.link
                                    :text="__('cruds.user_vehicle.title')"
                                    class="nav-link"
                                    id="vehicle-tab"
                                    data-toggle="pill"
                                    href="#vehicle"
                                    role="tab"
                                    aria-controls="vehicle"
                                    aria-selected="true"/>

                                <x-utils.link
                                    :text="__('cruds.user_license.title_singular')"
                                    class="nav-link"
                                    id="license-tab"
                                    data-toggle="pill"
                                    href="#license"
                                    role="tab"
                                    aria-controls="license"
                                    aria-selected="true"/>


                                @if (! $logged_in_user->isSocial())
                                    <x-utils.link
                                        :text="__('cruds.user.fields.password')"
                                        class="nav-link"
                                        id="password-tab"
                                        data-toggle="pill"
                                        href="#password"
                                        role="tab"
                                        aria-controls="password"
                                        aria-selected="false"/>
                                @endif

                                <x-utils.link
                                    :text="__('global.Two Factor Authentication')"
                                    class="nav-link"
                                    id="two-factor-authentication-tab"
                                    data-toggle="pill"
                                    href="#two-factor-authentication"
                                    role="tab"
                                    aria-controls="two-factor-authentication"
                                    aria-selected="false"/>
                            </div>
                        </nav>

                        <div class="tab-content" id="profile-tabsContent">
                            <div class="tab-pane fade pt-3 show active" id="profile" role="tabpanel"
                                 aria-labelledby="profile-tab">
                                @include('frontend.user.account.tabs.profile')
                            </div><!--tab-profile-->

                            <div class="tab-pane fade pt-3  " id="personal" role="tabpanel"
                                 aria-labelledby="personal-tab">
                                @include('frontend.user.account.tabs.personal')
                            </div><!--tab-personal-->

                            <div class="tab-pane fade pt-3  " id="contact" role="tabpanel"
                                 aria-labelledby="contact-tab">
                                @include('frontend.user.account.tabs.contact')
                            </div><!--tab-contact-->

                            <div class="tab-pane fade pt-3  " id="emergency" role="tabpanel"
                                 aria-labelledby="emergency-tab">
                                @include('frontend.user.account.tabs.emergency')
                            </div><!--tab-emergency-->

                            <div class="tab-pane fade pt-3  " id="uniform" role="tabpanel"
                                 aria-labelledby="uniform-tab">
                                @include('frontend.user.account.tabs.uniform')
                            </div><!--tab-uniform-->


                            <div class="tab-pane fade pt-3  " id="vehicle" role="tabpanel"
                                 aria-labelledby="vehicle-tab">
                                @include('frontend.user.account.tabs.vehicle')
                            </div><!--tab-vehicle-->


                            <div class="tab-pane fade pt-3  " id="license" role="tabpanel"
                                 aria-labelledby="license-tab">
                                @include('frontend.user.account.tabs.license')
                            </div><!--tab-license-->


                            @if (! $logged_in_user->isSocial())
                                <div class="tab-pane fade pt-3" id="password" role="tabpanel"
                                     aria-labelledby="password-tab">
                                    @include('frontend.user.account.tabs.password')
                                </div><!--tab-password-->
                            @endif

                            <div class="tab-pane fade pt-3" id="two-factor-authentication" role="tabpanel"
                                 aria-labelledby="two-factor-authentication-tab">
                                @include('frontend.user.account.tabs.two-factor-authentication')
                            </div><!--tab-information-->
                        </div><!--tab-content-->
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection
