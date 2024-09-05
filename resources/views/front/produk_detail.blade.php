@extends('front.layouts.app')
@section('title', $title)
@section('subtitle', $subtitle)



@section('content')
<div class="bg-white">
    <div class="pt-6">
      {{-- <nav aria-label="Breadcrumb">
        <ol role="list" class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
          <li>
            <div class="flex items-center">
              <a href="#" class="mr-2 text-sm font-medium text-gray-900">Men</a>
              <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
              </svg>
            </div>
          </li>
          <li>
            <div class="flex items-center">
              <a href="#" class="mr-2 text-sm font-medium text-gray-900">Clothing</a>
              <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
              </svg>
            </div>
          </li>

          <li class="text-sm">
            <a href="#" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600">Basic Tee 6-Pack</a>
          </li>
        </ol>
      </nav> --}}

      <!-- Image gallery -->
      <div class="mx-auto pt-10 w-full  flex flex-wrap max-w-7xl ">


          <div class=" overflow-hidden rounded-lg md:w-[60%] w-full p-10 md:p-0">
          <img id="mainImage" src="/upload/produk/{{ $produk->gambar }}" alt="" class="rounded-lg md:h-auto h-full" style="width: 100%;  object-fit:cover;">


          </div>
          <div class="mt-4 flex md:flex-col  md:items-center justify-start px-3 mx-10">
            <img id="mainImage" src="/upload/produk/{{ $produk->gambar }}" alt="" class="thumbnail rounded-lg border border-gray-300  my-3 w-[150px] md:h-1/5 h-full object-center bg-cover" style=" object-fit: cover; cursor: pointer;">
            @forelse ($produk->gambars as $image )


            <img src="/upload/produk/{{ $image->gambar }}" alt="" class="thumbnail rounded-lg border border-gray-300  my-3 w-[150px] md:h-1/5 h-full object-center bg-cover" style=" object-fit: cover; cursor: pointer;">
            @empty

            @endforelse

        </div>
        </div>
        <!-- <div class="mt-4 flex space-x-4">
        @foreach($produk->gambars as $image)
            <img src="/upload/produk/{{ $image->gambar }}" alt="" class="thumbnail" style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;">
        @endforeach
    </div>
       -->
    </div>
    <br><br>  
      </div>


      <!-- Product info -->
      <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
        <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
          <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{{ $produk->nama_produk }}</h1>
        </div>

        <!-- Options -->
        <div class="mt-4 lg:row-span-3 lg:mt-0">
          <h2 class="sr-only">Product information</h2>
          <p class="text-3xl tracking-tight text-gray-900">Rp. {{ number_format($produk->harga_jual, 0, ',', '.') }}</p>


          <!-- Reviews -->
          <div class="mt-6">
            <h3 class="sr-only">Reviews</h3>
            <div class="flex items-center">
              <div class="flex items-center">
                <!-- Active: "text-gray-900", Default: "text-gray-200" -->
                <svg class="h-5 w-5 flex-shrink-0 text-gray-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
                <svg class="h-5 w-5 flex-shrink-0 text-gray-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
                <svg class="h-5 w-5 flex-shrink-0 text-gray-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
                <svg class="h-5 w-5 flex-shrink-0 text-gray-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
                <svg class="h-5 w-5 flex-shrink-0 text-gray-200" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
              </div>
              <p class="sr-only">4 out of 5 stars</p>

            </div>
          </div>

          <form class="mt-10">
            <!-- Colors -->


            <!-- Sizes -->
            <div class="mt-10">
              <div class="flex items-center justify-between">
                <h3 class="text-sm font-medium text-gray-900">Stok : {{ $produk->stok }}</h3>
                <a href="#" class="text-sm font-medium text-green-600 hover:text-indigo-500">Kategori :
                @if ($kategori_produk_terkait)
                    {{ $kategori_produk_terkait->nama_kategori_produk }} <!-- Menampilkan nama kategori -->
                @else
                    Tidak ada kategori
                @endif </a>
              </div>


            </div>

            <a href="https://wa.me/{{ $profil->no_wa }}?text=Halo%2C%20saya%20ingin%20memesan%20produk%20{{ urlencode($produk->nama_produk) }}%20dengan%20harga%20Rp.%20{{ number_format($produk->harga_jual, 0, ',', '.') }}.%20Terima%20kasih" target="_blank" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-green-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                <i class="fab fa-whatsapp mr-2"></i> Order Via Whatsapp
            </a>

             </form>
        </div>

        <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
          <!-- Description and details -->
          <div>

            <h3 class="sr-only">Description</h3>

            <div class="space-y-6">
              <p class="text-base text-gray-900">{!! $produk->deskripsi !!}</p>
            </div>
          </div>





        </div>
      </div>
    </div>
  </div>
  <!-- jquery cdn -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
        $('.thumbnail').on('click', function(){
            var newSrc = $(this).attr('src');
            $('#mainImage').attr('src', newSrc);
        });
    });
</script>
@endsection
