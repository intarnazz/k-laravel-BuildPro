<style>
  .item__info {
    align-items: start;

    img {
      max-width: 500px;
      max-height: 753px;

    }
  }
</style>

<section id="profile" class="profile">

</section>


<script type="module">
  import {SendImage} from '{{ asset('assets/js/api/api.js') }}'

  const defaultImage = "{{ asset('assets/img/anon.jpg') }}"

  document.getElementById('profile').innerHTML = `
  <div class="box-x flex item__info gap2">
    <div class="ava__wrapper box-y gap">
${window.user.image_id ?
    `<img src="http://localhost:8000/api/image/${window.user.image_id}" alt="${window.user.login}">`
    :
    `<img src="${defaultImage}" alt="${window.user.login}">`
  }


   <input id="file" type="file">
   <button id="saveImage" class="button">
     Сохранить фото
   </button>
 </div>

 <div class="box-y gap">
   <h1> ${window.user.login}  </h1>
    </div>
  </div>
`

  console.log('JS')

  function handleFile() {
    const files = document.getElementById('file');
    const file = files.files[0];
    if (file) {
      const reader = new FileReader();
      console.log(file);
      reader.readAsDataURL(file);
      reader.onloadend = function () {
        console.log('handleFile12');
        SendImage(reader.result);
      };
    } else {
      console.log('No file selected');
    }
  }

  document.addEventListener('click', (event) => {
    const id = event.target.id;
    if (id === 'saveImage') {
      handleFile();
    }
  });
</script>

