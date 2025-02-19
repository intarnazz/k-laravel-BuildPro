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

  .text {
    overflow: hidden;
    text-overflow: ellipsis;
    max-height: 3rem;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }


</style>

<section class="catalog relative box-y gap">
  <div class="box-x gap">
    @if(isset($order))
      @include('components.button.orderBy', ['key'=>'views', 'value'=>'По популярности'])
      @if(Request::is('catalog'))
        @include('components.button.orderBy', ['key'=>'price', 'value'=>'По цене'])
      @endif
      @include('components.button.orderBy', ['key'=>'type', 'value'=>'По типу'])
    @endif
    <div class="flex"></div>
  </div>
  @if($catalog)
    <div class="catalog__content box-x gap">
      @foreach($catalog as $value)
        @if(!isset($portfolio))
          <a href="{{ route('item', ['catalog'=> $value['id']]) }}" class="catalog__item box-y gap">
            @else
              <a href="{{ route('portfolio-item', ['portfolio'=> $value['id']]) }}"
                 class="catalog__item box-y gap">
                @endif
                <div class="box-x">
                  <h3>{{ $value['name'] }}</h3>
                  @if(!isset($portfolio))
                    <p class="price">{{ $value['price'] }}</p>
                  @endif
                </div>
                <div class="img__wrapper flex center">
                  <img src="{{ route('image', ['image'=>$value['image_id']]) }}"
                       alt="{{ $value['name'] }}">
                </div>
                <p class="text">{{ $value['description'] }}</p>
              </a>
          @endforeach
    </div>
@endif
