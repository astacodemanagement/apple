@extends('front.layouts.app')
@section('content')
<div style="width: 100%; background:white;">
    <section class="py-5">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="font-manrope text-4xl font-bold text-gray-900 text-center mb-16 pt-10">Our latest blog</h2>
            <div
                class="flex justify-center  gap-y-8 lg:gap-y-0 flex-wrap md:flex-wrap lg:flex-nowrap lg:flex-row lg:justify-between lg:gap-x-8">


                @foreach ($berita as $p)
                    <div class="group w-full max-lg:max-w-xl lg:w-1/3 border border-gray-300 rounded-2xl">
                        <div class="flex items-center">
                            <img src="/upload/berita/{{ $p->gambar }}" alt="blogs tailwind section"
                                class="rounded-t-2xl w-full">
                        </div>
                        <div class="p-4 lg:p-6 transition-all duration-300 rounded-b-2xl group-hover:bg-gray-50">
                            <span class="text-gray-950 font-medium mb-3 block">{{ \Carbon\Carbon::parse($p->tanggal_posting)->translatedFormat('l, d F Y') }}
                            </span>
                            <h4 class="text-xl text-gray-900 font-medium leading-8 mb-5">{{ $p->judul_berita }}</h4>
                            <p class="text-gray-500 leading-6 mb-10">{!! substr(strip_tags($p->isi), 0, 20) !!}

                            </p>
                            <a href="{{ route('blog.blog_detail', $p->slug) }}" class="cursor-pointer text-lg text-gray-950 font-semibold">Read more..</a>
                            {{-- <a href="/blog/wr" class="cursor-pointer text-lg text-gray-950 font-semibold">Read more..</a> --}}
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
        <div class="shop-pagination pt-3">
            <div class="container">
                <div class="card">
                    <div class="card-body py-3">
                        {{ $berita->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
