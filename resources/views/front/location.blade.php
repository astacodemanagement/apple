@extends('front.layouts.app')
@section('content')

<div style="width: 100%; background: white">
    <div class="container py-16">
        <div class="flex flex-wrap ">
            <div class="w-1/2">

                <iframe src="{{ $profil->map }}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="w-1/2">
                <div class="px-10   ">
                    <h3 class="text-black text-2xl font-medium py-5">{{ $profil->nama_perusahaan }}</h3>
                    <div class="mb-6 flex items-center space-x-5">
                        <span
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full border border-gray-100 bg-light-base ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="fill-gray-800 size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                            </svg>

                        </span>
                        <div class="text-sm">
                            <h3 class="font-semibold text-gray-700 ">Telepon</h3>
                            <a href="https://wa.me/{{ $profil->no_wa }}" class="text-gray-500">{{ $profil->no_wa }}</a>
                        </div>
                    </div>
                    <div class="mb-6 flex items-center space-x-5">
                        <span
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full border border-gray-100 bg-light-base ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path
                                    d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                                <path
                                    d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                            </svg>


                        </span>
                        <div class="text-sm">
                            <h3 class="font-semibold mb-2 text-gray-700 ">Email</h3>
                            <a href="mailto:{{ $profil->email }}" class="text-gray-500">{{ $profil->email }}</a>
                        </div>
                    </div>
                    <div class="mb-6 flex items-center space-x-5">
                        <span
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full border border-gray-100 bg-light-base ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd"
                                    d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                    clip-rule="evenodd" />
                            </svg>



                        </span>
                        <div class="text-sm">
                            <h3 class="font-semibold mb-2 text-gray-700 ">Alamat</h3>
                            <a href="#" class="text-gray-500">{{ $profil->alamat }}</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
