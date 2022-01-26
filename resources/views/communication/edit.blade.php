@extends('layouts.app')
@section('content')

<div class="container bg-light">
  <h1>編集</h1>
  <div class="row">
    <form action="/communication/edit" method="post">
      @csrf
      <input class="edit_input" type="hidden" name="id" value="{{$form->id}}">
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">タイトル</label>
      <input  class="form-control" type="text" name="title" value="{{$form->title}}">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">メッセージ</label>
      <textarea  class="form-control" type="text" name="message" rows="3" >{{$form->message}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-lg">書き込む</button>
    <button type="button" class="btn btn-outline-secondary btn-lg"><a href="/communication">戻る</a></button>
  </form>
  </div>
</div>


@endsection