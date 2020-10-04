<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    //
    /**
     * 初期表示.
     */
    public function index() {
        // 画面に渡す
        return view('weather.index');
    }
    
    /**
     * 天気の情報を出力.
     */
    public function output(Request $req) {
        // city idを取得
        //var_dump( getWeather(1859171) );
        return view('weather.index' ,['weather' => $this->getWeather($req->weather_select)]);
    }
    
    /**
     * 天気の情報を取得.
     */
    private function getWeather($area_id){
    	$api_base = config('my-app.ow-ep');
    	$api_type = config('my-app.ow-at');
    	$api_parm = '?id='.$area_id.'&units=metric&appid='.config('my-app.ow-ky');
    	$api_url = $api_base.$api_type.$api_parm;
        \Log::info('api : ' . $api_url);
    	return json_decode(file_get_contents($api_url), true);
    }
}
