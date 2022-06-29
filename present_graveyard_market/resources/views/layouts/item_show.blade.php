<h1 class="text-center">{{ $item->name }}</h1>
<div class="row mb-5">
    <img class="col-4" src="{{ Storage::url($item->image) }}">
    <div class="col-6">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td class="bg-white">カテゴリー</td>
                    <td>{{$item->category}}</td>
                </tr>
                <tr>      
                    <td class="bg-white">価格</td>
                    <td>￥{{ number_format($item->price) }}</td>
                </tr>
            </tbody>
        </table>
        <p class="font-weight-bold">この商品について</p>
        {{ $item->description }}
    </div>
</div>

