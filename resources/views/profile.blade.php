<script type="module" defer>
  document.body.style.display = "none";
  import {token} from '{{ asset('assets/js/user/user.js') }}'

  console.log('!token()')
  if (!token()) {
    window.location.href = "{{ route('login') }}"
  } else {
    document.body.style.display = "flex";
  }
</script>

@component('layout.app')
  @include('layout.header.main')
  @component('layout.main')
    @component('layout.wrapper')

      @include('sections.profile')

    @endcomponent
  @endcomponent
  @include('layout.footer.main')
@endcomponent
