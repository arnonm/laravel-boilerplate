@extends('backend.layouts.app')

@section('title', __('global.Deactivated Users'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('global.Deactivated Users')
        </x-slot>

        <x-slot name="body">
            <livewire:users-table status="deactivated" />
        </x-slot>
    </x-backend.card>
@endsection
