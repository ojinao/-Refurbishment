@extends('layouts.sidebar')

@section('content')
<h1>一覧画面</h1>

<div class="">
  <div class="imgInput">
    <input type="file" name="image" form="imageCreate">
    <input type="submit" value="アップロード" form="imageCreate">
    <form action="{{ route('image.create') }}" method="post" id="imageCreate" enctype="multipart/form-data">{{ csrf_field() }} </form>
  </div>
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.7264189661537!2d139.7004369!3d35.6591115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188b57efbd57c7%3A0x217e9d9fe306fba!2z5b-g54qs44OP44OB5YWs5YOP!5e0!3m2!1sja!2sjp!4v1665718609093!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

  @foreach ($imgs as $img)
  <div class="image">
    <img src="{{ Storage::url($img->image) }}" width="500px">
    <!-- <img src="{{ asset('storage/'.$img->image) }}" alt="プロフィール画像"> -->
    <form action="{{ route('image.delete', ['id'=>$img->id]) }}" method="post">
      {{ csrf_field() }}
      <input type="submit" value="データ削除" onclick="return confirm('削除してよろしいですか？')">
    </form>
    <!-- <input type="submit" value="データ削除" form="imageDelete" onclick="return confirm('削除してよろしいですか？')">
        <form action="{{ route('image.delete', [$img->id]) }}" method="post" id="imageDelete">{{ csrf_field() }}</form>
        <p><a href="{{ route('image.delete', ['id'=>$img->id]) }}" form="imageDelete">削除</a></p> -->
  </div>
  @endforeach
</div>
@endsection