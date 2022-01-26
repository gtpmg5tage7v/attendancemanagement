<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <style>
    
    .push-top {
      margin-top: 50px;
    }
</style>

<div class="card push-top">
    <div class="card-header">
      編集画面
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
      <form method="POST" action="{{route('account.update',['id' =>$users->id])}}">
            <div class="form-group">
                @csrf
                <label for="name">名前</label>
                <input type="text" class="form-control" name="name" value="{{ $users->name }}"/>
            </div>
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" class="form-control" name="email" value="{{ $users->email }}"/>
            </div>
            
            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" name="password" value="{{ $users->password }}"/>
            </div>
            <button type="submit" class="btn btn-block btn-danger">更新する</button>
            <a href="{{ route('account.index')}}" class="btn btn-primary">戻る</a>
        </form>
    </div>
  </div>
  