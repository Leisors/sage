@extends('layouts.app')

@section('content')

<section class="four-zero-four">
  <h1 class="four-zero-four__title">{{ __('Nothing to see here!') }}</h1>
  <a href="{{ home_url('/') }}" class="button">Go back home</a>
</section>

@endsection
