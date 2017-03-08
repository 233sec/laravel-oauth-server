<!DOCTYPE html>
<html lang="zh_CN">
    <head>
        <meta charset="utf-8">
        <title>@yield('title', app_name())</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}" />
        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')
        <!-- Styles -->
        @yield('before-styles-end')
        {{ Html::style('css/backend/app.css') }}
        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        @langRTL
            {!! Html::style(elixir('css/rtl.css')) !!}
        @endif
        @yield('after-styles-end')
    </head>
    <body>
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
            <div class="page-header">
                <h2 style="display: inline-block;">授权 <small> {{ config('app.name') }}</small></h2>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">

                @include('includes.partials.messages')
                @yield('content')
                </div>
            </div>
        </div>
        {{ Html::script('js/vendor/jquery/jquery-2.1.4.min.js') }}
        {{ Html::script('js/vendor/bootstrap/bootstrap.min.js') }}
        @yield('before-scripts-end')
        {!! Html::script(elixir('js/frontend.js')) !!}
        @yield('after-scripts-end')

        @include('includes.partials.ga')
    </body>
    <html>


