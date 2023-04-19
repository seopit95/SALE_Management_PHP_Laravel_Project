@extends('main')
@section('content')
<div class="container">
  <div class="alert mycolor1 mt-3" role="alert">구분</div>
  <br>
  <form action="" method="post" name="form1" >
    <table class="table table-bordered table-sm mymargin5">
      <tr>
        <td width="20%" class="mycolor2">번호</td>
        <td width="80%" align="left">{{$row->id}}</td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">구분명</td>
        <td width="80%" align="left">{{$row->name}}</td>
      </tr>
    </table>
    <div align="center">
      <a href="{{ route('sort.edit', $row->id) }}{{ $tmp }}" class="btn btn-sm mycolor1">수정</a>
      <form action="{{route('sort.destroy', $row->id)}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm mycolor1" onclick="return confirm('삭제할까요?');">삭제</button>
      </form>
      <input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();">
    </div>
  </form>
</div>
@endsection