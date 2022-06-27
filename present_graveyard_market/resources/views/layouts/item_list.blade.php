<div class="items">
    @forelse($items as $item)
        <div class="item">
            <div class="item_name">
                {{ $item->name }}
            </div>
            {{-- イメージは必須にしていいる --}}
            <a href="{{ route('item.show', $item->id) }}">
                <img class="item_img" src="{{ Storage::url($item->image) }}">
            </a>
            @include('layouts.like_button')
        </div>
    @empty
        表示する商品がないです！！
    @endforelse
</div>