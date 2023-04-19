@extends('main')
@section('content')
<div class="container">
  <div class="alert mycolor1 mt-3" role="alert">구분</div>

  <script>
    function find_text(){
      form1.action="{{ route('sort.index') }}";
      form1.submit();
    }
  </script>

  <form name="form1" action="" method="GET">
    <div class="row">
      <div class="col-3" align="left">
        <div class="input-group input-group-sm">
          <span class="input-group-text">구분명</span>
          <input type="text" name="text1" value="{{ $text1 }}" class="form-control" onkeydown="if(event.ketCode == 13){find_text();}">
          <button class="btn mycolor1" type="button" onclick="find_text()" >검색</button>
        </div>
      </div>
      <div class="col-9" align="right">
        <a href="{{ route('sort.create') }}{{ $tmp }}" class="btn btn-sm mycolor1">추가</a>
      </div>
    </div>
  </form>

  <table align="center" width='100%' class="table">
    <tr class="table-dark">
      <td width='10%'>번호</td>
      <td width='90%'>이름</td>
    </tr>

    @foreach ($list as $row)
    <tr>
      <td>{{ $row->id }}</td>
      <td><a href="{{route('sort.show', $row->id)}}{{ $tmp }}">{{ $row->name }}</a></td>
    </tr>
    @endforeach
  </table>

  <div class="row">
    <div class="col">
      {{ $list->links('mypagination') }}
    </div>
  </div>
</div>
@endsection