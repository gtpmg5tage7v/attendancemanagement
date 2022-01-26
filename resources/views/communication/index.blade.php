@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<div class="container bg-light">
  <h1>連絡掲示板</h1>
  <div class="row">
    <form action="/communication" method="post">
      @csrf
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">タイトル</label>
      <input  class="form-control" type="text" name="title">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">名前</label>
      <input  class="form-control" type="text" name="name" value="{{ Auth::user()->name }}">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">メッセージ</label>
      <textarea  class="form-control" type="text" name="message" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-lg">書き込む</button>
    <a href="/time" class="btn btn-secondary btn-lg" tabindex="-1" role="button" aria-disabled="true">戻る</a>
    
  </form>
  </div>
</div>

  <hr>
  <div class="container">
    <div class="row">
  @foreach ($items as $item)
  
      <div class="col-6">

    
  <div class="card border-dark mb-3">
    <div class="card-header">{{$item->title}}</div>
    <div class="card-body text-dark">
      <h5 class="card-title">{{$item->name}}</h5>
      <p class="card-text">{!!nl2br(e($item->message))!!}</p>
    </div>
    <div class="card-footer bg-transparent border-dark">
      
      
      <a class="edit" href="/communication/edit?id={{$item->id}}"><i class="far fa-edit"></i></a>
      <a class="dust" href="/communication/del?id={{$item->id}}"><i class="far fa-trash-alt"></i></a>
      
      

      
      <like-component :post_id="{{$item->id}}"></like-component>
      <p class="date">{{$item->updated_at}}</p>
    </div>
  </div>
</div>
@endforeach
</div>
</div>


  {{$items->links()}}

  
@endsection