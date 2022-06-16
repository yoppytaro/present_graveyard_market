<div>
    @forelse($items as $item)
        <div>
            名前：{{ $item->name }}
            説明：{{ $item->description }}
            価格：{{ $item->price }}
            カテゴリー：{{ $item->category->name }}
            {{-- イメージは必須にしていいる --}}
            <a href="{{ route('item.show', $item) }}">
                <img src="{{ Storage::url($item->image) }}" style="height: 100px" >
            </a>
        </div>
    @empty
        表示する商品がないです！！
    @endforelse
</div>