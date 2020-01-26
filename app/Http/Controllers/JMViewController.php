<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use App\User;
use DB;
use ipinfo\ipinfo\IPinfo;

class JMViewController extends Controller
{
    //
    public function accountNickChangePage() {
        $player = Auth::user();
        return view('account.nickchange')->with('player', $player);
    }

    public function nickChange(Request $req) {
        $newNick = $req['nick'];
    
        if(!$newNick) {
            return response()->json([
                'state' => 'FAIL',
                'msg' => '新昵称为不能为空！',
                'new-nick' => $newNick,
            ]);
        } else if($this->isNickExist($newNick)) {
            return response()->json([
                'state' => 'FAIL',
                'msg' => '昵称: '.$newNick.' 已经存在！',
                'new-nick' => $newNick,
            ]);
        }
        //修改昵称
        $player = Auth::user();

        $db = DB::update('update `users` set `NAME` = ? where `UID` = ?', [$newNick,$player->UID]);

        if($db) {
            return response()->json([
                'state' => 'OK',
                'msg' => '昵称修改成功！ 3秒后刷新页面...',
                'new-nick' => $newNick,
            ]);
        } else {
            return response()->json([
                'state' => 'FAIL',
                'msg' => '数据更新失败！',
                'new-nick' => $newNick,
            ]);
        }
        
    }

    public function isNickExist($nick) {
        $users = User::where("NAME","=",$nick)->get();

        return $users->count() ? true : false;
    }


}
