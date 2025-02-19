<style>
  main,
  .img__wrapper,
  .form__wrapper {
    height: 100%;
  }

  img {
    height: 100%;
    width: 100%;
  }

  .main__wrapper {
    padding: 0 1rem;
  }

  input {
    background-color: #333333;
    color: #fff;
    padding: .1rem;
  }

  form {
    width: 500px;
  }

  .title {
    font-size: 3rem;
    position: absolute;
    padding: 1rem 2rem;
    color: #fff;
  }
</style>

<div class="form__wrapper flex box-x">
  <div class="flex main__wrapper">
    <div class="center">
      <div class="box-y gap">
        <div class="box-x gap">
          @include('components.logo')
          @include('components.button.back')
          @if(Request::is('registration'))
            <a class="a"
               href="{{ route('login') }}">Войти</a>
          @else
            <a class="a"
               href="{{ route('register') }}">Зарегистрироваться</a>
          @endif
          <div class="flex"></div>
        </div>
        <div class="box-y">
          {{ $slot }}
        </div>
      </div>
    </div>
  </div>
</div>

