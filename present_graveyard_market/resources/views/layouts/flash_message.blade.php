<div class="flash_message container">
    hoge
    @if(\Session::has('success'))
        @component('components.alert_info'){{\Session::get('success')}}@endcomponent
    @endif
    @foreach ($errors->all() as $error)
        @component('components.alert_error'){{$error}}@endcomponent
    @endforeach
</div>