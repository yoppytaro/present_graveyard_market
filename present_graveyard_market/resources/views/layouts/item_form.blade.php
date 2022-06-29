<div class="p-3">
    <div class="form-group">
        <label for="name">名前</label>
        <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $item->name) }}" placeholder="名前">
    </div>
    <div class="form-group">
        <label for="description">説明</label>
        <textarea class="form-control" name="description" id="description">{{ old('description', $item->description) }}</textarea>
    </div>
    <div class="form-group">
        <label for="price">価格</label>
        <input class="form-control" type="number" name="price" id="price" value="{{ old('price', $item->price) }}">
    </div>
    <div class="form-group">
        <label for="category">カテゴリー</label>
        <select class="custom-select" name="category" id="category">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    @if($category->id == $item->category_id)
                        selected
                    @endif
                >{{ $category->name }}</option>
            @endforeach
        </select>
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