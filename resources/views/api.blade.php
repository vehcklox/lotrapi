<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="NONE,NOARCHIVE">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LOTR-API</title>
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-3 order-md-0 dual-collapse2">
        <ul class="navbar-nav nav-pills mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Tweet</a>
            </li>
        </ul>
    </div>
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="#">LOTR API</a>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse w-100 order-1 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Documentation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
        </ul>
    </div>
</nav>
<main role="main">
    <div class="py-5">
        <div class="container">
            <div class="request-info">
                <pre class="border bg-white p-3 rounded prettyprint"><b>{{ $request->getMethod() }}</b> {{ $request->getRequestUri() }}</pre>
            </div>

            <div class="response-info">
                        <pre class="border bg-white p-3 rounded prettyprint"><code><span class="meta nocode"><b>HTTP {{ $response->status() }} {{ $response::$statusTexts[$response->status()] }}</b>
@foreach($response->headers as $key => $values)
@foreach($values as $value)
<b>{{ ucwords($key, '-') }}:</b> <span class="lit">{{ $value }}</span>
@endforeach
@endforeach

</span>{!! $response->getContent() !!}</code></pre>
            </div>
        </div>
    </div>
</main>

<div class="container">
    <div class="row">
        <div class="col-12 disclaimer text-center">
            <a href="https://www.github.com/vehcklox/lotrapi">git repo</a>
            |
            <a href="mailto:adrien@maranville.io">email me</a></small></p>
        </div>
    </div>
</div>

<script src="/js/app.js"></script>
<script async src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
<style>.prettyprint a .str { color: inherit }</style>
</body>
</html>
