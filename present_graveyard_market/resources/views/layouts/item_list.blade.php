<div class="items mb-5 row row-cols-1 row-cols-md-4">
    @forelse($items as $item)
    <div class="p-2">
        <div class="item card">
            <a class="text-decoration-none" href="{{ route('item.show', $item->id) }}">
                <img class="card-img-top" src="{{ Storage::url($item->image) }}">
            </a>
            <div class="card-body">
                {{-- イメージは必須にしていいる --}}
                <h5 class="card-title">{{ $item->name }}</h5>
                <p class="card-text">￥{{ number_format($item->price) }}</p>
                @include('layouts.like_button')
            </div>
        </div>
    </div>
    @empty
        表示する商品がないです！！
    @endforelse
</div>