<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Session;
use App\Http\Requests\MemberRequest;
use Illuminate\Support\Facades\Hash;
use Log;

class MemberController extends Controller
{
	/**
	 * 一覧表示画面遷移.
	 */
    public function show() {
        return $this->selMems();
        //return view('member.show',['members' => $mems]);
    }

	/**
	 * 詳細画面遷移.
	 */
    public function detail($id) {
    	return $this->selMem($id, 'member.detail');
    }

	/**
	 * 登録画面遷移.
	 */    
	public function signup(Request $request)
	{
		return view('member.signup');
	}

	/**
	 * 編集画面遷移.
	 */
	public function edit($id)
	{
  //      $mems = Member::find($id);
		// return view('member.edit',['members' => $mems]);
		return $this->selMem($id, 'member.edit');
	}
	
	/**
	 * 削除画面遷移.
	 */
    public function delete($id) {
    	return $this->selMem($id, 'member.delete');
    }
    
	/**
	 * 登録処理.
	 */
	public function create(MemberRequest $request)
	{
		Log::info("登録処理実行 -start");
		// 二重送信対策
        $request->session()->regenerateToken();
        
        // エラーチェック

		// 登録内容設定
		$mem = new User;
		$mem->name = $request->name;
		$mem->email = $request->email;
		$mem->password = Hash::make($request->password);
		$mem->del_flg = "0";
		$mem->save();
		
		Log::info("登録処理実行 -end");
		
        return $this->selMems();
	}

	/**
	 * 更新処理.
	 */
	public function update(MemberRequest $request)
	{
		// 二重送信対策
        $request->session()->regenerateToken();

		$same_values  = [ 'name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password)];

		// 更新
        User::where('id', $request->id)->update($same_values);
        
		return $this->selMems();
	}

	/**
	 * 削除処理.
	 */
	public function delUpdate(Request $request)
	{
		// 二重送信対策
        $request->session()->regenerateToken();
        
        // 削除設定
		$same_values  = [ 'del_flg' => 1];
        User::where('id', $request->id)->update($same_values);
        
		return $this->selMems();
	}

	/**
	 * 会員情報取得.
	 */
	private function selMems() {
		
        $members = User::where('del_flg', 0)->get();

        return view('member.show',['members' => $members]);
	}

	/**
	 * 対象の会員情報取得.
	 */
	private function selMem($id, $pass) {
        $mem = User::find($id);
		return view($pass,['member' => $mem]);
	}
}