<section id="{!! esc_attr($sectionId) !!}" class="ddp-pswp-lightbox py-6 md:py-8 lg:py-10 xl:py-14 @if($bgColor===true) bg-gray @endif" data-images="{!! implode(',', $photoGallery) !!}">
    <x-section-title :title="$title" :image-id="$imageId"/>
    <div class="container mb-10">
        <div class="prose">
        @if ($text)
            {!! $text !!}
        @endif
        </div>
    </div>
    <div class="container grid xl:grid-cols-2 gap-4 lg:gap-8">
        <div class="xl:h-[515px] overflow-hidden cursor-pointer">
            @if(array_key_exists(0, $photoGallery)){!! wp_get_attachment_image($photoGallery[0], 'large', '', ['class' => 'min-w-full min-h-full object-cover ddp-open-pswp-lightbox', 'data-img' => '0' ]) !!}@endif
        </div>
        <div class="flex flex-col">
            <div class="grid grid-cols-2 gap-4 lg:gap-8 mb-4">
                @if(array_key_exists(1, $photoGallery))
                    <div class="h-[140px] sm:h-[160px] lg:h-[185px] overflow-hidden cursor-pointer">{!! wp_get_attachment_image($photoGallery[1], 'medium', '', ['class' => 'min-w-full min-h-full object-cover ddp-open-pswp-lightbox', 'data-img' => '1' ]) !!}</div>
                @endif
                @if(array_key_exists(2, $photoGallery))
                    <div class="h-[140px] sm:h-[160px] lg:h-[185px] overflow-hidden cursor-pointer">{!! wp_get_attachment_image($photoGallery[2], 'medium', '', ['class' => 'min-w-full min-h-full object-cover ddp-open-pswp-lightbox', 'data-img' => '2' ]) !!}</div>
                @endif
                @if(array_key_exists(3, $photoGallery))
                    <div class="h-[140px] sm:h-[160px] lg:h-[185px] overflow-hidden cursor-pointer">{!! wp_get_attachment_image($photoGallery[3], 'medium', '', ['class' => 'min-w-full min-h-full object-cover ddp-open-pswp-lightbox', 'data-img' => '3' ]) !!}</div>
                @endif
                @if(array_key_exists(4, $photoGallery))
                    <div class="h-[140px] sm:h-[160px] lg:h-[185px] overflow-hidden cursor-pointer">{!! wp_get_attachment_image($photoGallery[4], 'medium', '', ['class' => 'min-w-full min-h-full object-cover ddp-open-pswp-lightbox', 'data-img' => '4' ]) !!}</div>
                @endif
            </div>
            @if ($btnText)
                <button data-img="0" class="ddp-open-pswp-lightbox btn btn-primary w-full mt-auto text-xl lg:text-2xl py-3 lg:py-5 font-semibold transition duration-300 hover:bg-secondary">
                    {!! $btnText !!}
                </button>
            @endif
        </div>
    </div>
</section>