@extends('main')
@section('content')
<div class="container">
  <div class="alert mycolor1 mt-3" role="alert">매출</div>

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
        form1.total.value = Number(form1.price.value) * Number(form1.numo.value);
      }
    }

    function cal_prices(){
      form1.total.value = Number(form1.price.value) * Number(form1.numo.value);
      form1.note.focus();
    }

    function find_product(){
      window.open("{{ route('findproduct.index') }}","",
        "resizeable=yes, scrollbars=yes, width=500, height=600");
    }
  </script>

  <form action="{{ route('jangbuo.update', $row->id) }}{{ $tmp }}" name="form1" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <table class="table table-sm tablb-bordered mymargin5">
      <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 날짜</td>
        <td width="80%" align="left">
          <div class="d-inline-flex">
            <div class="input-group input-group-sm date" id="text1">
              <input type="text" name="writeday" size="20" maxlength="20" value="{{ $row->writeday }}" class="form-control form-control-sm">
              <div class="input-group-text">
                <div class="input=group-addon">
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
            <input type="text" name="product_name" value="{{ $row->product_name }}" class="form-control form-control-sm" readonly>&nbsp;
            <input type="button" value="제품찾기" onclick="find_product();" class="btn btn-sm mycolor1">
          </div><br>
          @error('products_id') {{ $message }} @enderror
        </td>
      </tr>
      
      <tr>
        <td width="20%" class="mycolor2">단가</td>
        <td width="80%" align="left">
          <div class="d-inline-flex">
            <input type="text" name="price" size="20" maxlength="20" value="{{ $row->price }}" class="form-control form-control-sm">
          </div>
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">수량</td>
        <td width="80%" align="left">
          <div class="d-inline-flex">
            <input type="text" name="numo" size="20" maxlength="20" value="{{ $row->numo }}" class="form-control form-control-sm">
          </div>
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">총 금액</td>
        <td width="80%" align="left">
          <div class="d-inline-flex">
            <input type="text" name="total" size="20" maxlength="20" value="{{ $row->total }}" class="form-control form-control-sm">
          </div>
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">비고</td>
        <td width="80%" align="left">
          <div class="d-inline-flex">
            <input type="text" name="note" size="20" maxlength="20" value="{{ $row->note }}" class="form-control form-control-sm">
          </div>
        </td>
      </tr>
    </table>
    <div align="center">
      <input type="submit" value="저장" class="btn btn-sm mycolor1">&nbsp;
      <input type="button" value="이전화면" class="btn btn-sm mycolor" onclick="history.back();">
    </div>
  </form>
</div>
@endsection