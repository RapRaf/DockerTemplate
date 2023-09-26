@section('nav')
    <div class="app-bar">
        <a href="{{ config('url.base') }}/">
            <div id="bar-logo-figure">
            </div>
        </a>
        <div class="box-title">
            <h1>{{ config('app.name') }}</h1>
        </div>
    </div>
    <div style="height: 100px"></div>
    <style>
        #bar-logo-figure {
            background-image: url({{ asset('images/logo.png') }});
            background-repeat: no-repeat;
            background-size: contain;
            height: 100px;
            width: 100px;
        }

        #bar-logo-figure a {
            position: relative;
            height: fit-content;
            width: fit-content;
        }

        .box-title {
            height: fit-content;
        }
    </style>
@endsection
