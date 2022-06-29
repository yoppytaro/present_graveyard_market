<div class="p-3">
    <div class="form-group">
        <label for="name">名前</label>
        <input class="form-control" type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}" placeholder="名前">
    </div>
    <div class="form-group">
        <label for="profile">プロフィール</label>
        <textarea class="form-control" name="profile" id="profile">{{ old('profile', Auth::user()->profile) }}</textarea>
    </div>
    <div class="form-group">
        <label for="image">画像</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="image" name="image" multiple>
            <label class="custom-file-label" for="image" data-browse="参照">ファイル選択...</label>
        </div>
    </div>
    <div>
        @component('components.button_danger'){{$bt_value}}@endcomponent
    </div>
</div>