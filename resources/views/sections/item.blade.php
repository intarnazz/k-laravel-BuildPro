<style>
  .item {
    color: #fff;
  }

  .item__info {
    align-items: start;

    img {
      max-width: 500px;
      max-height: 753px;

    }
  }
</style>


<section class="item">
  <div class="box-x flex item__info gap2">
    <img src="http://localhost:8000/api/image/{{ $item['image']['id'] }}" alt="{{ $item['name'] }}">
    <div class="box-y gap">
      <div class="box-x">
        <h1>{{ $item['name'] }}</h1>
        @include('components.button.back')
      </div>
      <ul class="box-y gap">
        <li class="box-x gap ai">
          <p>описание</p>
          <p>{{$item['description']}}</p>
        </li>
        <li class="box-x gap ai">
          <p>тип</p>
          <p>{{$item['type']}}</p>
        </li>
        <li class="box-x gap ai">
          <p>просмотры</p>
          <p>{{$item['views']}}</p>
        </li>
        @if(isset($item['price']))
          <li class="box-x gap ai">
            <p>цена</p>
            <p>{{$item['price']}}</p>
          </li>
        @endif

      </ul>
    </div>
  </div>
</section>

<script>

</script>



