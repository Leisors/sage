<!doctype html>
<html {!! get_language_attributes() !!}>

  @include('partials.head')
  
  <body @php body_class() @endphp>
    @include('partials.gtm-body')

    @php do_action('get_header') @endphp
    @include('partials.header')

    <div class="wrap container" data-barba="wrapper" role="document">

      <div class="content" data-barba="container" data-barba-namespace="{{ App::slug() }}">

        <main class="main">
          @yield('content')
        </main>

        @if (App\display_sidebar())
          <aside class="sidebar">
            @include('partials.sidebar')
          </aside>
        @endif

      </div>
    </div>

    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
    
  </body>
</html>
