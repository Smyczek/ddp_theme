@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @includeFirst(['partials.content-quote', 'partials.content'])
  @endwhile
@endsection
