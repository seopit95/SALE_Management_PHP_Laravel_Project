@extends('main')
@section('content')
<div class="container">
  <div class="alert mycolor1 mt-3" role="alert">제품</div>
  <form action="{{ route('product.store') }}{{ $tmp }}" name="form1" method="POST" enctype="multipart/form-data">
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
            <select name="sort_id" class="form-select form-select-sm"><option value="" selected>선택하세요.</option>

              @foreach ($list as $row)
                @if($row->id == old('sort_id'))
                  <option value="{{ $row->id }}" selected>{{ $row->name }}</option>
                @else
                  <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endif
              @endforeach

            </select>
          </div><br>
          @error('sort_id') {{ $message }} @enderror
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 제품명</td>
        <td width="80%" align="left">
          <div class="d-inline-flex">
            <input type="text" name="name" size="20" maxlength="20" value="{{ old('name') }}" class="form-control form-control-sm">
          </div><br>
          @error('name') {{ $message }} @enderror
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 단가</td>
        <td width="80%" align="left">
          <div class="d-inline-flex">
            <input type="text" name="price" size="20" maxlength="20" value="{{ old('price') }}" class="form-control form-control-sm">
          </div><br>
          @error('price') {{ $message }} @enderror
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">재고</td>
        <td width="80%" align="left">
          <div class="d-inline-flex">
            <input type="text" name="stock" size="20" maxlength="20" value="" class="form-control form-control-sm">
          </div><br>
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">사진</td>
        <td width="80%" align="left">
          <div class="d-inline-flex">
            <input type="file" name="picture" size="20" maxlength="20" value="" class="form-control form-control-sm">
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