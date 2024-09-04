@extends('front.layouts.app')
@section('title', $title)
@section('subtitle', $subtitle)



@section('content')

<div class="bg-white">
<div>


<main class="mx-auto max-w-7xl  ">
    <div class="flex items-baseline justify-between border-b border-gray-200 pb-6 pt-24">
        <h1 class="text-4xl font-bold text-center tracking-tight text-gray-900">Semua Produk</h1>


    </div>
    <div class="flex flex-wrap w-full">
<section aria-labelledby="products-heading" class="pb-24 pt-6 md:w-1/5 w-full px-5 md:px-0">
<div>
    <form id="category-filter-form" class="block w-full pr-4">
        @csrf
        <h3 class="sr-only">Categories</h3>

        <div class="border-b border-gray-200 py-6">
            <h3 class="-my-3 flow-root">
                <button type="button" class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-section-1" aria-expanded="false">
                    <span class="font-medium text-gray-900">Category</span>
                    <span class="ml-6 flex items-center">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                        </svg>
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
            </h3>
            <div class="pt-6" id="filter-section-1">
                <div class="space-y-4">
                    @foreach ($kategori_produk as $item)
                    <div class="flex items-center">
                        <input id="filter-category-{{ $item->id }}" name="category[]" value="{{ $item->id }}" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-category-{{ $item->id }}" class="ml-3 text-sm text-gray-600">{{ $item->nama_kategori_produk }}</label>
                    </div>
                    @endforeach
                </div>
            </div>

            <button type="button" id="filter-button" class="mt-4 w-full inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-black hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Filter
            </button>
        </div>
    </form>

    <!-- Section to display filtered results -->
    <div id="filtered-results">
        <!-- The filtered products will be displayed here -->
    </div>
</div>
</section>

<div class="md:w-[80%] w-full md:pl-7 md:px-0 px-3 pb-16" id="product-list">
<div class="mt-6 grid grid-cols-1 gap-x-4 gap-y-10 sm:grid-cols-2 lg:grid-cols-3">
    @foreach ($produk as $p)
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
</div>
</div>

</main>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#filter-button').click(function(e) {
            e.preventDefault();

            // Collect selected categories
            var selectedCategories = [];
            $("input[name='category[]']:checked").each(function() {
                selectedCategories.push($(this).val());
            });

            // Send AJAX request
            $.ajax({
                url: "{{ route('category.filter') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    categories: selectedCategories
                },
                success: function(response) {
                    // Update the product list with filtered results
                    $('#product-list').html(response);
                },
                error: function(xhr) {
                    console.log(xhr.responseText); // Handle error here
                }
            });
        });
    });
</script>

@endsection