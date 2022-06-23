<div class="wrapper">
    <form method="POST" action="{{ route('item.store', Auth::user()) }}" enctype="multipart/form-data">
    <form method="POST" action="{{ route('item.store', Auth::user()) }}" enctype="multipart/form-data">
        @csrf
        <div>
            <input type="file" name='image'>
        </div>
        <div>
            <label for="name">名前</label>
            <input type="text" name="name" id="name" value="{{ $item->name ? $item->name : old('name') }}">
        </div>
        <div>
            <label for="description">説明</label>
            <textarea name="description" id="description">{{ $item->description ? $item->description : old('description') }}</textarea>
        </div>
        <div>
            <label for="price">価格</label>
            <input type="number" name="price" id="price" value="{{ $item->price ? $item->price : old('price') }}">
        </div>
        <div>
            <label for="category">カテゴリー</label>
            <select name="category" id="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        @if( old('category') == $id )
                            selected
                        @elseif( !old('category') && $item->category_id == $id )
                            selected
                        @endif
                    >{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <input type="submit" value="登録">
        </div>
    </form>
</div>