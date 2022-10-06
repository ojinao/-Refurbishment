@extends('layouts.sidebar')

@section('content')
<div class="vh-100 pt-5" style="background:#ECF1F6;">
  <div class="border w-75 m-auto pt-5 pb-5" style="border-radius:5px; background:#FFF;">
    <div class="w-75 m-auto border" style="border-radius:5px;">

      <p class="text-center">{{ $calendar->getTitle() }}</p>
      <div class="">
        {!! $calendar->render() !!}
      </div>
    </div>
    <div class="text-right w-75 m-auto">
      <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts">
    </div>
  </div>
</div>
<!-- modal -->
<div class="modal js-modal_delete">
  <div class="modal__bg js-modal-close"></div>
  <div class="modal__content">
    <div class="w-100">
      <div class="reserve w-50 m-auto">
        <p>予約日 : <label class="modal-reserve-day"></label></p>
        <p>時間 : <label class="modal-reserve-part"></label></p>
        <p>上記の予約をキャンセルしてもよろしいですか？</p>
      </div>
      <div class="w-50 m-auto edit-modal-btn d-flex">
        <a class="js-modal-close btn btn-primary d-inline-block" href="">閉じる</a>
        <input type="hidden" class="modal-delete-hidden" name="reserve_id" value="" form="deleteParts">
        <input type="submit" class="btn btn-danger d-block" value="キャンセル" form="deleteParts">
      </div>
    </div>
  </div>
</div>
@endsection