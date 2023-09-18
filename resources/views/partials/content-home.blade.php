@php $hero_carousel = get_field('hero_carousel') @endphp
@if($hero_carousel)
<swiper-container>
    <div class="swiper h-[500px] md:h-[550px] xl:h-[850px] before:h-[20px] xl:before:h-[50px] before:bg-white before:absolute before:bottom-0 before:left-0 before:right-0 before:brounded-s-3xl before:rounded-t-3xl before:z-10 after:w-full after:absolute after:block after:h-[190px] xl:after:h-[390px] after:z-10 after:bg-gradient-to-b from-black to-transparent after:top-0 after:left-0 after:right-0 after:opacity-50">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @for ($i=1; $i<=5; $i++)
                @if($hero_carousel['slide-'.$i])
                    <div class="swiper-slide bg-black">
                        <div class="opacity-60 bg-cover bg-no-repeat bg-center h-full w-full absolute top-0 bottom-0 left-0 right-0  bg-black" style="background-image: url('{!! esc_url($hero_carousel['slide-'.$i]['slide_image']['url']) !!}')"></div>
                        <div class="container flex flex-col pb-28 xl:pb-48 justify-end relative h-full text-white">
                            <h4 class="text-xl xl:text-3xl tracking-[.25em]">{!! $hero_carousel['slide-'.$i]['before_title'] !!}</h4>
                            <h2 class="font-bold text-6xl xl:text-8xl mb-4 xl:mb-9">{!! $hero_carousel['slide-'.$i]['slide_title'] !!}</h2>
                            <p class="text-lg xl:text-2xl xl:w-1/2 mb-4 xl:mb-8">{!! $hero_carousel['slide-'.$i]['slide_text'] !!}</p>
                        </div>
                    </div>  
                @endif
            @endfor
        </div>
        <div class="container flex items-center absolute bottom-0 left-0 right-0 w-full pb-14 xl:pb-32 z-10">
            <div class="ddp-swiper-pagination hidden lg:block"></div>
            <div class="ddp-swiper-nav flex">
                <div class="ddp-swiper-button-prev border-white w-10 h-10 xl:w-14 xl:h-14 rounded-full flex items-center justify-center border mx-1.5 cursor-pointer hover:scale-110">
                    <svg class="mr-1 scale-75 xl:scale-100" width="15" height="26" viewBox="0 0 15 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="13" y1="2.12132" x2="2.12132" y2="13" stroke="white" stroke-width="3" stroke-linecap="round"/>
                        <line x1="1.5" y1="-1.5" x2="16.8848" y2="-1.5" transform="matrix(-0.707107 -0.707107 -0.707107 0.707107 13 26)" stroke="white" stroke-width="3" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="ddp-swiper-button-next border-white w-10 h-10 xl:w-14 xl:h-14 rounded-full flex items-center justify-center border mx-1.5 cursor-pointer hover:scale-110">
                    <svg class="ml-1 scale-75 xl:scale-100" width="15" height="26" viewBox="0 0 15 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="1.5" y1="-1.5" x2="16.8848" y2="-1.5" transform="matrix(0.707107 0.707107 0.707107 -0.707107 2 0)" stroke="white" stroke-width="3" stroke-linecap="round"/>
                        <line x1="2" y1="23.8787" x2="12.8787" y2="13" stroke="white" stroke-width="3" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</swiper-container>
@endif


@php $home_services = get_field('home_services') @endphp
@if($home_services)
<!-- Section Services  -->
<section>
    @php $service_section_title = get_field('services_section_title') @endphp
    @if ($service_section_title)
        <x-section-title :title="$service_section_title"/>
    @endif
    <div class="container pb-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-3 lg:gap-8">
            @for($i=1; $i<=5; $i++)    
                @if ($home_services['service-'.$i]['icon'] != false xor $home_services['service-'.$i]['text'] != "" xor $home_services['service-'.$i]['title'] != "")
                    <div class="bg-lightblue rounded-xl lg:rounded-3xl p-3 lg:p-6 flex items-center lg:block">
                        @if ($home_services['service-'.$i]['icon'])
                        <div class="rounded-full border bg-white border-primary w-[54px] h-[54px] lg:w-[74px] lg:h-[74px] shrink-0 mr-4 xl:mr-10 lg:mb-5 flex justify-center items-center">
                            <img class="w-3/5 h-3/5" src="{!! $home_services['service-'.$i]['icon']['url'] !!}" alt="Service icon">
                        </div>
                        @endif
                        <div>
                            <h3 class="leading-none lg:leading-6 font-bold text-2xl lg:text-xl text-primary mb-2 xl:mb-4">{!! $home_services['service-'.$i]['title'] !!}</h3>
                            <p class="leading-5 mb-1">{!! $home_services['service-'.$i]['text'] !!}</p>
                        </div>
                    </div>
                @endif
            @endfor
        </div>
    </div>
</section>
<!-- Section Services end  -->
@endif


@php 
    $service_sections = ['aerial','commercial','architectural','realestate','legal'];
    foreach($service_sections as $section):
        $service = get_field($section.'_service');
        $photo_gallery = acf_photo_gallery($section.'_photo_gallery', $post->ID);
        if($service):
            @endphp
            <x-service-section :bg-color="$service['section_bg']" section-id="{!! $service['section_id'] !!}" title="{!! $service['section_title'] !!}" :image-id="$service['title_icon']" btn-text="{!! $service['button_text'] !!}" text="{!! $service['section_text'] !!}" :acf-gallery="$photo_gallery" />
            @php
        endif;
    endforeach;
@endphp


<!-- Testimonials section -->
<section class="bg-gray py-8 lg:py-14 mb-10">
    @php 
        $testimonials_title_icon = get_field('testimonials_title_icon');
        $testimonials_title = get_field('testimonials_title');
    @endphp
    <x-section-title :title="$testimonials_title" :image-id="$testimonials_title_icon"/>
    <div class="container">
        <div class="grid gap-3 lg:gap-9 grid-cols-1 lg:grid-cols-3">
            @php 
                $testimonials = get_field('testimonials') 
            @endphp
            @if($testimonials)
                @for($i=1; $i<=3; $i++)  
                    @if($testimonials['testimonial_'.$i]) 
                        <x-testimonial text="{!! $testimonials['testimonial_'.$i]['text'] !!}" author="{!! $testimonials['testimonial_'.$i]['author'] !!}" date="{!! $testimonials['testimonial_'.$i]['date'] !!}" :image-id="$testimonials['testimonial_'.$i]['avatar']" />
                    @endif
                @endfor
            @endif
        </div>
    </div>
</section>
<!-- Testimonials section end -->

<div class="container">
@php(the_content())
</div>

{!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
