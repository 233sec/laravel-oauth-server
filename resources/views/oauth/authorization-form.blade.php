@extends('frontend.layouts.master')
@section('content')
<form method="post" action="{{route('oauth.authorize.post', $params)}}">
    <div class="form-group">
        <b>用户</b> {{ access()->user()->name }} <a href="{{ URL::route('frontend.user.dashboard') }}" target="_blank" class="btn btn-default btn-xs pull-right">我的资料</a> <a href="{{ URL::route('auth.logout') }}" target="_self" class="btn btn-link btn-xs pull-right">换个账号</a>
    </div>
    <div class="form-group">
        <b>应用</b> {{$client->getName()}} 
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="control-label"> 授权</label>
        <div class="checkbox"> <label> <input type="checkbox" checked="checked" readonly="readonly" disabled="disabled"> 同步退出(仅限同一集团/Group下的业务) </label> </div>
        <div class="checkbox"> <label> <input type="checkbox" checked="checked" readonly="readonly" disabled="disabled"> 获取我的唯一标示(不暴露用户ID和用户名) </label> </div>
        <div class="checkbox"> <label> <input type="checkbox" name="resouces[email]" value="1"> 获取我的Email </label> </div>
        <div class="checkbox"> <label> <input type="checkbox" name="resouces[avatar]" value="1"> 获取我的头像 </label> </div>
    </div>
    <p>
    </p>
    {{ csrf_field() }}
    <input type="hidden" name="client_id" value="{{$params['client_id']}}">
    <input type="hidden" name="redirect_uri" value="{{$params['redirect_uri']}}">
    <input type="hidden" name="response_type" value="{{$params['response_type']}}">
    <input type="hidden" name="state" value="{{$params['state']}}">
    <input type="hidden" name="scope" value="{{$params['scope']}}">

    <button type="submit" name="approve" value="1" class="btn btn-success btn-sm no-border" id="btn-approve">授权登录</button>
    <button type="submit" name="deny" value="1" class="btn btn-link btn-sm no-border">取消返回</button>
</form>
@stop
@section('after-scripts-end')
<script>
$(document).ready(function(){
    @if ($client->getAutoSubmit())
        $('#btn-approve').click();
    @else
        $('body').removeClass('hide');
    @endif
});
</script>
@stop
