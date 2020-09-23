@extends('layouts.common_work')

@section('title', 'トップ')

@section('content')
    @if(isset($members) && !empty($members))
        <table class="table-sm m-4">
            <tr>
                <th class="col-xs-2 p-2">@lang('messages.member.name')</th>
                <th class="col-xs-2 p-2">@lang('messages.member.email')</th>
                <th class="col-xs-2 p-2"></th>
            </tr>
        @foreach ($members as $member)
            <tr>
                <td class="col-xs-2 p-2">{{$member->name}}</td>
                <td class="col-xs-2 p-2">{{$member->email}}</td>
                <td class="col-xs-2 p-2">
                    <a href="{{ route('member.detail', $member->id) }}">@lang('messages.member.detail')</a>
                    <a href="{{ route('member.edit', $member->id) }}">@lang('messages.member.edit')</a>
                    <a href="{{ route('member.del', $member->id) }}">@lang('messages.member.delete')</a>
                </td>
            </tr>
        @endforeach
        </table>
    @endif
    <div class="pl-2 m-4">
        <input type="button" onclick="location.href='{{route('works.index')}}'" value="{{__('messages.work.return')}}">
    </div>
@endsection

@section('footer')
    <p>
      <small>Copyright &copy;2020 Technical Diary.</small>
    </p>
@endsection