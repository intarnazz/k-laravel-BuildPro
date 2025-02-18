<style>
</style>

<form id="form" class="box-y gap">
  <div class="box-x gap">
    <p class="box-y gap">
      <label for="login">login</label>
      <label for="password">password</label>
    </p>
    <p class="box-y flex gap">
      <input class="flex" type="text" name="login" id="login">
      <input class="flex" type="password" name="password" id="password">
    </p>
  </div>
  <button class="button" type="submit">Зарегистрироваться</button>
</form>

<script type="module">
  import {reg} from '{{ asset('assets/js/api/api.js') }}'

  document.getElementById('form').addEventListener('submit', async (e) => {
    e.preventDefault()
    const login = document.getElementById('login').value
    const password = document.getElementById('password').value
    const res = await reg({
      login: login,
      password: password,
    })
    if (res.success) {
      window.location.pathname = '/profile'
    }
  })

</script>
