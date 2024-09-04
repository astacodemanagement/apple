<div class="mt-6 grid grid-cols-1 gap-x-4 gap-y-10 sm:grid-cols-2 lg:grid-cols-3">
    @foreach ($filteredProducts as $p)
    <div class="card w-full">
        <span class="text-lg text-red-700"><b>{{ $p->kategoriProduk->nama_kategori_produk }}</b></span>
        <a href="{{ route('produk_sale.produk_sale_detail', $p->slug) }}">
            <h1 class="font-bold text-3xl text-gray-900">{{ $p->nama_produk }}.</h1>
            <p class="text-gray-600"><b>Rp. {{ number_format($p->harga_jual, 0, ',', '.') }}</b></p>
            <a href="{{ route('produk_sale.produk_sale_detail', $p->slug) }}">
                <img src="/upload/produk/{{ $p->gambar }}" class="m-auto" alt="{{ $p->nama_produk }}">
            </a>
    </div>
    @endforeach
</div>
