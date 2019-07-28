@extends('layouts.app')

@section('content')
  @include('partials.pages.front-page.landing')

  @while (have_posts()) @php the_post() @endphp
    @php the_content() @endphp
  @endwhile

@endsection
