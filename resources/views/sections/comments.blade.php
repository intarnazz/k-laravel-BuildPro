<style>
  .comments__item,
  form input {
    background-color: #fff;
    padding: .5rem 1rem;
  }

  form input {
    border-radius: 5px;
  }
</style>


<section class="comments box-y gap2">
  <div class="box-x">
    <h2 class="h2">Комментари</h2>
  </div>

  <form id="form" class="box-x gap user">
    <input id="form-text" class="flex" placeholder="Написать комментарий..." type="text">
    <button id="submit-button" class="button" type="submit" disabled>Отправить</button>
  </form>

  <ul class="gap2 box-y ai">
    @foreach($item['comment'] as $value)
      <li class="box-x gap comments__item">
        <img src="{{ route('image', ['image'=>$value['user']['image_id']]) }}" alt="{{ $value['user']['login'] }}"
             class="ava">
        <div class="box-y gap ai">
          <h3>{{$value['user']['login']}}</h3>
          <p>{{ $value['text'] }}</p>
        </div>
      </li>
    @endforeach
  </ul>

</section>

<script type="module">
  import {AddComment} from '{{ asset('assets/js/api/api.js') }}'

  document.addEventListener("DOMContentLoaded", function () {
    const textInput = document.getElementById("form-text");
    const submitButton = document.getElementById("submit-button");

    textInput.addEventListener("input", function () {
      submitButton.disabled = textInput.value.trim().length === 0;
    });
  });

  document.getElementById('form').addEventListener('submit', async (e) => {
    e.preventDefault()
    const res = await AddComment({
      'user_id': window.user.id,
      'catalog_id': '{{ $item['id'] }}',
      'text': document.getElementById('form-text').value,
    })
    if (res.success) {
      window.location.reload()
    }

  })
</script>



