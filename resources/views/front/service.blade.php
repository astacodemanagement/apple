@extends('front.layouts.app')
@push('css')
<link rel="stylesheet" href="{{asset('app.min.css')}}">
<link rel="stylesheet" href="{{asset('tailwind.min.css')}}">


    
@endpush
@section('content')
<div class="wrapper mx-auto text-gray-900 font-normal max-w-[1320px]"><a name="top"> </a>
      <div class="absolute top-0 left-0 w-screen h-full bg-opacity-80 hidden video-iframe bg-[#0b0b0b] z-[999999]">
        <div class="mx-auto video w-1/2">
          <div class="flex justify-end">
            <button class="text-white close-video text-[20px]" type="button" title="Close (Esc)">x</button>
          </div>
          <iframe class="aspect-video w-full" src="https://www.youtube.com/embed/oRI37cOPBQQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
      <div class="overlay"></div>
    
   

      <div class="px-[12px] pb-24 md:px-[36px] mt-[70px] xl:px-0 lg:mt-[133px]"> 
        <div class="text-center mb-[30px] md:mb-[90px]">
          <h2 class="font-bold  mx-auto text-[35px] leading-[44px] md:text-[46px] md:leading-[52px] lg:text-heading-1 text-gray-900 mb-5 md:mb-[30px] max-w-[725px]">Discover powerful features to boost your productivity</h2>
          <p class="text-quote md:text-lead-lg text-gray-600 mx-auto max-w-[976px]">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit laborum — semper quis lectus nulla.
          </p>
        </div>
        <div class="mx-auto lg:flex gap-[30px] max-w-[1190px]"> 
          <div class="text-center rounded-2xl p-5 max-h-[300px] md:max-h-[450px] lg:max-h-[380px] xl:max-h-[455px] md:p-14 mb-[150px] md:mb-[300px] lg:mb-0 transition-all duration-300 hover:translate-y-[-3px] bg-gray-200">
            <h3 class="font-bold  text-[20px] leading-[26px] md:text-heading-4 mb-[18px]">Cross-Platform
            </h3>
            <p class="text-md text-gray-600 mb-[22px] lg:mx-16">Your site is not complete with only landings. Get essential inner pages using our ready demos.</p><img class="p-5 rounded-2xl object-cover mx-auto w-full bg-[#EBECF4]" src="https://cdnpro.eraspace.com/media/catalog/product/m/a/macbook_air_m1_space_gray_1.jpg" alt="Feature image">
          </div>
          <div class="text-center rounded-2xl p-5 max-h-[300px] md:max-h-[450px] lg:max-h-[380px] xl:max-h-[455px] md:p-14 mb-[150px] md:mb-[300px] lg:mb-0 transition-all duration-300 hover:translate-y-[-3px] bg-gray-900">
            <h3 class="font-bold text-white  text-[20px] leading-[26px] md:text-heading-4 mb-[18px]">Extremely Flexible
            </h3>
            <p class="text-md text-gray-100 mb-[22px] lg:mx-16">Your site is not complete with only landings. Get essential inner pages using our ready demos.</p><img class="p-5 rounded-2xl object-cover mx-auto w-full bg-[#EBECF4]" src="https://cdnpro.eraspace.com/media/catalog/product/a/p/apple_iphone_15_pro_max_natural_titanium_1_1_2.jpg" alt="Feature image">
          </div>
        </div>
      </div>
   
      <div class="gap-6 px-5 pt-10 lg:flex xl:gap-[50px] mt-[70px] lg:mt-[150px]">
        <div class="flex-1 mb-[40px]">
          <div class="mb-[22px]">
            <h2 class="text-gray-900 font-bold  mb-5 text-[35px] leading-[44px] md:text-[46px] md:leading-[52px] lg:text-heading-1 md:mb-[30px] max-w-[725px]">Frequently asked questions</h2>
            <p class="text-quote md:text-lead-lg text-gray-600">
            </p>
          </div>
          <p class="text-text text-gray-600 mb-[40px]">Feeling inquisitive? Have a read through some of our FAQs or contact our supporters for help
          </p>
          <div class="flex flex-col lg:max-w-[303px] md:gap-[35px] lg:mb-[48px]">
            <div class="mb-[30px] lg:mb-0">
              <div class="flex items-center mb-[17px]"><img class="mr-[9px]" src="images/icons/icon-leaf.svg" alt="leaf icon">
                <h4 class="text-heading-6  font-bold">Boost your sale</h4>
              </div>
              <p class="text-excerpt text-gray-600">The latest design trends meet hand-crafted templates.</p>
            </div>
            <div class="mb-[30px] lg:mb-0">
              <div class="flex items-center mb-[17px]"><img class="mr-[9px]" src="images/icons/icon-leaf.svg" alt="leaf icon">
                <h4 class="text-heading-6  font-bold">Introducing New Features</h4>
              </div>
              <p class="text-excerpt text-gray-600">The latest design trends meet hand-crafted templates.</p>
            </div>
          </div>
          <div class="flex items-center"> 
            <button type="button"> <a class="flex items-center inline-block z-10 relative transition-all duration-200 group px-[22px] py-[15px] lg:px-[32px] lg:py-[22px] rounded-[50px] bg-gray-900 text-white hover:bg-gray-100 hover:text-gray-900 hover:-translate-y-[2px] text-white bg-gray-900 w-fit" href="#"><span class="block text-inherit w-full h-full rounded-[50px] text-lg  font-semibold">Contact Us</span><i> <img class="ml-[7px] w-[12px] filter-white group-hover:filter-black" src="images/icons/icon-right.svg" alt="arrow right icon"></i></a></button>
            <button type="button"> <a class="flex items-center inline-block z-10 relative transition-all duration-200 group px-[22px] py-[15px] lg:px-[32px] lg:py-[22px] rounded-md bg-gray-900 text-white hover:bg-gray-100 hover:text-gray-900 hover:-translate-y-[2px] text-gray-900 bg-transparent w-fit" href="#"><span class="block text-inherit w-full h-full rounded-md text-lg  font-semibold">Support Center</span></a></button>
          </div>
        </div>
        <div class="flex-[1.5]">
          <div class="relative accordion-item mb-5">
            <details>
              <summary class="flex justify-between py-5 items-center gap-5 px-[30px]">
                <h4 class="font-bold  text-[14px] xl:text-heading-5">Where is my order? Quisque molestie
                </h4>
              </summary>
              <p class="text-text content  mt-[30px] ml-[30px]">Nulla non sollicitudin. Morbi sit amet laoreet ipsum, vel pretium mi. Morbi varius, tellus in accumsan blandit, elit ligula eleifend velit, luctus mattis ante nulla condimentum nulla.
              </p>
            </details>
          </div>
          <div class="relative accordion-item mb-5">
            <details>
              <summary class="flex justify-between py-5 items-center gap-5 px-[30px]">
                <h4 class="font-bold  text-[14px] xl:text-heading-5">How can I return an item purchased online?
                </h4>
              </summary>
              <p class="text-text content  mt-[30px] ml-[30px]">Nulla non sollicitudin. Morbi sit amet laoreet ipsum, vel pretium mi. Morbi varius, tellus in accumsan blandit, elit ligula eleifend velit, luctus mattis ante nulla condimentum nulla.
              </p>
            </details>
          </div>
          <div class="relative accordion-item mb-5">
            <details>
              <summary class="flex justify-between py-5 items-center gap-5 px-[30px]">
                <h4 class="font-bold  text-[14px] xl:text-heading-5">Can I cancel or change my order?
                </h4>
              </summary>
              <p class="text-text content  mt-[30px] ml-[30px]">Nulla non sollicitudin. Morbi sit amet laoreet ipsum, vel pretium mi. Morbi varius, tellus in accumsan blandit, elit ligula eleifend velit, luctus mattis ante nulla condimentum nulla.
              </p>
            </details>
          </div>
          <div class="relative accordion-item mb-5">
            <details>
              <summary class="flex justify-between py-5 items-center gap-5 px-[30px]">
                <h4 class="font-bold  text-[14px] xl:text-heading-5">I have promotional or discount code?
                </h4>
              </summary>
              <p class="text-text content  mt-[30px] ml-[30px]">Nulla non sollicitudin. Morbi sit amet laoreet ipsum, vel pretium mi. Morbi varius, tellus in accumsan blandit, elit ligula eleifend velit, luctus mattis ante nulla condimentum nulla.
              </p>
            </details>
          </div>
          <div class="relative accordion-item mb-5">
            <details>
              <summary class="flex justify-between py-5 items-center gap-5 px-[30px]">
                <h4 class="font-bold  text-[14px] xl:text-heading-5">What are the delivery types you use?
                </h4>
              </summary>
              <p class="text-text content  mt-[30px] ml-[30px]">Nulla non sollicitudin. Morbi sit amet laoreet ipsum, vel pretium mi. Morbi varius, tellus in accumsan blandit, elit ligula eleifend velit, luctus mattis ante nulla condimentum nulla.
              </p>
            </details>
          </div>
          <div class="relative accordion-item mb-5">
            <details>
              <summary class="flex justify-between py-5 items-center gap-5 px-[30px]">
                <h4 class="font-bold  text-[14px] xl:text-heading-5">How can I pay for my purchases?
                </h4>
              </summary>
              <p class="text-text content  mt-[30px] ml-[30px]">Nulla non sollicitudin. Morbi sit amet laoreet ipsum, vel pretium mi. Morbi varius, tellus in accumsan blandit, elit ligula eleifend velit, luctus mattis ante nulla condimentum nulla.
              </p>
            </details>
          </div>
          <div class="relative accordion-item mb-5">
            <details>
              <summary class="flex justify-between py-5 items-center gap-5 px-[30px]">
                <h4 class="font-bold  text-[14px] xl:text-heading-5">Can I cancel my order?
                </h4>
              </summary>
              <p class="text-text content  mt-[30px] ml-[30px]">Nulla non sollicitudin. Morbi sit amet laoreet ipsum, vel pretium mi. Morbi varius, tellus in accumsan blandit, elit ligula eleifend velit, luctus mattis ante nulla condimentum nulla.
              </p>
            </details>
          </div>
        </div>
      </div>
     
  
    </div>
@endsection