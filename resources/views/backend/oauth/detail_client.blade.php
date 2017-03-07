@extends ('backend.layouts.master')

@section ('title', '应用编辑')

@section('after-styles-end')
@stop

@section('page-header')
    <h1>
        应用编辑
        <small> 应用编辑 </small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title"> 应用编辑 </h3>
        </div>

        <div class="box-body">

            {{ $Editable
                ->template([
                        'created_at'=>['datetime'],
                        'updated_at'=>['datetime'],
                        'lengend_1' => ['lengend'],
                    ])
                ->make() }}
        </div>
    </div>
@stop
