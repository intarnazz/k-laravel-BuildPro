@component('layout.app')
  @include('layout.header.main')
  @component('layout.main')
    @component('layout.wrapper')
      @include('sections.item')
      @if(isset($catalog))
        @include('sections.catalog', ['portfolio'=>true])
      @endif
    @endcomponent
  @endcomponent
  @include('layout.footer.main')
@endcomponent

