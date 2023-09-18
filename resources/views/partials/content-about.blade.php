@php 
  $about_us = get_field('about_us');
@endphp

<section class="pt-10">
  @if ($about_us && $about_us['title'])
    <x-section-title :title="$about_us['title']" :image-id="$about_us['title_icon']"/>
  @endif

  <div class="container flex flex-col lg:flex-row">
      <div class="text-lg prose">
          @if ($about_us && $about_us['text'])
              {!! $about_us['text']!!}
          @endif
      </div>
      <div class="lg:pl-16 pb-20 mx-auto lg:mt-[-100px] lg:min-w-[420px] max-w-[420px] text-center">
          @if ($about_us && $about_us['about_image'])
          <img src="{!! $about_us['about_image']['url'] !!}" alt="">
          @endif
          @if ($about_us && $about_us['discount_text'])
          <div class="bg-primary text-center rounded-lg py-4 px-6 text-[33px] leading-[110%] text-[#E2EFF7] [&>strong]:text-white">
              {!! $about_us['discount_text'] !!}
          </div>
          @endif
      </div>
  </div>
</section>

<section class="bg-gray pb-8 pt-10">
  @php
    $packages = get_field('ddp_packages');
  @endphp
  @if($packages['title'])
    <x-section-title :title="$packages['title']" :image-id="$packages['icon']"/>
  @endif
  <div class="container">
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
          @php 
            foreach ($packages as $key => $package):
              if (strpos($key, "package-") === 0):
                @endphp
                <x-package heading="{!! $package['heading'] !!}" bg-color="{!! $package['bg-color'] !!}" price="{!! $package['price'] !!}" old-price="{!! $package['old-price'] !!}" description="{!! $package['description'] !!}" />
                @php
              endif;
            endforeach;
          @endphp
      </div>
  </div>
</section>

<section class="my-16">
  <div class="container">
      <h2 class="font-extrabold text-3xl sm:text-4xl xl:text-5xl text-primary mt-2 lg:mt-2.5 xl:mt-3 text-center mb-10">Q&A</h2>
      <div id="ddp-accordion">
        <div class="bg-white max-w-[850px] mx-auto">
        @php 
          $qas = get_field('q&a');
          $id = 1;
          foreach ($qas as $key => $qa):
            if($qa):
              @endphp
                <x-question-answer question="{!! $qa['question'] !!}" answer="{!! $qa['answer'] !!}" id="{!! $id !!}" />
              @php
              $id++;
            endif;
          endforeach;
        @endphp
        </div>
      </div>
  </div>
<section>

<div class="container">
@php(the_content())
</div>

{!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
