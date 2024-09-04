@extends('front.layouts.app')


@section('content')
    <div style=" background: white; padding-top:50px; padding-bottom:250px;">


        <div class="text-center mb-[30px] md:mb-[90px]">
            <h2
                class="font-bold mx-auto text-[35px] leading-[44px] md:text-[46px] md:leading-[52px] lg:text-heading-1 text-gray-900 mb-5 md:mb-[30px] max-w-[725px]">
                {{ $menu->header }}</h2>
            <p class="text-quote md:text-lead-lg text-gray-600 mx-auto max-w-[976px]">
                {{ $menu->desc ?? 'Tidak Ada Deskripsi' }}</p>
        </div>

        <!-- Cards Section -->
        <div class="flex flex-wrap gap-[30px] mx-auto lg:flex-nowrap max-w-[1190px]">
            <!-- Card One -->
            <div
                class="flex-1 text-center rounded-2xl p-5 max-h-[380px] md:max-h-[450px] xl:max-h-[455px] md:p-14 mb-[30px] lg:mb-0 transition-all duration-300 hover:translate-y-[-3px] bg-gray-200">
                <h3 class="font-bold text-[20px] leading-[26px] md:text-heading-4 mb-[18px]">
                    {{ $menu->title_card_one }}</h3>
                <p class="text-md text-gray-600 mb-[22px] lg:mx-16">{{ $menu->card1_title }}</p>
                <img class="p-5 rounded-2xl object-cover mx-auto w-full bg-[#EBECF4] h-[500px]"
                    src="{{ asset('upload/menu/cardone/' . $menu->image_card_one) }}" alt="Feature image">
            </div>

            <!-- Card Two -->
            <div
                class="flex-1 text-center rounded-2xl p-5 max-h-[380px] md:max-h-[450px] xl:max-h-[455px] md:p-14 mb-[30px] lg:mb-0 transition-all duration-300 hover:translate-y-[-3px] bg-gray-900">
                <h3 class="font-bold text-white text-[20px] leading-[26px] md:text-heading-4 mb-[18px]">
                    {{ $menu->title_card_two }}</h3>
                <p class="text-md text-gray-100 mb-[22px] lg:mx-16 ">{{ $menu->card2_title }}</p>
                <img class="p-5 rounded-2xl object-cover mx-auto w-full bg-[#EBECF4] h-[500px]"
                    src="{{ asset('upload/menu/cardtwo/' . $menu->image_card_two) }}" alt="Feature image">
            </div>
        </div>
    </div>
@endsection
