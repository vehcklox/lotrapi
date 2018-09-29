<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LOTR-API</title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    {{--<div class="navbar-collapse collapse w-100 order-3 order-md-0 dual-collapse2">--}}
        {{--<ul class="navbar-nav nav-pills mr-auto">--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="#">Tweet</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</div>--}}
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="#">LOTR API</a>
    </div>

    {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">--}}
        {{--<span class="navbar-toggler-icon"></span>--}}
    {{--</button>--}}
    {{--<div class="navbar-collapse collapse w-100 order-1 dual-collapse2">--}}
        {{--<ul class="navbar-nav ml-auto">--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="#">Documentation</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="#">About</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</div>--}}
</nav>
<div class="container api-info my-5">
    <div class="row justify-content-center">
        <div class="col-8 text-center">
            <h3>LOTR API</h3>
            <p>This is a RESTful API housing all* of the Lord of the Rings data you could want.<br>
                You can this data for RPG games, character sheets, or anything requring LOTR data.<br></p>
            <p><strong>Characters, Books, Films, Species, and Locations</strong></p>
            <p class="big-text"><strong>Includes data from the Hobbit!</strong></p>
            <p>Based on <a href="https://swapi.co">swapi.co</a>.</p>
        </div>
    </div>
</div>
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-9">
            <form action="" method="get">
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="base-url">https://lotrapi.co/api/v1/</span>
                    </div>
                    <input type="text" class="form-control" name="query-data" id="query-data" placeholder="characters/" aria-describedby="query-data">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary api-get" type="submit" value="submit">Submit</button>
                    </div>
                </div>
            </form>
            <p class="api-info">Try typing <a href="#" class="text-white hint">characters/2/</a> or <a href="#" class="text-white hint">realms/3/</a> or <a href="#" class="text-white hint">books/1/</a></p>
        </div>
    </div>
</div>
<div class="container my-3">
    <div class="card w-100">
        <div class="card-header">
            API Example
        </div>
        <div class="card-body api-sandbox">
            <pre id="apiSpan"></pre>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 disclaimer text-center">
            <p><small>*Okay, Okay... You caught me. That's a bold statement. If you see something missing let me know on the
                    <a href="https://www.github.com/vehcklox/lotrapi">git repo</a>
                    or <a href="mailto:adrien@maranville.io">email me</a></small></p>
        </div>
    </div>
</div>
<script src="js/app.js"></script>
<script>
    $(document).ready(
        function () {
            window.apiRequest('characters');
        }
    )
    $(".api-get").click(
        function(event) {
            let query = document.getElementById("query-data").value;
            event.preventDefault();
            window.apiRequest(query);
        }
    );
    $(".hint").click(
        function(event) {
            document.getElementById("query-data").value = event.target.innerHTML;
            let query = document.getElementById("query-data").value;
            event.preventDefault();
            window.apiRequest(query);
        }
    );
</script>
</body>
</html>