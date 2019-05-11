<title>@yield('title', config('app.name'))</title>
<meta name="google-site-verification" content="WtPdVah5ELwPNrukFIeSo4HT31Iv-IiY4ehfcX-AG84" />
<meta charset="utf-8">
<meta name="robots"	content="index, all" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="@yield('meta_description', config('app.name'))" />

<!-- favicon links -->
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicons/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" href="{{ asset('img/favicons/favicon-32x32.png') }}" sizes="32x32">
<link rel="icon" type="image/png" href="{{ asset('img/favicons/favicon-16x16.png') }}" sizes="16x16">
<link rel="manifest" href="{{  asset('manifest.json') }}">
<link rel="mask-icon" href="{{  asset('img/favicons/safari-pinned-tab.svg') }}" color="#5bbad5">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<meta name="theme-color" content="#ffffff">

<!-- CSRF token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- styles -->
<link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700" rel="stylesheet"> 
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" href="{{ elixir('css/app.css') }}">

@stack('styles')

<!-- scripts -->
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>