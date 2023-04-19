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
  <script src="https://kit.fontawesome.com/4c16673fd2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('my/css/bootstrap5-datetimepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('my/css/all.min.css') }}">

  {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script> --}}
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
      <div class="container-fluid">
        <a href="{{ url('/')}}"><i class="fa-solid fa-cube" style="width: 30px"></i></a>
        <a class="navbar-brand link-info" href="{{ url('/')}}">SEOP MALL Management</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('jangbui.index') }}">매입</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('jangbuo.index') }}">매출</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('gigan.index') }}">기간조회</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                통계
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('best.index') }}">BEST 제품</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('crosstab.index') }}">월별제품별현황</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('chart.index') }}">종류별 분포도</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                기초정보
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('sort.index') }}">구분</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('product.index') }}">제품</a></li>
                @if(session()->get("rank")==1)
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('member.index') }}">사용자</a></li>
                @endif
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('picture.index') }}">사진</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('ajax.index') }}">Ajax</a>
            </li>
          </ul>
          @if(!session()->exists("uid"))
            <a class="btn btn-sm btn-outline-secondary btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">로그인</a>
          @else
            @php
              $uid = session()->get("uid");
              $name = session()->get("name");
              $user = $name."(".$uid.")님";
            @endphp
            <span class="text-white-50 bg-dark">@php echo($user); @endphp</span>
            <a href="{{ url('login/logout') }}" class="btn btn-sm btn-outline-secondary btn-dark">로그아웃</a>
          @endif
        </div>
      </div>
    </nav>
    <img src="{{ asset('/my/img/main.jpg') }}" width="100%" height="150" alt="">
    @yield("content")
  </div>
</body>
</html>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">로그인</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body bg-light">
        <form name="form_login" method="post" action="{{ url('login/check') }}">
          @csrf
          <table class="table table-borderless mymargin5">
            <tr>
              <td width="30%"><h6>아이디</h6></td>
              <td width="70%"><input type="text" name="uid" class="form-control"></td>
            </tr>
            <tr>
              <td><h6>암호</h6></td>
              <td><input type="password" name="pwd" class="form-control"></td>
            </tr>
          </table>
        </form>
      </div>

      <div class="modal-footer alert-secondary">
        <button type="button" class="btn btn-sm btn-secondary" onclick="javascript:form_login.submit();">확인</button>
        <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">닫기</button>
      </div>
    </div>
  </div>
</div>