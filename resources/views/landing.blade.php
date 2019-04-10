<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <script> window.Laravel="{ csrfToken: '{{ csrf_token() }}' }"</script>
        <title>LaraVue SPA Blog</title>
        <link href=" {{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <app></app>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
    </html>