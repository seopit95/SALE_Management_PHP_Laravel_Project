<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('my/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('my/css/my.css') }}">
  <script src="{{ asset('my/js/jquery-3.6.0.min.js')}}"></script>
  <script src="{{ asset('my/js/popper.js')}}"></script>
  <script src="{{ asset('my/js/bootstrap.min.js')}}"></script>

  <script src="{{ asset('my/js/moment-with-locales.min.js')}}"></script>
  <script src="{{ asset('my/js/bootstrap5-datetimepicker.min.js')}}"></script>
  <link rel="stylesheet" href="{{ asset('my/css/bootstrap5-datetimepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('my/css/all.min.css') }}">

  {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script> --}}
</head>
<body>
  <div class="container">
    @yield("content")
  </div>
</body>
</html>