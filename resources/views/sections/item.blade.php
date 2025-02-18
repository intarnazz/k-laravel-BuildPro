<style>
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
    <img src="http://localhost:8000/api/image/{{ $catalog['image']['id'] }}" alt="{{ $catalog['name'] }}">
    <div class="box-y gap">
      <h1>{{$catalog['name']}}</h1>
      <ul class="box-y gap">
        <li class="box-x gap ai">
          <p>описание</p>
          <p>{{$catalog['description']}}</p>
        </li>
        <li class="box-x gap ai">
          <p>тип</p>
          <p>{{$catalog['type']}}</p>
        </li>
        <li class="box-x gap ai">
          <p>просмотры</p>
          <p>{{$catalog['views']}}</p>
        </li>
        <li class="box-x gap ai">
          <p>цена</p>
          <p>{{$catalog['price']}}</p>
        </li>
      </ul>
    </div>
  </div>

</section>


<script>

</script>



