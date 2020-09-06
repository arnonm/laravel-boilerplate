@extends('frontend.layouts.app')

@section('title', __('global.Dashboard'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('global.Dashboard')
                    </x-slot>

                    <x-slot name="body">
                        <div class="row">

                            <x-frontend.card>
                                <x-slot name="header">
                                    Info Board
                                </x-slot>
                                <x-slot name="body">
                                    200 Shifts
                                </x-slot>
                            </x-frontend.card>


                            <x-frontend.card>
                                <x-slot name="header">
                                    Shifts
                                </x-slot>
                                <x-slot name="body">
                                    <ul>
                                        <button>All</button>
                                        <button>Hospitals</button>
                                        <button>Ambulances</button>
                                        <button>Terem</button>

                                    </ul>
                                </x-slot>
                            </x-frontend.card>

                            <x-frontend.card>
                                <x-slot name="header">
                                    Birthdays
                                </x-slot>
                                <x-slot name="body">
                                    xxxx
                                    xxxx
                                </x-slot>
                            </x-frontend.card>
                        </div>
                        <div class="row">

                            <x-frontend.card>
                                <x-slot name="header">
                                    Personal Information
                                </x-slot>
                                <x-slot name="body">
                                    200 Shifts
                                </x-slot>
                            </x-frontend.card>

                        </div>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection
