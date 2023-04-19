@extends('main')
@section('content')
<div class="container">
  <div class="alert mycolor1 mt-3" role="alert">기간별 매출입 현황</div>
  <script>
    function find_text()
    {
      form1.action = "{{ route('gigan.index') }}";
      form1.submit();
    }

    $(function(){
      $('#text1').datetimepicker({
        locale: "ko",
        format: "YYYY-MM-DD",
        defaultDate: moment()
      });
      $('#text2').datetimepicker({
        locale: "ko",
        format: "YYYY-MM-DD",
        defaultDate: moment()
      })

      $("#text1") .on("dp.change", function(e){
        find_text();
      });
      $("#text2") .on("dp.change", function(e){
        find_text();
      })
    });
  </script>
  <form name="form1" action="" method="get">
    <div class="row">
      <div class="col-12" align="left">
        <div class="d-inline-flex">
          <div class="input-group input-group-sm date" id="text1">
            <span class="input-group-text">날짜</span>
            <input type="text" name="text1" size="10" value="{{ $text1 }}" class="form-control" onkeydown="if(event.keyCode == 13){find_text();}">
            <span class="input-group-text">
              <div class="input-group-addon">
                <i class="far fa-calendar-alt fa-lg"></i>
              </div>
            </span>
          </div>
        </div>
        -
        <div class="d-inline-flex">
          <div class="input-group input-group-sm date" id="text2">
            <input type="text" name="text2" size="10" value="{{ $text2 }}" class="form-control" onkeydown="if(event.keyCode == 13) {find_text();}">
            <span class="input-group-text">
              <div class="input-group-addon">
                <i class="far fa-calendar-alt fa-lg"></i>
              </div>
            </span>
          </div>
        </div>
        &nbsp;
        <div class="d-inline-flex">
          <div class="input-group input-group-sm">
            <span class="input-group-text">제품명</span>
            <select name="text3" class="form-select form-select-sm" onchange="find_text();">
              <option value="0" selected>전체</option>
              
              @foreach ($list_product as $row)
                @if($row->id == $text3)
                  <option value="{{ $row->id }}" selected>{{ $row->name }}</option>
                @else
                  <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endif
              @endforeach 
            </select>
          </div>
        </div>
      </div>
      <div class="col-9" align="right">
      </div>
    </div>
  </form>

  <table class="table table-bordered table-sm mymargin5">
    <tr class="table-dark">
      <td width='15%'>날짜</td>
      <td width='30%'>제품명</td>
      <td width='10%'>단가</td>
      <td width='10%'>매입수량</td>
      <td width='10%'>매출수량</td>
      <td width='15%'>총 금액</td>
      <td width='20%'>비고</td>
    </tr>

    @foreach ($list as $row)
    @php
      $numi = $row->numi ? number_format($row->numi) : "";
      $numo = $row->numo ? number_format($row->numo) : "";
    @endphp
    <tr>
      <td>{{ $row->writeday }}</td>
      <td align="left">{{ $row->product_name }}</td>
      <td align="right">{{ number_format($row->price) }}</td>
      <td align="right" class="mycolor3">{{ $numi }}</td>
      <td align="right" class="mycolor3">{{ $numo }}</td>
      <td align="right">{{ number_format($row->total) }}</td>
      <td align="left">{{ $row->note }}</td>
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