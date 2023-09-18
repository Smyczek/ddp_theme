@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (! have_posts())
  <div class="container">
    <x-alert type="warning" class="rounded p-4 text-lg">
      {!! __('Sorry, but the page you are trying to view does not exist.', 'sage') !!}
    </x-alert>
    {!! get_search_form(false) !!}
  </div>
  @endif
@endsection
