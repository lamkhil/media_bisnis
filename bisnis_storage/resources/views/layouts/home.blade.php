<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>

    <!--auto ads-->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9662368900876117" crossorigin="anonymous"></script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="shortcut icon" href="{{ $fav }}">

    <title>{{ $title }}</title>
    <meta name="keywords" content="{{ $meta }}">
    <meta name="author" content="Smarteye Technologies">
    <meta name="description" content="{{ $description }}">

    <?php if(!empty($image)): ?>
        <meta property="og:image" content="{{ asset($image) }}" />
        <meta name=”twitter:image” content="{{ asset($image) }}">
    <?php endif; ?>

    <meta property=og:url content="{{ url('/') }}">
    <meta property=og:type content="website">
    <meta property=og:sitename content="{{ config('app.name') }}">

  </head>
  <body>

  <x-common.header />
    
  {{ $slot }}

  <x-common.footer />
  <x-common.login-alert />
    @stack('scripts')
    <script src="{{ asset('assets/js/home.js') }}" defer></script>
  </body>
</html>