<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}" />

        <title>@yield('title', app_name())</title>

        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'Default Description')">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')

        <!-- Styles -->
        @yield('before-styles-end')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        @langRTL
            {{ Html::style(elixir('css/backend-rtl.css')) }}
            {{ Html::style(elixir('css/rtl.css')) }}
        @else
            {{ Html::style('css/backend/app.css') }}
        @endif
        {{ Html::style('css/backend/plugin/datatables/dataTables.bootstrap.min.css') }}
        {{ Html::style('js/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}
        {{ Html::style('css/backend/plugin/daterangepicker/daterangepicker.css') }}

        {{ Html::style('js/vendor/select2/select2.min.css') }}
        {{ Html::style('js/vendor/select2/select2-bootstrap.min.css') }}
        {{ Html::style('js/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}
        {{ Html::style('js/vendor/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css') }}
        {{ Html::style('css/backend/app.css') }}

        @yield('after-styles-end')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
       <!--[if lt IE 9]>
        {{ HTML::script('js/vendor/html5shiv/r29/html5.min.js') }}
        {{ HTML::script('js/vendor/respond.js/1.4.2/respond.min.js') }}
        <![endif]-->
    </head>
    <body class="skin-{{ config('backend.theme') }} {{ config('backend.layout') }} sidebar-mini">
        <script type="text/javascript">
            try{
                document.body.className+=' '+document.cookie.match(/bodyClass=([^;]+)/)[1];
            }catch(e){}
        </script>
        @include('includes.partials.logged-in-as')

        <div class="wrapper">
            @include('backend.includes.header')
            @include('backend.includes.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    @yield('page-header')

                    {{-- Change to Breadcrumbs::render() if you want it to error to remind you to create the breadcrumbs for the given route --}}
                    {!! Breadcrumbs::renderIfExists() !!}
                </section>

                <!-- Main content -->
                <section class="content">
                    @include('includes.partials.messages')
                    @yield('content')
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            @include('backend.includes.footer')
        </div><!-- ./wrapper -->

        <!-- JavaScripts -->
        <!-- JavaScripts -->
        {{ Html::script('js/vendor/jquery/jquery-2.1.4.min.js') }}
        {{ Html::script('js/vendor/bootstrap/bootstrap.min.js') }}
        {{ Html::script('js/backend/plugin/datatables/jquery.dataTables.min.js') }}
        {{ Html::script('js/backend/plugin/datatables/dataTables.bootstrap.min.js') }}
        {{ Html::script('js/vendor/bootbox/bootbox.min.js') }}
        {{ Html::script('js/vendor/moment/moment-with-locales.min.js') }}
        {{ Html::script('js/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}
        {{ Html::script('js/vendor/daterangepicker/daterangepicker.js') }}
        {{ Html::script('ckeditor/ckeditor.js') }}
        {{ Html::script('js/vendor/select2/select2.min.js') }}

        {{ Html::script('js/vendor/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}
        {{ Html::script('js/vendor/parsley/parsley.min.js') }}
        {{ Html::script('js/vendor/sortable/Sortable.min.js') }}
        {{ Html::script('js/vendor/ajaxfileuploader/ajaxfileuploader.min.js') }}
        {{ Html::script('js/backend/plugin/datatables/dataTables.buttons.min.js') }}
        {{ Html::script('js/backend/plugin/datatables/jszip.min.js') }}
        {{ Html::script('js/backend/plugin/datatables/buttons.html5.min.js') }}
        <script type="text/javascript"> $.queries = {!! json_encode($_GET)  !!}; </script>

        @yield('before-scripts-end')
        {{ Html::script('js/backend/app.js') }}
        @yield('after-scripts-end')
    </body>
</html>
