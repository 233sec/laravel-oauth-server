@extends('frontend.layouts.master')
@section('content')

<form method="POST" action="http://server.oauth:8000/profile/update" accept-charset="UTF-8" class="form-horizontal">
    <div class="form-group">
        <label for="name" class="col-md-3 control-label">{{ trans('labels.frontend.user.profile.avatar') }}</label>
        <div class="col-md-9">
            <img src="{{ $user->picture }}" class="user-profile-image" />
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-md-3 control-label">{{ trans('labels.frontend.user.profile.name') }}</label>
        <div class="col-md-9">
            {{ $user->name }}
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-md-3 control-label">{{ trans('labels.frontend.user.profile.email') }}</label>
        <div class="col-md-9">
            {{ $user->email }}
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-md-3 control-label">{{ trans('labels.frontend.user.profile.created_at') }}</label>
        <div class="col-md-9">
            {{ $user->created_at }} ({{ $user->created_at->diffForHumans() }})
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-md-3 control-label">{{ trans('labels.frontend.user.profile.last_updated') }}</label>
        <div class="col-md-9">
            {{ $user->updated_at }} ({{ $user->updated_at->diffForHumans() }})
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-md-3 control-label">{{ trans('labels.general.actions') }}</label>
        <div class="col-md-9">

            {{ link_to_route('frontend.user.profile.edit', trans('labels.frontend.user.profile.edit_information'), [], ['class' => 'btn btn-primary btn-xs']) }}
            @if ($user->canChangePassword())
                {{ link_to_route('auth.password.change', trans('navs.frontend.user.change_password'), [], ['class' => 'btn btn-warning btn-xs']) }}
            @endif
        </div>
    </div>
</form>
@endsection
