@extends('layouts.header')

@section('content')




<div class="container pt-5 px-5">
    <div class="row pt-5 px-5">
  
    
  <table class="table table-striped pt-5 px-5">
   <thead>
       <tr>
        <th scope="col">日時</th>
        <th scope="col">名前</th>
        <th scope="col">出勤時間</th>
        <th scope="col">退勤時間</th>
      </tr> 
    </thead>
    @foreach($time as $row)
    <tbody>
      <tr>
        <th scope="row">{{$row->month}}月{{$row->day}}日</th>
        <td>{{$row->user_name}}</td>
        <td>出勤時間{{$row->punchIn}}</td>
        <td>退勤時間{{$row->punchOut}}</td>
        <td>勤務時間{{$row->workTime}}</td>
        <td>
          
            <a href="{{route('report.edit',['id'=>$row->id])}}">{{ __('編集') }}</a>
          
        </td>
      </tr>
      
    </tbody>
    @endforeach
  </table>
  
  
  
    <table>
      <tr>
        
  
       
      </tr>
    </table>
  </div>
  </div>
  @endsection