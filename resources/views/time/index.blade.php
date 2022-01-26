@extends('layouts.header')

@section('content')
<div class="container px-5 py-5">
  <div class="row">
    <div class="col-12">
      
<output class="realtime"></output>
        <h4 class="text-center px-5 py-5" id="RealtimeClockArea"></h4>
    </div>
    <div class="col">
      <p class="font-weight-bolder">{{session('message')}}</p>
    </div>
  </div>
    <div class="row">
    <div class="col">
      <div class="d-flex justify-content-evenly">
        <form class="timestamp" action="/time/timein" method="post">
           @csrf
           <button class="btn btn-info btn-lg">出勤</button>
          </form>
          <form class="timestamp" action="/time/timeout" method="post">
            @csrf
            <button class="btn btn-warning btn-lg">退勤</button>
          </form>
          <a href="/time/performance">
            <button type="button" class="btn btn-success btn-lg">勤怠実績</button>
          </a>
          <a href="/time/daily">
            <button type="button" class="btn btn-primary btn-lg">日次勤怠</button>
            
          </a>
          <a href="/">
            <button type="button" class="btn btn-secondary btn-lg">戻る</button>
          
        </a>
          @if(Auth::user()->admin == 0)
        <a href="{{route('show')}}">
          <button type="button" class="btn btn-dark btn-lg">検索</button>
          
        </a>
        <a href="{{route('account.index')}}">
          <button type="button" class="btn btn-dark btn-lg">ユーザー追加</button>
          
        </a>

        @endif
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    
      @foreach ($itmes as $itme)
      <div class="col-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{$itme->user_name}}</h5>
          
          <ul class="list-group list-group-flush">
            <li class="list-group-item">出勤時間</li>
            <li class="list-group-item">{{$itme->punchIn}}</li>
            <li class="list-group-item">退勤</li>
            <li class="list-group-item">{{$itme->punchOut}}</li>
            <li class="list-group-item">勤務時間</li>
            <li class="list-group-item">{{$itme->workTime}}時間</li>
          </ul>          
          
        </div>
      </div>

    </div>
    @endforeach
  </div>
</div>
      

        
        
        
          
        
        

        
        
        
        
        
          
        
        
        {{-- <form class="timestamp" action="/time/breakin" method="post">
        @csrf
          <button class="button3">休憩開始</button>
        </form>
        
        <form class="timestamp" action="/time/breakout" method="post">
        @csrf
          <button class="button4">休憩終了</button>
        </form> --}}
        
        
        
        
        
        
        
        


  










<script src="{{asset('/js/time.js')}}"></script>
@endsection


<script>
  function showClock1() {
   var nowTime = new Date();
   var nowHour = nowTime.getHours();
   var nowMin  = nowTime.getMinutes();
   var nowSec  = nowTime.getSeconds();
   var msg = "現在時刻は、" + nowHour + ":" + nowMin + ":" + nowSec + " です。";
   document.getElementById("RealtimeClockArea").innerHTML = msg;
}
setInterval('showClock1()',1000);
</script>

