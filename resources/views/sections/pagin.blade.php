<style>
  .pagin li a {
    background-color: rgba(0, 0, 0, .4);
    border-radius: 100px;
    width: 50px;
    height: 50px;
    color: #fff
  }
</style>


<ul class="pagin center gap2">
  @php
    $queryParams = request()->query();
    $page = $queryParams['page'] ?? 1;
  @endphp
  @if($page - 2 > 0)
    <li>
      <a href="{{ route('catalog', ['page'=>1, 'order'=>$order]) }}" class="center">
        {{ 1 }}
      </a>
    </li>
  @endif
  @if($page - 1 > 0)
    <li>
      <a href="{{ route('catalog', ['page'=>$page-1, 'order'=>$order]) }}" class="center">
        {{ $page - 1 }}
      </a>
    </li>
  @endif
  <li>
    <a href="{{ route('catalog', ['page'=>$page, 'order'=>$order]) }}" style="background-color: rgba(0, 0, 255, .6);"
       class="center">
      {{ $page }}
    </a>
  </li>
  @if($page * $count < $res['pagingInfo']['totalCount'])
    <li>
      <a href="{{ route('catalog', ['page'=>$page+1, 'order'=>$order]) }}" class="center">
        {{ $page + 1 }}
      </a>
    </li>
  @endif
</ul>


<script>

</script>



