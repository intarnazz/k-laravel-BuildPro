<style>
  .welcome__title {
    font-size: 2rem;
    background-color: #fff;
    padding: .5rem 1rem;
  }
</style>

@component('layout.app')
  @include('layout.header.main')
  @component('layout.main')
    @component('layout.wrapper')
      @include('sections.welcome')
      <div class="box-y gap2">
        <div class="box-y ai gap">
          <div class="box-x">
            <h2 class="welcome__title">
              <a href="{{ route('catalog') }}">
                Каталог
              </a>
            </h2>
          </div>
          @include('sections.catalog', ['catalog'=>$catalogs[0]])
        </div>
        <div class="box-y ai gap">
          <div class="box-x">
            <h2 class="welcome__title">
              <a href="{{ route('portfolio') }}">
                Портфолио
              </a>
            </h2>
          </div>
          @include('sections.catalog', ['portfolio'=>true, 'catalog'=>$catalogs[1]])
        </div>
      </div>
    @endcomponent
  @endcomponent
  @include('layout.footer.main')
@endcomponent

