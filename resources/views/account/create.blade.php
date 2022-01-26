@extends('layouts.header')

@section('content')

  


  <div class="container px-5 py-5">
      <div class="row">
        
        
        <div class="card push-top">
          <div class="card-header">
            アカウント追加
          </div>
        
          <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
              </div><br />
            @endif
              <form method="post" action="{{ route('user.store') }}">
                  <div class="form-group">
                      @csrf
                      <label for="name">名前</label>
                      <input type="text" class="form-control" name="name"/>
                  </div>
                  <div class="form-group">
                      <label for="email">メールアドレス</label>
                      <input type="email" class="form-control" name="email"/>
                  </div>
                  
                  <div class="form-group">
                      <label for="password">パスワード</label>
                      <input type="password" class="form-control" name="password"/>
                  </div>
                  <button type="submit" class="btn btn-block btn-primary mt-5">作成する</button>                  
              </form>
              <a href="{{ route('account.index')}}" class="btn btn-secondary mt-2" tabindex="-1" role="button" aria-disabled="true">戻る</a>
          </div>
        </div>
      </div>
  </div>

  @endsection