@component('layout.app')
  @include('layout.header.main')
  @component('layout.main')
    @component('layout.wrapper')
      @include('sections.item')
      @if(isset($catalog))
        <div class="box-y gap ai">
          <h2 class="h2">Похожие работы</h2>
          @include('sections.catalog', ['portfolio'=>true])
          <div class=""></div>
          @include('sections.comments')
        </div>
      @endif
    @endcomponent
  @endcomponent
  @include('layout.footer.main')
@endcomponent

