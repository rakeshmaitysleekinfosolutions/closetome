<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2> Forgot Password </h2>

<div>
    <p> Hello {!! $user->firstname !!}! </p>
    <p> To confirm the change of password, click on the link below: </p>
    <p>
        <a href="{!! URL::to('account/reset-password', [$user->token]) !!}">{!! URL::to('account/reset-password', [$user->token]) !!}</a>
    </p>
</div>

{{--<div itemscope itemtype="http://schema.org/EmailMessage">--}}
{{--    <meta itemprop="description" content="Zmiana adresu email w serwisie {{ config('app.name') }}"/>--}}
{{--    <div itemprop="action" itemscope itemtype="http://schema.org/ViewAction">--}}
{{--        <link itemprop="url" href="{!! URL::to('account/reset-password', [$user->token]) !!}"/>--}}
{{--        <meta itemprop="name" content="Zmień email"/>--}}
{{--    </div>--}}
{{--</div>--}}

</body>
</html>
