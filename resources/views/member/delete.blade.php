@extends('layouts.common')

@section('title', '会員退会')

@section('content')
    <div id="mainPic">
        <div class="t_info">
            @if(isset($member))
                <table>
                   <tr><th>surname: </th><td>{{$member->surname}}</td></tr>
                   <tr><th>givenname: </th><td>{{$member->givenname}}</td></tr>
                   <tr><th>dispname: </th><td>{{$member->dispname}}</td></tr>
                   <tr><th>mail: </th><td>{{$member->mail}}</td></tr>
                </table>
                <form action="/member/del" method="post">
                   {{ csrf_field() }}
                   <input type="hidden" name="id" value="{{$member->id}}">
                   <tr><th></th><td><input type="submit" value="delete"></td></tr>
                </form>
            @endif
        </div>
    </div>
    <div id="gear">
        <img src="{{ secure_asset('./img/gear.png') }}" alt="gear">
    </div>
@endsection

@section('footer')
    <p>
      <small>Copyright &copy;2020 Technical Diary.</small>
    </p>
@endsection