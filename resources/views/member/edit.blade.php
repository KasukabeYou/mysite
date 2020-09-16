@extends('layouts.common_work')

@section('title', '会員編集')

@section('content')
<div class="container">
    @if(isset($member) && !empty($member))
    <form action="/member/edit" method="post">
       @csrf
        <table class="table-sm m-4">
               <input type="hidden" name="id" value="{{$member->id}}">
               <tr><th class="col-xs-2 p-2">name: </th><td class="col-xs-2 p-2"><input type="text" name="name" value="{{$member->name}}"></td></tr>
               <tr><th class="col-xs-2 p-2">email: </th><td class="col-xs-2 p-2"><input type="text" name="email" value="{{$member->email}}"></td></tr>
               <input type="hidden" name="password" value="{{$member->password}}">
               <input type="hidden" name="password_confirmation" value="{{$member->password}}">
               <tr><td class="col-xs-2 p-2 text-center" colspan="2"><input type="submit" value="edit"></td></tr>
        </table>
    </form>
    @endif
</div>

@endsection

@section('footer')
    <p>
      <small>Copyright &copy;2020 Technical Diary.</small>
    </p>
@endsection