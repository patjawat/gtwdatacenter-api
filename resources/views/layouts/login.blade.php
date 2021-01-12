
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GTW | BackOffice</title>

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("adminlte/plugins/fontawesome-free/css/all.min.css")}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset("adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("adminlte/dist/css/adminlte.min.css")}}">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    {{-- loading Screen page --}}
    <div class="loading-page">
      <div id="loader-wrapper">
        <div id="loader"></div>
        {{-- <div style="padding-top: 10%; ">
          <img src="/image/loading-gif.gif"  style="width: 30%;display:block;margin: auto;"/>
        </div> --}}
      </div>
    </div>
    {{-- End loading Screen page --}}
    
    @yield('content')
    
  </div>
  <!-- /.login-box -->
  
  <!-- jQuery -->
  <script src="{{asset("adminlte/plugins/jquery/jquery.min.js")}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset("adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset("adminlte/dist/js/adminlte.min.js")}}"></script>
  <script src="{{ asset('js/globalFunction.js') }}"></script>
</body>
</html>
