<style>
</style>


<a
  href="{{ route('catalog', ['page'=>1, 'order'=>$key, 'direction' => $order==$key && $direction=='desc' ? 'asc': 'desc']) }}"
  class="button box-x gap {{ $order==$key ? 'button__active' : '' }}  ">
  {{ $value }}
  @if($order==$key)
    @if($direction=='desc')
      @include('components.svg.down')
    @elseif($direction=='asc')
      @include('components.svg.up')
    @endif
  @endif
</a>

<script>

</script>



