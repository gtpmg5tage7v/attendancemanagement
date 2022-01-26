@extends('layouts.header')

@section('content')
  <div class="container">
    <div class="mx-auto">
      <br>
      <h2 class="text-center">勤務検索画面</h2>
      <br>
      <!--検索フォーム-->
      <div class="row">
        <div class="col-sm">
          <form method="GET" action="{{ route('searchproduct')}}">
            @csrf
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">日時</label>
              <!--入力-->
              <div class="col-sm-5">
                <input type="month" class="form-control" name="searchWord" value="{{ $searchWord }}">
              </div>
              <div class="col-sm-auto">
                <button type="submit" class="btn btn-primary ">検索</button>
              </div>
            </div>     
            <!--プルダウンカテゴリ選択-->
            <div class="form-group row">
              <label class="col-sm-2">スタッフ名</label>
              <div class="col-sm-3">
                <select name="userId" class="form-control" value="{{ $userId }}">
                  <option value="">未選択</option>

                  @foreach($users as $id => $name)
                  <option value="{{ $id }}">
                    {{ $name }}
                  </option>  
                  @endforeach
                </select>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    
    
    @if (!empty($products))
    <div class="productTable">
      <p>全{{ $products->count() }}件</p>
      <table class="table table-hover">
        <thead style="background-color: #ffd900">
          <tr>
            <th style="width:50%">勤務時間</th>
            <th>スタッフ名</th>
            <th>勤務時間</th>
            <th>年　月　日</th>
            <th></th>
          </tr>
        </thead>
        
        @foreach($products as $product)
        
        <tr>
          <td>{{ $product->punchIn }}～{{ $product->punchOut }}</td>
          <td>{{ $product->user->name }}</td>
          
          <td>{{ $product->workTime }}時間</td>
          
          <td>{{ $product->year }}年{{ $product->month }}月{{ $product->day }}日</td>
          <td><a href="{{route('report.edit',['id'=>$product->id])}}" class="btn btn-primary btn-sm">詳細</a></td>
          
        </tr>
       
        @endforeach
        
        <div class="alert alert-success" role="alert">
          累計時間：{{$total}}時間
        </div>
        
      </table>
    </div>
    
    <div class="d-flex justify-content-center">
      
      {{ $products->appends(request()->input())->links() }}
    </div>
    
    @endif
  </div>
</main>

@endsection