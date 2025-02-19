@component('layout.app')
  @include('layout.header.main')
  @component('layout.main')
    @component('layout.wrapper')
      @include('sections.catalog', ['portfolio'=>true])
      @include('sections.pagin')
    @endcomponent
  @endcomponent
  @include('layout.footer.main')
@endcomponent
