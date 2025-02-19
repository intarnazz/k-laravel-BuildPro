@component('layout.app')
  @include('layout.header.main')
  @component('layout.main')
    @component('layout.wrapper')
      @include('sections.welcome')
      @include('sections.catalog')
    @endcomponent
  @endcomponent
  @include('layout.footer.main')
@endcomponent

