<script>

const token = localStorage.getItem('token');

document.querySelectorAll('.tag-btn').forEach(btn => {

    btn.addEventListener('click', () => {

        btn.classList.toggle('active');

    });

});

document
.getElementById('image')
.addEventListener('change', function(){

    document.getElementById('fileName').textContent =
        this.files.length
        ? this.files[0].name
        : 'Belum ada file yang dipilih';

});

document
.querySelector('.reset-btn')
.addEventListener('click', function(){

    setTimeout(() => {

        document
        .querySelectorAll('.tag-btn')
        .forEach(btn => {

            btn.classList.remove('active');

        });

        document.getElementById('fileName').textContent =
            'Belum ada file yang dipilih';

        document.getElementById('image').value = '';

    }, 0);

});

document
.getElementById('foodForm')
.addEventListener('submit', async function(e){

    e.preventDefault();

    const name =
        document.getElementById('name').value.trim();

    if(name === ''){

        alert('Nama makanan wajib diisi');
        return;

    }

    const selectedTags = [];

    document
    .querySelectorAll('.tag-btn.active')
    .forEach(btn => {

        selectedTags.push(
            btn.innerText.trim()
        );

    });

    if(selectedTags.length === 0){

        alert('Pilih minimal 1 tag');
        return;

    }

    try{

        const tagsResponse =
            await fetch('/api/tags', {

                headers:{
                    'Authorization':'Bearer ' + token,
                    'Accept':'application/json'
                }

            });

        const tags =
            await tagsResponse.json();

        const tags_ids =
            tags
            .filter(tag =>
                selectedTags.some(
                    selected =>
                        selected.toLowerCase() ===
                        tag.name.toLowerCase()
                )
            )
            .map(tag => tag.id);

        const response =
            await fetch('/api/admin/foods', {

                method:'POST',

                headers:{
                    'Content-Type':'application/json',
                    'Authorization':'Bearer ' + token,
                    'Accept':'application/json'
                },

                body:JSON.stringify({

                    name:name,
                    description:null,
                    image_url:null,
                    is_available:true,
                    tags_ids:tags_ids

                })

            });

        const data =
            await response.json();

        if(response.ok){

            alert(data.message);

            document
            .getElementById('foodForm')
            .reset();

            document
            .querySelectorAll('.tag-btn')
            .forEach(btn => {

                btn.classList.remove('active');

            });

            document
            .getElementById('fileName')
            .textContent =
                'Belum ada file yang dipilih';

            document
            .getElementById('image')
            .value = '';

        }else{

            alert(
                data.message ||
                'Gagal menambahkan makanan'
            );

        }

    }catch(error){

        console.log(error);

        alert('Terjadi kesalahan');

    }

});

</script>