@php 
  $real_estate_page = get_field('real_estate_page');
@endphp

<section class="pt-10">
  @if ($real_estate_page && $real_estate_page['title'])
    <x-section-title :title="$real_estate_page['title']" :image-id="$real_estate_page['title_icon']"/>
  @endif
</section>

<section class="bg-gray pb-8 pt-10">
  @php
    $packages = get_field('ddp_packages');
  @endphp
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

<div class="container text-center font-bold py-14 text-2xl">
  {!! $real_estate_page['text_blow'] !!}
</div>


<div class="container">
@php(the_content())
</div>

{!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
