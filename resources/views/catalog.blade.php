@component('layout.app')
  @include('layout.header.main')
  @component('layout.main')
    @component('layout.wrapper')
      @include('sections.catalog')
      @include('sections.pagin')
    @endcomponent
  @endcomponent
  @include('layout.footer.main')
@endcomponent

