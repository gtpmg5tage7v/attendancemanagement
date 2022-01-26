@extends('layouts.header')

@section('content')
レポートインデックスです



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


<div class="col-lg-4">

  <div class="card pd-20 pd-sm-40"> 
   <div class="table-wrapper"> 
<form method="post" action="{{ route('search.by.month') }}" >
 @csrf
  <div class="modal-body pd-20"> 
 <div class="form-group">
   <label for="exampleInputEmail1">月次検索</label>
   
   <select class="form-control" name="month">
    <option value="1">1月</option>
    <option value="2">2月</option> 
    <option value="3">3月</option> 
    <option value="4">4月</option> 
    <option value="5">5月</option> 
    <option value="6">6月</option> 
    <option value="7">7月</option> 
    <option value="8">8月</option> 
    <option value="9">9月</option> 
    <option value="10">10月</option>  
    <option value="11">11月</option> 
    <option value="12">12月</option> 
    
   </select>
   
 </div> 
       </div><!-- modal-body -->
       <div class="modal-footer">
         <button type="submit" class="btn btn-info pd-x-20">決定</button>
          
       </div>
         </form> 
   </div><!-- table-wrapper -->
 </div><!-- card -->


</div>
@endsection

 



