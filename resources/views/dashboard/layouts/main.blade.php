<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Articles | Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
    {{-- Bootstrap Core CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    {{-- My Style CSS --}}
    <link href="/css/dashboard.css" rel="stylesheet">

    {{-- Trix Editor --}}
    <script type="text/javascript" src="/js/trix.js"></script>

    <style>
      trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
      }
    </style>
  </head>
  <body>

@include('dashboard.layouts.header');

<div class="container-fluid">
  <div class="row">
    @include('dashboard.layouts.sidebar');

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      @yield('content');
    </main>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="/js/dashboard.js"></script>
  </body>
</html>
