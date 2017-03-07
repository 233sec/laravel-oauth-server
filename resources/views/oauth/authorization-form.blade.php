<html>
    <head>
        {{ Html::style('css/backend/app.css') }}
    </head>
    <body>
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
<div class="page-header">
  <h2>授权 <small> {{ config('app.name') }}</small></h2>
</div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                <form method="post" action="{{route('oauth.authorize.post', $params)}}">
                    <div class="form-group">
                        <b>用户</b> {{ access()->user()->name }} 
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

                    <button type="submit" name="approve" value="1" class="btn btn-success btn-sm no-border">授权登录</button>
                    <button type="submit" name="deny" value="1" class="btn btn-link btn-sm no-border">取消返回</button>
                </form>
  </div>
</div>
            </div>
    </body>
<html>
