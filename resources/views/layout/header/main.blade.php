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
</script>




