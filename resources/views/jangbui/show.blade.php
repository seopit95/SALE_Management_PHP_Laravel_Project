@extends('main')
@section('content')
<div class="container">
  <div class="alert mycolor1 mt-3" role="alert">매입</div>
  <br>
  <form action="" method="post" name="form1">
    <table class="table table-bordered table-sm mymargin5">
      <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 날짜</td>
        <td width="80%" align="left">{{$row->writeday}}</td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 제품명</td>
        <td width="80%" align="left">{{$row->product_name}}</td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">단가</td>
        <td width="80%" align="left">{{number_format($row->price)}}</td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">수량</td>
        <td width="80%" align="left">{{number_format($row->numi)}}</td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">총 금액</td>
        <td width="80%" align="left">{{number_format($row->total)}}</td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">비고</td>
        <td width="80%" align="left">{{number_format($row->note)}}</td>
      </tr>
    </table>
    <div align="center">
      <a href="{{ route('jangbui.edit', $row->id) }}{{ $tmp }}" class="btn btn-sm mycolor1">수정</a>
      <form action="{{route('jangbui.delete', $row->id)}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm mycolor1" onclick="return confirm('삭제할까요?');">삭제</button>
      </form>
      <input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();">
    </div>
  </form>
</div>
@endsection