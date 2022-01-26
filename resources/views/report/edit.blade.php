@extends('layouts.header')

@section('content')
    

        <div class="container">
            <h3 class="py-5">氏名　{{$time->user_name}}</h3>
        <form method="POST" action="{{route('report.update',['id' =>$time->id])}}">
        @csrf

        <div class="form-group">
            <label for="exampleInputEmail1">出勤時間:{{$time->punchIn}}</label>
            <input type="text" class="form-control col-4" name=punchIn value="{{$time->punchIn}}">
            
            
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">退勤時間:{{$time->punchOut}}</label>
            <input type="text" class="form-control col-4" name=punchOut value="{{$time->punchOut}}">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">労働時間{{$time->workTime}}時間</label>
            <input type="text" class="form-control col-4" name=workTime value="{{$time->workTime}}">
            
            
          </div>

        {{-- <div class="form-group row">
            <label for="text" class="col-sm-2 col-form-label">出勤時間{{$time->punchIn}}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name=punchIn value="{{$time->punchIn}}">
            </div>
        </div> --}}

        {{-- <div class="form-group row">
            <label for="text" class="col-sm-2 col-form-label">退勤時間{{$time->punchOut}}</label>
            <div class="col-sm-10">
                <input type="datetime-local" class="form-control" name=punchOut value="{{$time->punchOut}}">
            </div>
        </div>
 --}}   
 
        {{-- <div class="form-group row">
            <label for="text" class="col-sm-2 col-form-label">労働時間{{$time->workTime}}</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name=workTime value="{{$time->workTime}}">
            </div>
        </div> --}}
        <input type="submit" value="更新する">
    </form>
    


<a href="{{route('searchproduct',['id'=>$time->id])}}">{{ __('詳細に戻る') }}</a>
</div>

@endsection







  

  
