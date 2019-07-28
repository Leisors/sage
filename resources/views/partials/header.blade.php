<header class="header">
  <div class="header__container">

    <a class="header__brand" href="{{ home_url('/') }}">Brand</a>

    @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu([
        'theme_location' => 'primary_navigation',
        'menu_class' => 'nav',
        'container_class' => 'header__nav'
      ]) !!}
    @endif

  </div>

  <div class="header__toggle">
    @include('partials.hamburger')
  </div>
</header>
