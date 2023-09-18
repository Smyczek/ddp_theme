<div class="bg-white rounded-3xl p-6 lg:p-9 drop-shadow-[0_4px_40px_rgba(0,0,0,0.05)] h-max">
    @if($text)
        <p class="text-[16px] lg:text-[18px] mb-6 lg:mb-9">{!! esc_html($text) !!}</p>
    @endif
    <div class="flex items-center">
        @if ($avatar)
        <div class="rounded-full mr-5">
            <figure class="w-[70px] h-[70px] xl:w-[100px] xl:h-[100px]">{!! $avatar !!}</figure>
        </div>
        @endif
        <div>
            @if($author)
                <h3 class="font-bold text-[16px] xl:text-[19px]">{!! esc_html($author) !!}</h3>
            @endif
            @if($date)
                <p class="text-[12px] xl:text-[16px]">{!! esc_html($date) !!}</p>
            @endif
        </div>
    </div>
</div>
