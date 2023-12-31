<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-light bg-primary">
    <div class="container">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="http://coba-laravel.test/tasks">Home</a>
          <a class="nav-link <?php if($title==='Daftar Task') echo 'active'; else echo ""; ?>" href="http://coba-laravel.test/tasks">Tasks</a>
          <a class="nav-link" id="logout" href="#">Logout</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    @yield('container')
  </div>
    @yield('scripts')
    <script>
      // Logout Script
      document.getElementById('logout').addEventListener('click', function(e) {
          e.preventDefault(); // Mencegah aksi default (navigasi)

          var form = document.createElement('form');
          form.action = '/logout'; // Sesuaikan dengan URL logout Anda
          form.method = 'POST';

          var csrfToken = document.createElement('input');
          csrfToken.type = 'hidden';
          csrfToken.name = '_token';
          csrfToken.value = '{{ csrf_token() }}'; // Dapatkan token CSRF dari Laravel

          form.appendChild(csrfToken);
          document.body.appendChild(form);
          form.submit();
      });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
