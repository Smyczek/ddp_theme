<div class="container mb-6 xl:mb-10 flex">
    @if ($imageIcon)
    <div class="border border-primary rounded-full w-[54px] h-[54px] lg:w-[74px] lg:h-[74px] shrink-0 flex justify-center items-center mr-4 xl:mr-10 bg-white">
        <figure class="w-3/5 h-3/5">{!! $imageIcon !!}</figure>
    </div>
    @endif
    @if ($title)
        <h2 class="font-extrabold text-3xl sm:text-4xl xl:text-5xl text-primary mt-2 lg:mt-2.5 xl:mt-3">{!! $title !!}</h2>
    @endif
</div>