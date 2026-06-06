@extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>

<style>

    .wheel{
        transition:
        transform 6s
        cubic-bezier(
            0.17,
            0.67,
            0.12,
            0.99
        );
    }

    .overlay-blur{
        backdrop-filter:
        blur(6px);
    }

    .food-card{
        transition:
        transform .25s ease,
        box-shadow .25s ease;
    }

    .custom-shadow{
        box-shadow:
        0 8px 25px rgba(
            0,0,0,.08
        );
    }

</style>

<section
    class="
    max-w-7xl
    mx-auto
    px-5
    py-14
    "
>

    <div
        class="
        grid
        lg:grid-cols-2
        gap-14
        items-center
        "
    >

        <!-- LEFT -->
        <div>

            <p
                class="
                text-[#9A3E35]
                font-semibold
                uppercase
                tracking-[3px]
                "
            >
                Food Choice
            </p>

            <h1
                class="
                text-5xl
                lg:text-6xl
                font-extrabold
                leading-tight
                mt-3
                "
            >
                Masih Bingung
                Pilih
                <span
                    class="
                    text-[#9A3E35]
                    "
                >
                    Makanan?
                </span>
            </h1>

            <p
                class="
                text-gray-500
                mt-5
                text-lg
                "
            >
                Spin sekarang dan
                biarkan Food Choice
                memilih makanan
                untuk kamu 😭
            </p>

            <button
                onclick="spinWheel()"
                id="spinBtn"
                class="
                mt-8
                bg-[#9A3E35]
                hover:bg-[#822f28]
                text-white
                px-8
                py-4
                rounded-full
                font-semibold
                shadow-xl
                transition
                "
            >
                🎲 SPIN SEKARANG
            </button>

        </div>

        <!-- RIGHT -->
        <div
            class="
            flex
            justify-center
            "
        >

            <div class="relative">

                <!-- POINTER -->
                <div
                    class="
                    absolute
                    top-[-20px]
                    left-1/2
                    -translate-x-1/2
                    z-20
                    text-[#9A3E35]
                    text-6xl
                    "
                >
                    ▼
                </div>

                <!-- WHEEL -->
                <div
                    id="wheel"
                    class="
                    wheel
                    w-[350px]
                    h-[350px]
                    md:w-[500px]
                    md:h-[500px]
                    rounded-full
                    border-[10px]
                    border-[#9A3E35]
                    shadow-2xl
                    relative
                    overflow-hidden
                    "
                ></div>

            </div>

        </div>

    </div>

</section>

<!-- POPUP -->
<div
    id="popup"
    class="
    fixed
    inset-0
    hidden
    justify-center
    items-center
    bg-black/50
    overlay-blur
    z-[999]
    px-5
    "
>

    <div
        class="
        relative
        max-w-[450px]
        w-full
        "
    >

        <!-- CLOSE -->
        <button
            onclick="closePopup()"
            class="
            absolute
            -top-14
            right-0
            text-white
            text-5xl
            z-30
            "
        >
            ×
        </button>

        <div
            id="resultCard"
        ></div>

    </div>

</div>

<script>

const token =
    localStorage.getItem(
        'token'
    );

let foods = [];

let currentRotation =
    0;

async function loadFoods(){

    const response =
        await fetch(
        '/api/spinner-foods',
    {
        headers:{
            Authorization:
                `Bearer ${token}`,
            Accept:
                'application/json'
        }
    });

    const data =
        await response.json();

    foods =
        data.foods;

    renderWheel();
}

function renderWheel(){

    const wheel =
        document.getElementById(
            'wheel'
        );

    const angle =
        360 /
        foods.length;

    let colors =
        '';

    foods.forEach(
    (food,index)=>{

        const colorsPalette = [
            '#9A3E35',
            '#C7685A',
            '#D9A299',
            '#8E2E25',
            '#B95C4D'

        ];

        const color =
            colorsPalette[
                index %
                colorsPalette.length
            ];

        colors +=
        `
        ${color}
        ${index*angle}deg
        ${(index+1)*angle}deg,
        `;
    });

    wheel.style.background =
        `
        conic-gradient(
        ${colors.slice(0,-1)}
        ),
        #ffffff
        `;

        wheel.style.border =
        '10px solid #9A3E35';

        wheel.style.borderRadius =
        '50%';

        wheel.style.backgroundColor =
        '#ffffff';

        wheel.style.boxShadow =
        '0 20px 40px rgba(0,0,0,.15)';

    wheel.innerHTML='';

    foods.forEach(
    (food,index)=>{

        const label =
            document.createElement(
                'div'
            );

        label.innerText =
            food.name;

        label.style.position =
            'absolute';

        label.style.left =
            '50%';

        label.style.top =
            '50%';

        label.style.transform =
        `
        rotate(
        ${index*angle}deg
        )
        translateY(-200px)
        rotate(90deg)
        `;

        label.style.color =
            '#ffffff';

        label.style.textShadow =
            '0 2px 4px rgba(0,0,0,.25)';

        label.style.fontWeight =
            '700';

        label.style.fontSize =
            '13px';

        wheel.appendChild(
            label
        );
    });
}

function spinWheel(){

    const btn =
        document.getElementById(
            'spinBtn'
        );

    btn.disabled =
        true;

    const wheel =
        document.getElementById(
            'wheel'
        );

    const selectedIndex =
        Math.floor(
            Math.random()
            * foods.length
        );

    const angle =
        360 /
        foods.length;

    const rotation =
        3600 +
        (
            360 -
            (
                selectedIndex
                * angle
            )
        );

    currentRotation +=
        rotation;

    wheel.style.transform =
        `
        rotate(
        ${currentRotation}deg
        )
        `;

    setTimeout(()=>{

        btn.disabled =
            false;

        showResult(
            foods[
                selectedIndex
            ]
        );

    },6000);
}

function showResult(
    food
){

    confetti({
        particleCount:200,
        spread:100
    });

    const tags =
        (food.tags || [])
        .map(tag => `
            <span class="
                bg-[#EFEFEF]
                text-gray-600
                text-xs
                px-3
                py-1
                rounded-full
            ">
                ${tag.name}
            </span>
        `)
        .join('');

    document
    .getElementById(
        'popup'
    )
    .classList.remove(
        'hidden'
    );

    document
    .getElementById(
        'popup'
    )
    .classList.add(
        'flex'
    );

    document
    .getElementById(
        'resultCard'
    )
    .innerHTML =
    `
        <div class="
            food-card
            bg-white
            rounded-[28px]
            overflow-hidden
            custom-shadow
        ">

            <img
                src="/${food.image_url}"
                class="
                w-full
                h-[280px]
                object-cover
                "
            >

            <div class="p-5">

                <div class="
                    flex
                    justify-between
                ">

                    <div>

                        <h3 class="
                            text-2xl
                            font-bold
                            text-gray-800
                        ">
                            ${food.name}
                        </h3>

                        <div class="
                            flex
                            flex-wrap
                            gap-2
                            mt-3
                        ">
                            ${tags}
                        </div>

                    </div>

                    <div class="
                        text-center
                    ">

                        <i class="
                            fa-regular
                            fa-heart
                            text-[#9A3E35]
                            text-xl
                        "></i>

                        <p class="
                            text-sm
                            text-gray-500
                            mt-1
                        ">
                            ${food.likes_count ?? 0}
                        </p>

                    </div>

                </div>

            </div>

        </div>
    `;
}

function closePopup(){

    document
    .getElementById(
        'popup'
    )
    .classList.remove(
        'flex'
    );

    document
    .getElementById(
        'popup'
    )
    .classList.add(
        'hidden'
    );
}

loadFoods();

</script>

@endsection