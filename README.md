# コード規約
https://github.com/alexeymezenin/laravel-best-practices/blob/master/japanese.md

https://qiita.com/gone0021/items/e248c8b0ed3a9e6dbdee

変数：スネークケース（$user_data）
メソッド：キャメルケース（getAll）
ビュー：ケバブケース（show-filtered.blade.php）

共通
- カンマの後に半角スペースを入れる
- インデント入れる
```
if ($user_id and $item_id) {
    return $query->where('items.id', '=', $item_id)
        ->where('items.user_id', '=', $user_id);
```


コントローラ
- return view内にロジックを書かない、一度変数に入れて指定する
- compactを使う


サービスクラス
- 
- サービスクラス内でデータ操作をするときは、サービスクラスでFormRequestをメソッドインジェクションする
- updateとcreateは一緒で良いが、deleteは分けた方が良い
```
別でdelete()メソッドを作った方がよいです！
ちなみに Upsert というものがいろいろなDBで使えたりするのでupdateとcreateは一緒でも良いかも。ただその時のメソッド名は upsert もしくは updateOrCreate にすると良いですね！
（内容がメソッド名で分かるように）
```
