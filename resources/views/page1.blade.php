<x-app-layout>
<body>
    <h1>Page1</h1>
    {{ $user->name }}

    <a href="page2">page2</a>

    <div x-data="{ count: 0 }">
        <button x-on:click="count++">カウンタが増えるボタン</button>
        <span x-text="count"></span> <!-- 数字はここに出る -->
    </div>

    <!-- x-dataで書いたオブジェクトは子要素からアクセス可能、ここではopen状態の値を保持するやつ -->
    <div x-data="{ open: false }">
        <!-- @click は onclick の代わりだよ。クリックしたら open=true を代入する(開くよ)  -->
        <button @click="open = true" x-text="open ? '開いてるよ' : 'クリックで開くよ'"></button>

        <!-- x-show は 指定した変数や式が true なら、表示するよ -->
        <span
            x-show="open"
            @click.away="open = false"
            style="border: solid black 1px; padding: 10px;"
        >
            開いたよ。この枠の外をクリックすると、閉じるよ。
        </span>
        <!-- @click.away の .away は「ここ以外を xxしたら(clickしたら)」 の修飾子だよ。
            「画面外をクリックしたら」でよく使うよね  -->
    </div>
</body>
</html>
</x-app-layout>
