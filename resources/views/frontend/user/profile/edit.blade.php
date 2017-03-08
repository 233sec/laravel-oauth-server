@extends('frontend.layouts.master')

@section('content')
{{ Form::model($user, ['route' => 'frontend.user.profile.update', 'class' => 'form-horizontal', 'method' => 'PATCH']) }}

<div class="form-group">
    {{ Form::label('name', trans('validation.attributes.frontend.name'), ['class' => 'col-md-3 control-label']) }}
    <div class="col-md-9">
        {{ Form::input('text', 'name', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.frontend.name')]) }}
    </div>
</div>

@if ($user->canChangeEmail())
    <div class="form-group">
        {{ Form::label('email', trans('validation.attributes.frontend.email'), ['class' => 'col-md-3 control-label']) }}
        <div class="col-md-9">
            {{ Form::input('email', 'email', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.frontend.email')]) }}
        </div>
    </div>
@endif

<div class="form-group">
    <div class="col-md-9 col-md-offset-3">
        {{ Form::submit(trans('labels.general.buttons.save'), ['class' => 'btn btn-success 电子邮件地址btn-sm']) }}
    </div>
</div>

{{ Form::close() }}
@endsection
