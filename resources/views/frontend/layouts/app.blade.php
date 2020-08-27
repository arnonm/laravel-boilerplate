<!doctype html>
<html @langrtl dir="rtl" @endlangrtl lang="{{ htmlLang() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ trans('global.AppName') ?? appName() }} | @yield('title')</title>
    <meta name="description" content="@yield('meta_description', appName())">
    <meta name="author" content="@yield( trans('global.meta_author'))">
    @yield('meta')

    @stack('before-styles')
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ mix('css/frontend.css') }}" rel="stylesheet">
    <livewire:styles/>
    @stack('after-styles')

    {{--    @include('includes.partials.ga')--}}
</head>
<body>
@include('includes.partials.read-only')
@include('includes.partials.logged-in-as')
@include('includes.partials.announcements')
@include('frontend.includes.nav')

<div id="app">
    @include('includes.partials.messages')

    <main>
        @yield('content')
    </main>
</div><!--app-->

@stack('before-scripts')
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/frontend.js') }}"></script>
@langrtl
<!-- script src="{{ asset('js/rtl.js') }}" --></script>
<
script >
// console.log("running")
// layout.setDirection('rtl')
</script>
@endlangrtl
<livewire:scripts/>
@stack('after-scripts')
</body>
</html>
