@php
    ($lts = get_field('lets_talk_section'))
@endphp
@if($lts==1)
@php $asset_url = \Roots\asset('images/quote-bg.jpg'); @endphp
<section class="bg-no-repeat bg-contain bg-center pt-6 lg:pt-10 pb-10 lg:pb-16" style="background-image: url({!! $asset_url !!});">
  <div class="container text-center">
    <h2 class="text-5xl md:text-6xl mb-11 text-dark">Get <span class="text-primary font-bold">Your Instant Quote</span> Today!</h2>  
    <x-button_link type="default" url="{{ get_permalink( get_page_by_path( 'quote' ) ) }}">
      {!! __("Let's Talk", 'sage') !!}
    </x-button_link>
  </div>
</section>
@endif
<footer class="content-info mt-8 mb-12">
  <div class="container text-center">
    <p class="text-primary text-4xl lg:text-[45px] mb-6">
      @php $fb_link = get_theme_mod('ddp_facebook_link') @endphp
      @if($fb_link)
        <a class="mx-3 duration-200 hover:text-secondary" href="{!! esc_url($fb_link) !!}"><i class="fa-brands fa-square-facebook"></i></a>
      @endif
      @php $insta_link = get_theme_mod('ddp_insta_link') @endphp
      @if($insta_link)
        <a class="mx-3 duration-200 hover:text-secondary" href="{!! esc_url($insta_link) !!}"><i class="fa-brands fa-instagram"></i></a>
      @endif
      @php $linkedin_link = get_theme_mod('ddp_linkedin_link') @endphp
      @if($linkedin_link)
        <a class="mx-3 duration-200 hover:text-secondary" href="{!! esc_url($linkedin_link) !!}"><i class="fa-brands fa-linkedin"></i></a>
      @endif
    </p>
    <p class="text-xl xl:text-2xl">Domingue's Design Photography</p>
    <p class="text-xl xl:text-2xl">400 Hutchison St.</p>
    <p class="text-xl xl:text-2xl">Rayne, Louisiana 70578</p>
    @php $ddp_phone = get_theme_mod('ddp_phone_link', '(337) 223-1555') @endphp
    @if($ddp_phone)
      <p class="text-primary font-extrabold text-4xl lg:text-[45px] my-3">{!! esc_html($ddp_phone) !!}</p>
    @endif
    <p class="text-xl xl:text-2xl">Ej Domingue Jr | Pro Photographer | Videographer</p>
  </div>
</footer>

