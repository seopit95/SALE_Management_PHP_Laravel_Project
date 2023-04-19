@extends('main')
@section('content')
<div class="container">
  <div class="alert mycolor1 mt-3" role="alert">매입</div>

  <script>
    $(function(){
      $("#writeday") .datetimepicker({
        locale: "ko",
        format: "YYYY-MM-DD",
        defaultDate: moment()
      });
    });

    function select_product(){
      var str;
      str = form1.sel_products_id.value;
      if(str == ""){
        form1.products_id.value = "";
        form1.price.value = "";
        form1.total.value = "";
      }else{
        str = str.split("^^");
        form1.products_id.value = str[0];
        form1.price.value = str[1];
        form1.total.value = Number(form1.price.value) * Number(form1.numi.value);
      }
    }

    function cal_prices(){
      form1.total.value = Number(form1.price.value) * Number(form1.numi.value);
      form1.note.focus();
    }
  </script>

  <form name="form1" method="POST" action="{{ route('jangbui.store') }}{{ $tmp }}">
    @csrf
    <table class="table table-sm tablb-bordered mymargin5">
      <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 날짜</td>
        <td width="80%" align="left">
          <div class="d-inline-flex">
            <div class="input-group input-group-sm date" id="writeday">
              <input type="text" name="writeday" size="20" value="{{ old('writeday') }}" class="form-control form-control-sm">
              <div class="input-group-text">
                <div class="input-group-addon">
                  <i class="far fa-calendar-alt fa-lg"></i>
                </div>
              </div>
            </div>
          </div><br>
          @error('writeday') {{ $message }} @enderror
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 제품명</td>
        <td width="80%" align="left">
          <div class="d-inline-flex">
            <input type="hidden" name="products_id" value="{{ old('products_id') }}">
            <select name="sel_products_id" class="form-select form-select-sm" onchange="select_product();"><option value="" selected>선택하세요.</option>

              @foreach ($list as $row)
                @php
                $t1 = "$row->id^^$row->price";
                $t2 = "$row->name($row->price)";
                @endphp

                @if($row->id == old('products_id'))
                  <option value="{{ $t1 }}" selected>{{ $t2 }}</option>
                @else
                  <option value="{{ $t1 }}">{{ $t2 }}</option>
                @endif
              @endforeach

            </select>
          </div><br>
          @error('products_id') {{ $message }} @enderror
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">단가</td>
        <td width="80%" align="left">
          <div class="d-inline-flex">
            <input type="text" name="price" size="20" maxlength="20" value="{{ old('price') }}" class="form-control form-control-sm" onchange="cal_prices();">
          </div><br>
          @error('price') {{ $message }} @enderror
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">수량</td>
        <td width="80%" align="left">
          <div class="d-inline-flex">
            <input type="text" name="numi" size="20" maxlength="20" value="{{ old('numi') }}" class="form-control form-control-sm" onchange="cal_prices();">
          </div><br>
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">총 금액</td>
        <td width="80%" align="left">
          <div class="d-inline-flex">
            <input type="text" name="total" size="20" maxlength="20" value="{{ old('total') }}" class="form-control form-control-sm" readonly>
          </div><br>
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">비고</td>
        <td width="80%" align="left">
          <div class="d-inline-flex">
            <input type="text" name="note" size="20" maxlength="20" value="{{ old('note') }}" class="form-control form-control-sm">
          </div><br>
        </td>
      </tr>
    </table>
    <div align="center">
      <input type="submit" value="저장" class="btn btn-sm mycolor1">&nbsp;
      <input type="button" value="이전화면" class="btn btn-sm mycolor" onclick="history.go(-1);">
    </div>
  </form>
</div>
@endsection