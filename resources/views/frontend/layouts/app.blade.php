<!DOCTYPE html>
@langrtl
    <html lang="{{ app()->getLocale() }}" dir="rtl">
@else
    <html lang="{{ app()->getLocale() }}">
@endlangrtl
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')

        {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
        @stack('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        {{ style(mix('css/frontend.css')) }}
        {{--<link rel="stylesheet" href="{{url('/plugins/animate/animate.css')}}">--}}
{{--        <link rel="stylesheet" href="{{url('/plugins/bootstrap/css/bootstrap.min.css')}}">--}}
        <link href="css/blog-home.css" rel="stylesheet">

        @stack('after-styles')
    </head>
    <body style="padding-top: 0;">
        <div id="app">
            @include('includes.partials.logged-in-as')
            @include('frontend.includes.nav')

            <div class="container">
                @include('includes.partials.messages')
                @yield('content')
            </div><!-- container -->
        </div><!-- #app -->

        <!-- Scripts -->
        @stack('before-scripts')
        {!! script(mix('js/frontend.js')) !!}
        @stack('after-scripts')

        @include('includes.partials.ga')
    </body>
<script type="text/javascript" src="{{url('/plugins/jquery/jquery-3.3.1.min.js')}}"></script>
{{--<script type="text/javascript" src="{{url('/plugins/bootstrap/js/bootstrap.min.js')}}"></script>--}}
{{--<link rel="stylesheet" href="{{url('/plugins/summernote/dist/summernote.css')}}">--}}

<script type="text/javascript" src="{{url('/plugins/summernote/dist/summernote.min.js')}}"></script>
</html>
