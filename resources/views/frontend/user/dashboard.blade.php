@extends('frontend.layouts.master')
@section('content')
<table class="table">
    <tr>
        <th>{{ trans('labels.frontend.user.profile.avatar') }}</th>
        <td><img src="{{ $user->picture }}" class="user-profile-image" /></td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.name') }}</th>
        <td>{{ $user->name }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.email') }}</th>
        <td>{{ $user->email }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.created_at') }}</th>
        <td>{{ $user->created_at }} ({{ $user->created_at->diffForHumans() }})</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.last_updated') }}</th>
        <td>{{ $user->updated_at }} ({{ $user->updated_at->diffForHumans() }})</td>
    </tr>
    <tr>
        <th>{{ trans('labels.general.actions') }}</th>
        <td>
            {{ link_to_route('frontend.user.profile.edit', trans('labels.frontend.user.profile.edit_information'), [], ['class' => 'btn btn-primary btn-xs']) }}

            @if ($user->canChangePassword())
                {{ link_to_route('auth.password.change', trans('navs.frontend.user.change_password'), [], ['class' => 'btn btn-warning btn-xs']) }}
            @endif
        </td>
    </tr>
</table>
@endsection
