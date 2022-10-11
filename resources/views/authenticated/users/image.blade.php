@extends('layouts.sidebar')

@section('content')
<h1>一覧画面</h1>

<div class="">
  <div class="imgInput">
    <input type="file" name="image" form="imageCreate">
    <input type="submit" value="アップロード" form="imageCreate">
    <form action="{{ route('image.create') }}" method="post" id="imageCreate" enctype="multipart/form-data">{{ csrf_field() }} </form>
  </div>

  @foreach ($imgs as $img)
  <div class="image">
    <img src="{{ Storage::url($img->image) }}" width="500px">
    <!-- <img src="{{ asset('storage/'.$img->image) }}" alt="プロフィール画像"> -->
    <form action="{{ route('image.delete', ['id'=>$img->id]) }}" method="post">
      {{ csrf_field() }}
      <input type="submit" value="データ削除" onclick="return confirm('削除してよろしいですか？')">
    </form>
  </div>
  @endforeach
</div>
@endsection

<!-- <input type="submit" value="データ削除" form="imageDelete" onclick="return confirm('削除してよろしいですか？')">
    <form action="{{ route('image.delete', [$img->id]) }}" method="post" id="imageDelete">{{ csrf_field() }}</form>
    <p><a href="{{ route('image.delete', ['id'=>$img->id]) }}" form="imageDelete">削除</a></p> -->