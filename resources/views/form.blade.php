@component('layout.app')
  @include('layout.header.main')
  @component('layout.main')
    @include('l')
  @endcomponent
  @include('layout.footer.main')
@endcomponent

