@extends('main_nomenu')
@section('content')
<div class="container">
  <div class="alert mycolor1 mt-3" role="alert">제품선택</div>
  <script>
    function find_text()
    {
      form1.action="{{ route('findproduct.index') }}";
      form1.submit();
    }

    function SendProduct(id, name, price)
    {
      opener.form1.products_id.value=id;
      opener.form1.product_name.value=name;
      opener.form1.price.value=price;
      opener.form1.total.value=Number(price) * Number(opener.form1.numo.value);
      self.close();
    }
  </script>
  <form name="form1" action="" method="GET">
    <div class="row">
      <div class="col-6" align="left">
        <div class="input-group input-group-sm">
          <span class="input-group-text">이름</span>
          <input type="text" name="text1" value="{{ $text1 }}" class="form-control" onkeydown="if(event.keyCode == 13){find_text();}">
          <button class="btn mycolor1" type="button">검색</button>
        </div>
      </div>
      <div class="col-6" align="right">
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
      <td><a href="javascript:SendProduct({{ $row->id }}, '{{ $row->name }}', {{ $row->price }});">{{ $row->name }}</a></td>
      <td align="right">{{ number_format($row->price) }}</a></td>
      <td align="right">{{ number_format($row->stock) }}</a></td>
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