<div>
    名前：{{ $item->name }}
    説明：{{ $item->description }}
    価格：{{ $item->price }}
    カテゴリー：{{ $item->category }}
    {{-- イメージは必須にしていいる --}}
    <img src="{{ Storage::url($item->image) }}" style="height: 100px" >
</div>