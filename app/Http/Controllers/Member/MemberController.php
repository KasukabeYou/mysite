<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Member;
use App\Http\Controllers\Controller;
use Session;

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
	 * 削除画面遷移.
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
	public function create(Request $request)
	{
		// 二重送信対策
        $request->session()->regenerateToken();

		$mem = new Member;
		$mem->surname = $request->surname;
		$mem->givenname = $request->givenname;
		$mem->dispname = $request->dispname;
		$mem->mail = $request->mail;
		$mem->save();
// 		$mem->fill($request->all())->save();

        return $this->selMems();
		//DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
// 		return redirect('top');
	}

	/**
	 * 更新処理.
	 */
	public function update(Request $request)
	{
		// 二重送信対策
        $request->session()->regenerateToken();

		$same_values  = [ 'surname' => $request->surname, 'givenname' => $request->givenname, 'dispname' => $request->dispname, 'mail' => $request->mail];
		// パスワードが設定されている場合
		if (isset($request->password) && !empty($request->password)) {
			$same_values['password'] = $request->password;
		}
        Member::where('id', $request->id)->update($same_values);
		return $this->selMems();
	}

	/**
	 * 削除処理.
	 */
	public function delUpdate(Request $request)
	{
		// 二重送信対策
        $request->session()->regenerateToken();
        
		$same_values  = [ 'del_flg' => 1];
        Member::where('id', $request->id)->update($same_values);
		return $this->selMems();
	}

	/**
	 * 会員情報取得.
	 */
	private function selMems() {
        // $member = new Member;
        $members = Member::where('del_flg', 0)->get();

        return view('member.show',['members' => $members]);
	}

	/**
	 * 対象の会員情報取得.
	 */
	private function selMem($id, $pass) {
        $mem = Member::find($id);
		return view($pass,['member' => $mem]);
	}
}