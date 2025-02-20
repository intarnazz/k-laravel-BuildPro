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
  <button class="button" type="submit">войти</button>
</form>

<script type="module">
  import {log} from '{{ asset('assets/js/api/api.js') }}'

  console.log('login')
  document.getElementById('form').addEventListener('submit', async (e) => {
    e.preventDefault()
    const login = document.getElementById('login').value
    const password = document.getElementById('password').value
    const res = await log({
      login: login,
      password: password,
    })
    if (res.success) {
      window.location.href = '{{ route('home') }}'
    }
  })

</script>
