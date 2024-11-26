<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PageController extends Controller
{
    public function page1()
    {
        $user = auth()->user();
        return view('page1')->with('user', $user);
    }

    public function page2()
    {
        return view('page2');
    }

    // 全てのユーザーデータを JSON で返す
    public function example(Request $request)
    {
        // users テーブルの全データを取得
        $users = User::all();

        // JSON レスポンスを返す
        return response()->json([
            'status' => 'success',
            'data' => $users
        ]);
    }
}
