@component('layout.app')
  <script type="module" defer>
    document.body.style.display = "none";
    import {token} from '{{ asset('assets/js/user/user.js') }}'

    if (!token()) {
      window.location.href = "{{ route('login') }}"
    } else {
      document.body.style.display = "flex";
    }
  </script>
  @include('layout.header.main')
  @component('layout.main')
    @component('layout.wrapper')
      @include('sections.profile')
    @endcomponent
  @endcomponent
  @include('layout.footer.main')
@endcomponent
