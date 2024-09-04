@foreach ($products as $p )
<li>
    <a href="/produk_sale/{{$p->slug}}" class="globalnav-submenu-link">{{ $p->nama_produk }}</a>
</li>

@endforeach
