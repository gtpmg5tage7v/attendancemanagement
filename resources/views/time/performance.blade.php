<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<ul class="nav justify-content-center bg-light">
  <li class="nav-item">
    <a class="nav-link active link-dark" aria-current="page" href="{{route('home')}}">ホーム</a>
  </li>
  <li class="nav-item">
    <a class="nav-link link-dark" href="/time">タイムボーイ</a>
  </li>
  <li class="nav-item">
    <a class="nav-link link-dark" href="/communication">連絡掲示板</a>
  </li>
  </ul>

{{-- =================Search Section =============================--}}

  <h1 class="text-center px-5 py-5">勤怠実績(月)</h1>
  <div class="container px-5 py-5">
    <div class="row">
      <div class="col-6">
        <form action="/time/performance" method="post">
          @csrf
        <select class="form-select" name="year" class="year">
          @for($i=2022; $i <= 2030; $i++)
          <option>{{$i}}年</option>
          @endfor
        </select>
      </div>
      <div class="col-6">
        <select  class="form-select" name="month" class="month">
          @for($i=1; $i <= 12; $i++)
          <option>{{$i}}月</option>
          @endfor
        </select>
      </div>
      <div class="d-grid gap-2 col-6 mx-auto px-5 py-5">
        <button  type="submit" class="btn btn-primary">検索</button>
        <a href="/time" class="btn btn-outline-dark" tabindex="-1" role="button" aria-disabled="true">戻る</a>
      </div>
    </form>
  </div>
  </div>



{{-- =================Search Results =============================--}}
<hr>


 <div class="container px-5 py-5">
   <div class="row">
    @foreach ($items as $item)
    <div class="col-6">
    <div class="card text-center">
      <div class="card-header">
        出勤：{{$item->punchIn}}
      </div>
      <div class="card-body">       
        <p class="card-text">退勤：{{$item->punchOut}}</p>
        
      </div>
      <div class="card-footer text-muted">
        勤務時間：{{$item->workTime}}時間
      </div>
    </div>
  </div>
    @endforeach
   </div>
 </div>
 