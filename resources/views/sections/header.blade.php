@php
    $bg = is_front_page() ? '' : 'bg-black';
@endphp
<header class="banner z-50 relative after:w-full after:absolute after:block after:h-[125px] xl:after:h-[190px] after:z-10 after:bg-gradient-to-b from-black to-transparent after:top-0 after:left-0 after:right-0 after:opacity-50 overflow-hidden {!! $bg !!}">
  <div class="container flex py-4 relative z-20">
    <div class="w-[125px] xl:w-[205px] mr-auto">
    {!! the_custom_logo() !!}
    </div>
  
    @if (has_nav_menu('primary_navigation'))
    <div class="block xl:hidden">
      <button type="button" 
        class="flex items-center px-3 py-2 border rounded text-white border-white hover:text-secondary hover:border-secondary" 
        data-te-offcanvas-toggle
        data-te-target="#offcanvasMenu"
        aria-controls="offcanvasMenu"
        data-te-ripple-init
        data-te-ripple-color="light">
        <svg class="fill-current h-5 w-5" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
      </button>
    </div>
    <div class="text-white pt-4 text-xl hidden xl:block xl:pt-8">
      @include('partials.navigation')
    </div>
    @endif
  </div>
  @php $hbg = get_field('header_background_image') @endphp
  @if(!is_front_page())
    @if ($hbg)
    <div class="absolute left-0 top-0 right-0 w-full h-full opacity-50 bg-cover bg-no-repeat bg-center" style="background-image: url({!! esc_url($hbg['url']) !!});"></div>
    @else
    <div class="absolute left-0 top-0 right-0 w-full h-full opacity-50 bg-cover bg-no-repeat bg-center" style="background-image: url(@asset('../images/about-header-image.png'));"></div>
    @endif
  @endif
</header>
@if (has_nav_menu('primary_navigation'))
<div
  class="invisible fixed bottom-0 right-0 top-0 z-[1045] flex w-96 max-w-full translate-x-full flex-col border-none bg-clip-padding text-neutral-700 shadow-sm outline-none transition duration-300 ease-in-out bg-secondary [&[data-te-offcanvas-show]]:transform-none"
  tabindex="-1"
  id="offcanvasMenu"
  aria-labelledby="offcanvasMenuLabel"
  data-te-offcanvas-init>
  <div class="flex items-center justify-between p-4">
    <button
      type="button"
      class="box-content text-white rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
      data-te-offcanvas-dismiss>
      <span
        class="w-[1em] focus:opacity-100 disabled:pointer-events-none disabled:select-none disabled:opacity-25 [&.disabled]:pointer-events-none [&.disabled]:select-none [&.disabled]:opacity-25">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="h-6 w-6">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M6 18L18 6M6 6l12 12" />
        </svg>
      </span>
    </button>
  </div>
  <div class="flex-grow overflow-y-auto p-4">
    <div class="text-white text-xl">
      @include('partials.navigation')
    </div>
  </div>
</div>
@endif
