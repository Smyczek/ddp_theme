<div class="bg-white rounded-[30px]">
    <div class="rounded-t-[30px] rounded-r-[30-px] text-white px-7 pt-5 pb-2 lg:min-h-[155px] flex flex-col" style="background-color: {!! $bgColor !!}">
        @if($heading)
        <h3 class="font-bold text-white text-3xl lg:text-2xl xl:text-[26px]">{!! $heading !!}</h3>
        @endif 
        <div class="text-[47px] left-0 top-0 mt-auto">
            <span style="text-white text-5xl font-normal">
                @if($price)
                    {!! $price !!}
                @endif
            </span>
            <div class="relative inline-block">
                <sup class="text-white opacity-80 text-3xl font-normal relative">
                    @if($oldPrice)
                        {!! $oldPrice !!}
                    @endif
                </sup>
                <span class="w-full h-px left-0 top-[32px] absolute origin-top-left rotate-[-11.18deg] border border-[#FF0000]"></span>
            </div>
        </div>
    </div>
    <div class="p-7 prose package-description">
    @if($description)
        {!! $description !!}
    @endif
    </div>
</div>