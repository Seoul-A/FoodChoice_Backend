@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#f7f7f7] py-8 px-4">

    <div class="max-w-5xl mx-auto bg-white rounded-[28px] overflow-hidden shadow-[0_10px_40px_rgba(0,0,0,0.06)] grid lg:grid-cols-2">

        {{-- LEFT --}}
        <div
            class="hidden lg:flex flex-col justify-center text-center text-white"
            style="
                background:
                linear-gradient(
                    rgba(177,92,74,.82),
                    rgba(177,92,74,.88)
                ),
                url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=1974');

                background-size:cover;
                background-position:center;
            "
        >
            <div class="px-10">

                <h1 class="text-4xl font-semibold">
                    Food Choice
                </h1>

                <p class="mt-3 text-white/80">
                    Tambahkan data makanan untuk sistem rekomendasi.
                </p>

            </div>
        </div>

        {{-- RIGHT --}}
        <div class="p-8">

            <div class="mb-8">

                <p class="text-[#b15c4a] text-sm font-semibold uppercase tracking-[2px] mb-2">
                    Admin Panel
                </p>

                <h2 class="text-3xl font-bold text-gray-800">
                    Tambah Makanan
                </h2>

            </div>

            <form id="foodForm" class="space-y-5">

                {{-- Nama --}}
                <div>
                    <label class="font-medium text-sm block mb-2">
                        Nama Makanan
                    </label>

                    <input
                        type="text"
                        id="name"
                        class="w-full h-12 border border-gray-200 rounded-2xl px-5 bg-[#fafafa]"
                        placeholder="Masukkan nama makanan"
                    >
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label class="font-medium text-sm block mb-2">
                        Deskripsi
                    </label>

                    <textarea
                        id="description"
                        rows="4"
                        class="w-full border border-gray-200 rounded-2xl p-5 bg-[#fafafa]"
                        placeholder="Masukkan deskripsi"
                    ></textarea>
                </div>

                {{-- TAGS --}}
                <div id="tagsContainer"></div>

                {{-- BUTTON --}}
                <button
                    type="submit"
                    class="w-full h-12 rounded-2xl bg-[#b15c4a] hover:bg-[#9f4f3e] text-white font-semibold transition"
                >
                    Simpan Makanan
                </button>

            </form>

            <div id="message" class="mt-5 text-center text-sm"></div>

        </div>

    </div>

</div>

<script>

const token = localStorage.getItem('token');
const tagsContainer = document.getElementById('tagsContainer');

async function loadTags() {

    try {

        const response = await fetch('/api/tags', {
            headers: {
                'Authorization': 'Bearer ' + token,
                'Accept': 'application/json'
            }
        });

        const tags = await response.json();

        const grouped = {};

        tags.forEach(tag => {

            if(!grouped[tag.type]) {
                grouped[tag.type] = [];
            }

            grouped[tag.type].push(tag);
        });

        let html = '';

        Object.keys(grouped).forEach(type => {

            html += `
                <div class="mb-5">
                    <label class="block mb-3 font-semibold capitalize">
                        ${type.replace('_', ' ')}
                    </label>

                    <div class="flex flex-wrap gap-3">
            `;

            grouped[type].forEach(tag => {

                html += `
                    <label class="cursor-pointer">
                        <input
                            type="checkbox"
                            class="hidden peer tag-checkbox"
                            value="${tag.id}"
                        >

                        <div class="
                            px-5 py-2 rounded-full
                            bg-gray-100
                            peer-checked:bg-[#b15c4a]
                            peer-checked:text-white
                            transition
                        ">
                            ${tag.name}
                        </div>
                    </label>
                `;
            });

            html += `</div></div>`;
        });

        tagsContainer.innerHTML = html;

    } catch (error) {
        console.log(error);
    }
}

loadTags();

document.getElementById('foodForm')
.addEventListener('submit', async function(e){

    e.preventDefault();

    const name =
        document.getElementById('name').value;

    const description =
        document.getElementById('description').value;

    const tag_ids = [
        ...document.querySelectorAll(
            '.tag-checkbox:checked'
        )
    ].map(el => parseInt(el.value));

    const image_url =
        name.toLowerCase() + '.svg';

    const response = await fetch(
        '/api/admin/foods',
        {
            method: 'POST',

            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + token,
                'Accept': 'application/json'
            },

            body: JSON.stringify({
                name,
                description,
                image_url,
                is_available: true,
                tag_ids
            })
        }
    );

    const data = await response.json();

    const message =
        document.getElementById('message');

    if(response.ok){

        message.innerHTML =
            '<span class="text-green-500">Makanan berhasil ditambahkan</span>';

        document.getElementById('foodForm')
            .reset();

    } else {

        message.innerHTML =
            '<span class="text-red-500">'
            + (data.message || 'Gagal')
            + '</span>';
    }
});

</script>

@endsection