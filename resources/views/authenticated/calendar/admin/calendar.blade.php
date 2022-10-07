@extends('layouts.sidebar')

@section('content')
<div class="w-75 m-auto">
  <div class="w-100" style="margin:20px 0 0 20px; ">
    <p>{{ $calendar->getTitle() }}</p>
    <p>{!! $calendar->render() !!}</p>
  </div>
</div>
@endsection