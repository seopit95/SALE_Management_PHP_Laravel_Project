@extends('main')
@section('content')
<div class="container">
  <div class="alert mycolor1 mt-3" role="alert">사용자</div>
  <form action="{{ route('member.store') }}{{ $tmp }}" name="form1" method="POST">
    @csrf
    <table class="table table-sm tablb-bordered mymargin5">
      <tr>
        <td width="20%" class="mycolor2">번호</td>
        <td width="80%" align="left"></td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 이름</td>
        <td width="80%" align="left">
          <div class="d-inline-flex">
            <input type="text" name="name" size="20" maxlength="20" value="{{ old('name') }}" class="form-control form-control-sm">
          </div><br>
          @error('name') {{ $message }} @enderror
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 아이디</td>
        <td width="80%" align="left">
          <div class="d-inline-flex">
            <input type="text" name="uid" size="20" maxlength="20" value="{{ old('uid') }}" class="form-control form-control-sm">
          </div><br>
          @error('uid') {{ $message }} @enderror
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 비밀번호</td>
        <td width="80%" align="left">
          <div class="d-inline-flex">
            <input type="text" name="pwd" size="20" maxlength="20" value="{{ old('pwd') }}" class="form-control form-control-sm">
          </div><br>
          @error('pwd') {{ $message }} @enderror
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">연락처</td>
        <td width="80%" align="left">
          <div class="d-inline-flex">
            <input type="text" name="tel1" size="3" maxlength="3" value="" class="form-control form-control-sm">-
            <input type="text" name="tel2" size="4" maxlength="4" value="" class="form-control form-control-sm">-
            <input type="text" name="tel3" size="4" maxlength="4" value="" class="form-control form-control-sm">
          </div>
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">등급</td>
        <td width="80%" align="left">
          <div class="d-inline-flex">
            <input type="radio" name="rank" value="0" checked> 직원&nbsp;&nbsp;
            <input type="radio" name="rank" value="1"> 관리자
          </div>
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