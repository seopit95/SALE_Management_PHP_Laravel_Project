@extends('main')
@section('content')
<div class="container">
  <div class="alert mycolor1 mt-3" role="alert">제품</div>
  <form action="{{ route('product.update', $row->id) }}{{ $tmp }}" name="form1" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <table class="table table-sm tablb-bordered mymargin5">
      <tr>
        <td width="20%" class="mycolor2">번호</td>
        <td width="80%" align="left">{{ $row->id }}</td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 구분명</td>
        <td width="80%" align="left">
          <div class="d-inline-flex">
            <select name="sort_id" class="form-select form-select-sm"><option value="" selected>선택하세요.</option>

              @foreach ($list as $row1)
                @if($row->sort_id == $row1->id)
                  <option value="{{ $row1->id }}" selected>{{ $row1->name }}</option>
                @else
                  <option value="{{ $row1->id }}">{{ $row1->name }}</option>
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
            <input type="text" name="name" size="20" maxlength="20" value="{{ $row->name }}" class="form-control form-control-sm">
          </div><br>
          @error('name') {{ $message }} @enderror
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 단가</td>
        <td width="80%" align="left">
          <div class="d-inline-flex">
            <input type="text" name="price" size="20" maxlength="20" value="{{ $row->price }}" class="form-control form-control-sm">
          </div><br>
          @error('price') {{ $message }} @enderror
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">재고</td>
        <td width="80%" align="left">
          <div class="d-inline-flex">
            <input type="text" name="stock" size="20" maxlength="20" value="{{ $row->stock }}" class="form-control form-control-sm">
          </div><br>
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">사진</td>
        <td width="80%" align="left">
          <div class="d-inline-flex">
            <input type="file" name="picture" size="20" maxlength="20" value="{{ $row->picture}}" class="form-control form-control-sm">
          </div><br>
          <b>파일이름</b> : <?=$row->picture;?><br>
          @if($row->picture)
            <img src="{{ asset('/storage/product_img/'.$row->picture) }}" width="200" class="img-fluid img-thumbnail mymargin5">
          @else  
            <img src="" width="200" height="150" class="img_fluid img-thumbnail mymargin5">
          @endif
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