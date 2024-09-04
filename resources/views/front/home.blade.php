@extends('front.layouts.app')
@section('title', $title)
@section('subtitle', $subtitle)



@section('content')
    @push('css')
        <style>
            swiper-slide {
                text-align: center;
                font-size: 18px;
                background: #fff;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            swiper-slide img {
                display: block;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }



            swiper-container {
                width: 100%;
                height: 300px;
                margin-left: auto;
                margin-right: auto;
            }

            swiper-slide {
                background-size: cover;
                background-position: center;
            }

            .mySwiper {
                height: 650px;
                width: 100%;
                z-index: 0;
            }

            .mySwiper2 {
                height: 300px;
                box-sizing: border-box;
                padding: 10px 0;
                z-index: 0;
            }

            @media (max-width: 768px) {
                .mySwiper {
                    height: 150px;
                    width: 100%;
                    z-index: 0;
                }

                .mySwiper2 {
                    height: 70px;
                    padding: 10px 0;
                }
            }

            .mySwiper2 swiper-slide {
                width: 25%;
                height: 100%;
                opacity: 0.4;
            }

            @media (max-width: 768px) {
                .mySwiper2 swiper-slide {
                    width: 50%;
                    height: 100%;
                    opacity: 0.6;
                }
            }

            .mySwiper2 .swiper-slide-thumb-active {
                opacity: 1;
            }

            swiper-slide img {
                display: block;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        </style>
    @endpush



    <div class="pt-[30px] bg-black text-white pb-5 text-center text-md">
        <p class="text-sm">{{ $profil->deskripsi }}</p>
        <a href="https://wa.me/{{ $profil->no_wa }}" class="text-blue-500">See More </a>
    </div>
    <div class="back-video">
        <video autoplay loop muted play-inline>
            <source src="video.mp4" type="video/mp4">
        </video>
        <!-- <iframe src="https://www.youtube.com/embed/zXJbdtxh0XE?autoplay=1&mute=1&controls=0&rel=0&modestbranding=1&showinfo=0" frameborder="0"
                                style="width: 100%; height: calc(100vw * 9 / 16); max-width: 1920px; max-height: 1080px; margin: 0 auto; display: block; border: none;"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;"
                                allowfullscreen></iframe> -->

    </div>

    <div class="section ">
        <div class="container flex">

            <div class="text-center md:text-start text-lg">
                <h1> Find your favorite category </h1>

            </div>

        </div>

    </div>
    <div class="products py-10">

        <div class="container flex md:justify-between justify-center md:gap-0 w-full flex-wrap items-center gap-3">
            @foreach ($kategori_produk as $p)
                <div style="background:white;" class="product md:w-[12%] w-[45%] bg-gray-100 border-2 border-gray-200 my-2 items-center p-4 rounded-lg  hover:scale-105 transition duration-300">

                    <img src="/upload/kategori_produk/{{ $p->gambar }}" alt="{{ $p->nama_kategori_produk }}"
                        class=" w-[80%]">
                    <a href="">{{ $p->nama_kategori_produk }}</a>
                </div>
            @endforeach


        </div>
    </div>
    <div class="mt-11 md:px-14 px-4 gap-5">
        <h1 class="text-2xl font-medium">The latest. Take a look at what’s new right now.</h1>
        <div class="cards flex justify gap-5" >
            @foreach ($produk as $p)
                <div class="card md:w-1/4 w-full" style="background:white;">
                    <span class="text-lg text-red-700"><b>{{ $p->kategoriProduk->nama_kategori_produk }}</b></span>
                    <a href="{{ route('produk_sale.produk_sale_detail', $p->slug) }}">
                        <h1 class="font-bold text-3xl text-gray-900">{{ $p->nama_produk }}.</h1>
                        <p class="text-gray-600"><b>Rp. {{ number_format($p->harga_jual, 0, ',', '.') }}</b></p>
                        <img src="/upload/produk/{{ $p->gambar }}" class="m-auto" alt="{{ $p->nama_produk }}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="apple-events mt-8">
        <h1 class="text-2xl font-medium leading-5 tracking-wide mb-4">
            Let's Explore New Apple Photos
        </h1>
        <div class="grid grid-cols-12 gap-4">
            @foreach ($galeri as $p)
                <div class="col-span-6 flex justify-center relative group">
                    <img src="/upload/galeri/{{ $p->gambar }}" alt="events"
                        class="w-full object-cover object-top rounded-lg shadow-[0_4px_8px_rgba(0,0,0,0.2)] transition-opacity duration-300 opacity-100">
                    <div
                        class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-0 group-hover:bg-opacity-20 rounded-lg transition-opacity duration-300">
                        <h2
                        class="text-white md:text-xl text-sm font-semibold mb-2 group-hover:scale-105 transform transition-transform duration-300"
                        style="text-shadow: 1px 1px 0 #000, -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000;">
                        {{ $p->nama_galeri }}
                    </h2>

                    <a href="{{ $p->link }}"
                        class="md:px-4 md:py-2 px-1 py-[4px] bg-white text-black rounded-lg font-medium hover:bg-gray-200 group-hover:scale-105 transform transition-transform duration-300"
                        style="border: 2px solid black;">
                        Learn More
                     </a>

                    </div>
                </div>
            @endforeach
            <!-- Tambahkan lebih banyak gambar jika diperlukan -->
        </div>
    </div>





    <div class="px-10 mx-auto rounded-lg py-10 ">
        <swiper-container style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
            class="mySwiper rounded-lg" thumbs-swiper=".mySwiper2" space-between="10" navigation="true">
            @foreach ($slider as $p)
                <swiper-slide class="rounded-lg">
                    <img class="rounded-lg" src="/upload/slider/{{ $p->gambar }}" />
                </swiper-slide>
            @endforeach
        </swiper-container>
    </div>
    <div class="px-10 mx-auto pb-10">

        <swiper-container class="mySwiper2 md:flex flex-wrap" space-between="10" slides-per-view="4" free-mode="true"
            watch-slides-progress="true">
            @foreach ($slider as $p)
            <swiper-slide class="rounded-lg">
                <img class="rounded-lg" src="/upload/slider/{{ $p->gambar }}" />
            </swiper-slide>
            @endforeach
        </swiper-container>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>












@endsection
