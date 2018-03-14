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
    {{ style(mix('css/backend.css')) }}
    {{--<link rel="stylesheet" href="{{url('/plugins/animate/animate.css')}}">--}}
    {{--    <link rel="stylesheet" href="{{url('/plugins/bootstrap/css/bootstrap.min.css')}}">--}}
    @stack('after-styles')
</head>

<body class="{{ config('backend.body_classes') }}">
    @include('backend.includes.header')

    <div class="app-body">
        @include('backend.includes.sidebar')

        <main class="main">
            @include('includes.partials.logged-in-as')
            {!! Breadcrumbs::render() !!}

            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="content-header">
                        @yield('page-header')
                    </div><!--content-header-->

                    @include('includes.partials.messages')
                    @yield('content')
                </div><!--animated-->
            </div><!--container-fluid-->
        </main><!--main-->

        @include('backend.includes.aside')
    </div><!--app-body-->

    @include('backend.includes.footer')

    <!-- Scripts -->
    @stack('before-scripts')
    {!! script(mix('js/backend.js')) !!}
    @stack('after-scripts')
    {{--<script type="text/javascript" src="{{url('/plugins/jquery/jquery-3.3.1.min.js')}}"></script>--}}
    {{--<script type="text/javascript" src="{{url('/plugins/bootstrap/js/bootstrap.min.js')}}"></script>--}}
    {{--<link rel="stylesheet" href="{{url('/plugins/summernote/dist/summernote.css')}}">--}}
    {{--<script type="text/javascript" src="{{url('/plugins/summernote/dist/summernote.min.js')}}"></script>--}}
    @yield('after-script-end')

</body>
</html>
