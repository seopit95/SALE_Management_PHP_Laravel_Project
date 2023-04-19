@extends('main')
@section('content')
<div class="container">
  <div class="alert mycolor1 mt-3" role="alert">구분</div>
  <form action="{{ route('sort.store') }}{{ $tmp }}" name="form1" method="POST">
    @csrf
    <table class="table table-sm tablb-bordered mymargin5">
      <tr>
        <td width="20%" class="mycolor2">번호</td>
        <td width="80%" align="left"></td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 구분명</td>
        <td width="80%" align="left">
          <div class="d-inline-flex">
            <input type="text" name="name" size="20" maxlength="20" value="{{ old('name') }}" class="form-control form-control-sm">
          </div><br>
          @error('name') {{ $message }} @enderror
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