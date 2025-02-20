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
          <p>Описание</p>
          <p>{{$item['description']}}</p>
        </li>
        <li class="box-x gap ai">
          <p>Тип</p>
          <p>{{$item['type']}}</p>
        </li>
        <li class="box-x gap ai">
          <p>Просмотры</p>
          <p>{{$item['views']}}</p>
        </li>
        @if(isset($item['price']))
          <li class="box-x gap ai">
            <p>Цена</p>
            <p>{{$item['price']}}</p>
          </li>
        @endif
        <li class="box-x gap ai">
          <p>Сроки работы</p>
          <p>{{ $item['time_value'] }} {{ $item['time_unit'] }}</p>
        </li>
        @if(isset($item['price']))
          <li class="user box-x gap ai">
            <button class="button deleteApplication">Заказать</button>
          </li>
        @endif
      </ul>
    </div>
  </div>
</section>

<script type="module">
  import {AddApplication} from "{{ asset('assets/js/api/api.js') }}"

  document.getElementById('deleteApplication').addEventListener('click', async () => {
    const res = await AddApplication({catalog_id: "{{ $item['id'] }}"})
    if (res.success) {
      window.location.reload()
    }
  })
</script>



