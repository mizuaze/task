<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">

    <div class="card" style="width: 25rem;">
    <div class="card-body">
    <div class="row text-center">
      <h2>Register</h2>
    </div>
    <div class="row">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="row">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div class="row">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="row">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required autocomplete="new-password">
        </div>

        <div class="row">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <div class="row mt-2">
            <button type="submit">Register</button>
        </div>
        <div class="row text-center mt-2">
          <div class="col-12">Sudah memiliki akun?</div> <div class="col-12"><a href="http://coba-laravel.test/login">Login Sekarang</a></div>
        </div>
    </form>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>


