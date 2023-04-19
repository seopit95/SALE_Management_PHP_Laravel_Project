@extends('main')
@section('content')
<div class="container">
  <div class="alert mycolor1 mt-3" role="alert">제품</div>
  <br>
  <form action="" method="post" action="form1" >
    <table class="table table-bordered table-sm mymargin5">
      <tr>
        <td width="20%" class="mycolor2">번호</td>
        <td width="80%" align="left">{{$row->id}}</td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 구분명</td>
        <td width="80%" align="left">{{$row->sorts_name}}</td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 제품명</td>
        <td width="80%" align="left">{{$row->name}}</td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">단가</td>
        <td width="80%" align="left">{{$row->price}}</td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">재고</td>
        <td width="80%" align="left">{{$row->stock}}</td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">사진</td>
        <td width="80%" align="left">
          <b>파일이름</b> : {{$row->picture}} <br>
          @if($row->picture)
            <img src="{{ asset('/storage/product_img/'.$row->picture) }}" width="200" class="img-fluid img-thumbnail mymargin5">
          @else
            <img src=" " width="200" height="150" class="img-fluid img-thumbnail mymargin5">
          @endif
        </td>
      </tr>
    </table>
    <div align="center">
      <a href="{{ route('product.edit', $row->id) }}{{ $tmp }}" class="btn btn-sm mycolor1">수정</a>
      <form method="POST" action="{{ route('product.destroy', $row->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm mycolor1" onclick="return confirm('삭제할까요?');">삭제</button>
      </form>
      <input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();">
    </div>
  </form>
</div>
@endsection