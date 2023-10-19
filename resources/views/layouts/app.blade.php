<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ env('APP_NAME') }}</title>

  <!-- Styles -->
  @vite('resources/js/app.js')
</head>

<body>
  @include('partials._navbar')

  @if (session('success'))
    <div class="alert alert-success container my-1">
        {{ session('success') }}
    </div>
@endif

  <main>
    @yield('main-content')
  </main>

  @yield('modals')
</body>

</html>
