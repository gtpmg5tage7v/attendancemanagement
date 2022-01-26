@extends('layouts.header')

@section('content')

<div class="container px-5 py-5">
  
  <div class="row px-5 py-5">
    <table class="table table-striped">
      <thead>
        <tr class="table-primary">
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          
          
          <td class="text-center"></td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            
            
            <td class="text-center">
                <a href="{{ route('account.create')}}" class="btn btn-primary btn-sm">アカウント作成</a>
                <a href="{{ route('account.edit', $user->id)}}" class="btn btn-primary btn-sm">編集</a>
                
                <form method="POST" action="{{route('account.destroy',['id'=>$user->id])}}" style="display: inline-block">
                
                    @csrf
                    <a href="#" data-id="{{ $user->id }}" onClick="return Check()">
                    <button class="btn btn-danger btn-sm" type="submit">削除する</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
  </div>
</div>

    <script>
        function Check() {
            var checked = confirm("本当に削除しますか？");
            if (checked == true) {
                return true;
            } else {
                return false;
            }
        }
     </script> 

@endsection