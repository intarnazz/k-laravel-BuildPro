<style>
  .header {
    padding: 1rem;
    border-bottom: 1px rgba(0, 0, 0, 0.1) solid;
    background-color: #121921;
    color: #fff;
  }

  .header a {
    color: #fff;
  }
</style>

<header id="header" class="header box-x">
  <div class="box-x gap">
    @include('components.logo')
  </div>

  <nav>
    <ul class="box-x gap2">
      <li>
        <a href="{{ route('portfolio') }}">
          Портфолио
        </a>
      </li>
      <li>
        <a href="{{ route('catalog') }}">
          Каталог
        </a>
      </li>
      |
      <li>
        <ul id="header-user" class="box-x gap">
          <li>
            <a href="{{ route('login') }}">
              Войти
            </a>
          </li>
          <li>
            <a href="{{ route('register') }}">
              Регистрация
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
</header>

<script type="module">
  import {user} from '{{ asset('assets/js/user/user.js') }}'

  window.user = user()
  const defaultImage = "{{ asset('assets/img/anon.jpg') }}"


  function headerUserInit() {
    if (window.user) {
      console.log(window.user)
      const headerUser = document.getElementById('header-user')
      headerUser.innerHTML = `
  <li>
    <a href="{{ route('profile') }}">
      <div class="box-x gap">
        <p>${window.user.login}</p>
        ${window.user.image_id ?
        `<img class="ava" src="http://localhost:8000/api/image/${window.user.image_id}" alt="${window.user.login}">`
        :
        `<img class="ava" src="${defaultImage}" alt="${window.user.login}">`
      }
      </div>
    </a>
  </li>
  <li>
    <button id='logout' class='button'>
      Выйти
    </button>
  </li>
`;
    }
  }

  console.log('window.user', window.user)
  headerUserInit()
</script>




