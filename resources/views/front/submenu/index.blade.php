@extends('front.layouts.app')
@section('content')
<div style="width: 100%; background: white">
    <div class="container py-10">
        {!!$submenu->content!!}
    </div>
</div>

@endsection
