@extends('main')
@section('content')
<div class="container">
  <div class="alert mycolor1 mt-3" role="alert">구분</div>
  <script>
    function find_text()
    {
      form1.action="{{ route('product.index') }}";
      form1.submit();
    }
  </script>
  <form name="form1" action="" method="GET">
    <div class="row">
      <div class="col-3" align="left">
        <div class="input-group input-group-sm">
          <span class="input-group-text">구분명</span>
          <input type="text" name="text1" value="{{ $text1 }}" class="form-control" onkeydown="if(event.ketCode == 13){find_text();}">
          <button class="btn mycolor1" type="button">검색</button>
        </div>
      </div>
      <div class="col-9" align="right">
        <a href="{{ route('product.create') }}{{ $tmp }}" class="btn btn-sm mycolor1">추가</a>
        <a href="{{ url('product/jaego') }}{{ $tmp }}" class="btn btn-sm mycolor1">재고계산</a>
      </div>
    </div>
  </form>

  <table class="table table-bordered table-sm mymargin5">
    <tr class="table-dark">
      <td width='10%'>번호</td>
      <td width='20%'>구분명</td>
      <td width='30%'>제품명</td>
      <td width='20%'>단가</td>
      <td width='20%'>재고</td>
    </tr>

    @foreach ($list as $row)
    <tr>
      <td>{{ $row->id }}</td>
      <td>{{ $row->sorts_name }}</td>
      <td><a href="{{route('product.show', $row->id)}}{{ $tmp }}">{{ $row->name }}</a></td>
      <td>{{ $row->price }}</td>
      <td>{{ $row->stock }}</td>
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