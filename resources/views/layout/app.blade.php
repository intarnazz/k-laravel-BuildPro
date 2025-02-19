<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BuildPro</title>
  <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/normalise.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
</head>
<script type="module">
  import {GetUser} from '{{ asset('assets/js/api/api.js') }}'
  import {user, setUser} from '{{ asset('assets/js/user/user.js') }}'

  window.user = user()

  async function init() {
    const res = await GetUser()
    if (res.success) {
      window.user = res.data
      setUser(res.data)
      console.log('setUser(res.data)')
    }
  }

  init()
</script>
<script type="module">
</script>

<style>

</style>
<body id="app">
{{ $slot }}
</body>
</html>

<script type="module">
  import {title, price} from '{{ asset('assets/js/utilte/utilte.js') }}'

  import {logout} from '{{ asset('assets/js/user/user.js') }}'

  document.addEventListener('click', (event) => {
    const id = event.target.id;
    if (id === 'logout') {
      logout();
    }
  });
  document.querySelectorAll(".price").forEach(e => {
    e.innerHTML = `${price(+e.innerHTML)}`;
  });
  if (window.user) {
    document.querySelectorAll(".user").forEach(e => {
      e.style.display = "flex";
    });
  }
</script>
