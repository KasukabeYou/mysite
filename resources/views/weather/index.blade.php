@extends('layouts.common_work')

@section('title', '天気情報')

@section('content')
<div style="min-height:600px;" class="container p-4">
    <div class="pt-2 pl-4">
        <h3>天気情報の出力</h3>
        <h3>地図やほかの都市を選べるように実装内容を変更→現在固定値</h3>
    </div>
    <form action="/weather/output" method="post">
    @csrf
    <select name='weather_select'>
        <option value="1853908">大阪</option>
        <option value="1850147">東京</option>
        <option value="1863967">福岡</option>
    </select>
    <input type="submit" value="検索">
    </form>
    @if(isset($weather))
        <p>ダンプの結果</p>
        {{var_dump($weather)}}
    @endif
</div>
@endsection

@section('footer')
    <p>
      <small>Copyright &copy;2020 Technical Diary.</small>
    </p>
@endsection