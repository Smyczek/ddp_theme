@php 
  $quote_page = get_field('quote_page');
@endphp

<div class="container pt-16">
  <div class="prose mb-12">
    {!! $quote_page['text']!!}
  </div>
  <h2 class="text-5xl md:text-6xl mb-11 text-dark text-center mt-10">Get <span class="text-primary font-bold">Your Instant Quote</span> Today!</h2>  
</div>

<section id="quote-form-section">
  <div class="container">
      @include('forms.quote-form')
  </div>
</div>

<div class="container">
@php(the_content())
</div>

{!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
