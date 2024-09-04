@extends('front.layouts.app')
@section('content')

<section style="width: 100%; background:white;" class="pb-10">
    <div class="px-[12px] pt-10 md:px-[36px] mt-[5px] xl:px-0 mx-auto text-md text-gray-500 relative blog-content max-w-[830px] text-[14px]  leading-[25px] md:text-[18px] md:leading-[32px]">

        <div class="flex items-center justify-between mb-7 md:mb-[57px]">
            <div class="flex items-center gap-[15px]"><img
                    class="h-full w-full object-cover rounded-full max-w-[55px]" src="/images/avatar-11.png"
                    alt="avatar">
                <div>
                    <p class="text-lead line-clamp-2 font-bold mb-[3px] text-gray-900 !text-heading-6">
                        {{ $berita->penulis }}
                    </p>
                    <p class="text-md text-gray-500 !text-sm font-bold">
                        {{ \Carbon\Carbon::parse($berita->tanggal_posting)->translatedFormat('l, d F Y') }}</p>
                </div>
            </div><span
                class="font-sans inline-block bg-bg-6 text-gray-900 py-[14px] px-[28px] rounded-[50px] text-[14px] leading-[14px]">
                <b> {{ $berita->kategoriBerita->nama_kategori_berita }}</b></span>
        </div>
        <div class="mb-6 md:mb-9"><img class="h-full w-full object-cover" src="/upload/berita/{{ $berita->gambar }}"
                alt="post image">
        </div>
        <!-- AddToAny BEGIN -->
        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
            <a class="a2a_button_facebook"></a>
            <a class="a2a_button_email"></a>
            <a class="a2a_button_telegram"></a>
            <a class="a2a_button_whatsapp"></a>
        </div>
        <script src="https://static.addtoany.com/menu/page.js"></script>

        <!-- AddToAny END -->
        <br>
        <h2 class="font-bold font-sans text-[25px] leading-[30px] md:text-heading-3 mb-6 text-gray-900 md:mb-9">
            {{ $berita->judul_berita }}</h2>
        </h2>
        <p class="mb-6 md:mb-9">{!! $berita->isi !!}</p>
        <br>
        <div class="flex items-center gap-4 mb-10 flex-wrap md:mb-[60px]">
            @foreach ($kategoriBerita as $kategori)
                <button type="button">
                    <a class="flex items-center inline-block relative transition-all duration-200 group py-3 px-5 rounded-md bg-gray-200 text-gray-900 hover:bg-gray-900 hover:text-white hover:-translate-y-[2px]"
                        href="">
                        <span
                            class="block text-inherit w-full h-full rounded-md text-md font-normal">{{ $kategori->nama_kategori_berita }}</span>
                    </a>
                </button>
            @endforeach
        </div>




    </div>
</section>

@endsection
