<style>
  .catalog__content {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
  }

  .catalog__item {
    height: 420px;
    width: 100%;
    max-height: 420px;
    background-color: #fff;
    padding: 1rem;
  }

  .catalog img {
    height: 100%;
    width: 100%;
    position: absolute;
  }

  .img__wrapper {
    height: 100%;
    width: 100%;
    position: relative;
  }
</style>


<section class="catalog relative box-y gap">
  @if(Request::is('catalog'))
    <div class="box-x gap">
      @include('components.button.orderBy', ['key'=>'views', 'value'=>'По популярности'])
      @include('components.button.orderBy', ['key'=>'price', 'value'=>'По цене'])
      @include('components.button.orderBy', ['key'=>'type', 'value'=>'По типу'])
      <div class="flex"></div>
    </div>
  @endif
  @if($catalog)
    <div class="catalog__content box-x gap">
      @foreach($catalog as $value)
        <div class="catalog__item box-y gap ai">
          <h3>{{ $value['name'] }}</h3>
          <div class="img__wrapper flex center">
            <img src="{{ route('image', ['image'=>$value['image_id']]) }}" alt="{{ $value['name'] }}">
          </div>
        </div>
      @endforeach
    </div>
  @endif

</section>



