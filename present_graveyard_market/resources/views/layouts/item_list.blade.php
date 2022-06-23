<div class="items">
    @forelse($items as $item)
        <div>
            名前：{{ $item->name }}
            説明：{{ $item->description }}
            価格：{{ $item->price }}
            カテゴリー：{{ $item->category }}
            {{-- イメージは必須にしていいる --}}
            <a href="{{ route('item.show', $item->id) }}">
                <img src="{{ Storage::url($item->image) }}" style="height: 100px" >
            </a>
            @include('layouts.like_button')
        </div>
    @empty
        表示する商品がないです！！
    @endforelse
</div>