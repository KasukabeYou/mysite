@extends('layouts.common')

@section('title', '会員退会')

@section('content')
<div class="container">
    @if(isset($member))
    <form action="/member/del" method="post">
       @csrf
        <input type="hidden" name="id" value="{{$member->id}}">
        <table class="table-sm m-4">
           <tr><th class="col-xs-2 p-2">name: </th><td class="col-xs-2 p-2">{{$member->name}}</td></tr>
           <tr><th class="col-xs-2 p-2">email: </th><td class="col-xs-2 p-2">{{$member->email}}</td></tr>
            <tr><td class="col-xs-2 p-2 text-center" colspan="2"><input type="submit" value="delete"></td></tr>
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