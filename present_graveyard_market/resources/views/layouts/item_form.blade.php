<div>
    <input type="file" name='image'>
</div>
<div>
    <label for="name">名前</label>
    <input type="text" name="name" id="name" value="{{ old('name', $item->name)}}">
</div>
<div>
    <label for="description">説明</label>
    <textarea name="description" id="description">{{ old('description'), $item->description }}</textarea>
</div>
<div>
    <label for="price">価格</label>
    <input type="number" name="price" id="price" value="{{ old('price'), $item->price }}">
</div>
<div>
    <label for="category">カテゴリー</label>
    <select name="category" id="category">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                @if($category->id == $item->category_id)
                    selected
                @endif
            >{{ $category->name }}</option>
        @endforeach
    </select>
</div>
<div>
    <input type="submit" value="登録">
</div>