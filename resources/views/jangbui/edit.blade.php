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
  </script>

  <form action="{{ route('jangbui.update', $row->id) }}{{ $tmp }}" name="form1" method="POST" enctype="multipart/form-data">
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
            <select name="products_id" class="form-select form-select-sm"><option value="" selected>선택하세요.</option>

              @foreach ($list as $row1)
                @if($row1->id == $row->products_id)
                  <option value="{{ $row1->id }}" selected>{{ $row1->name }}</option>
                @else
                  <option value="{{ $row1->id }}">{{ $row1->name }}</option>
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
            <input type="text" name="price" size="20" maxlength="20" value="{{ $row->price }}" class="form-control form-control-sm">
          </div>
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">수량</td>
        <td width="80%" align="left">
          <div class="d-inline-flex">
            <input type="text" name="numi" size="20" maxlength="20" value="{{ $row->numi }}" class="form-control form-control-sm">
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