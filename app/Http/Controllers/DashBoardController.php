<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    /**
     * Display the dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // 認証されたユーザー情報を取得
        $user = auth()->user();

        // 必要に応じて、ダッシュボードに表示するデータを取得します
        $data = [
            'title' => 'Dashboard',
            'userName' => $user->name ?? 'Guest', // ユーザー名
            'userEmail' => $user->email ?? 'Not Available', // ユーザーのメールアドレス
            'userCount' => 100, // 例: ユーザー数
            'recentActivities' => [], // 最近のアクティビティ
        ];

        // dd($data );

        // ビューにデータを渡して表示
        return view('dashboard', $data);
    }
}
