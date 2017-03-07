<html>
    <head>
        <link media="all" type="text/css" rel="stylesheet" href="https://cdn.css.net/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <b>{{$client->getName()}}</b> is waiting for you authorization
            <form method="post" action="{{route('oauth.authorize.post', $params)}}">
              {{ csrf_field() }}
              <input type="hidden" name="client_id" value="{{$params['client_id']}}">
              <input type="hidden" name="redirect_uri" value="{{$params['redirect_uri']}}">
              <input type="hidden" name="response_type" value="{{$params['response_type']}}">
              <input type="hidden" name="state" value="{{$params['state']}}">
              <input type="hidden" name="scope" value="{{$params['scope']}}">

              <button type="submit" name="approve" value="1" class="btn btn-success">Approve</button>
              <button type="submit" name="deny" value="1" class="btn btn-default">Deny</button>
            </form>
        </div>
    </body>
<html>
