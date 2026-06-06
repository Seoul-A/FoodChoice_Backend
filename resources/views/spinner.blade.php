@extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>

<style>

body{
    background:#F5F5F5;
}

.food-card{
    transition:.25s;
}

#wheelCanvas{
    display:block;
    margin:auto;
    filter:
    drop-shadow(
        0 18px 35px rgba(
            0,0,0,.14
        )
    );
}

/* POPUP */

#popupOverlay{
    position:fixed;
    inset:0;
    background:rgba(0,0,0,.6);
    backdrop-filter:blur(5px);
    display:none;
    justify-content:center;
    align-items:center;
    z-index:99999;
    padding:20px;
}

#popupOverlay.show{
    display:flex;
}

#popupCard{
    width:100%;
    max-width:430px;
    position:relative;
}

#closePopup{
    position:absolute;
    top:12px;
    right:12px;
    z-index:999;
    width:42px;
    height:42px;
    border:none;
    border-radius:999px;
    background:white;
    color:#9A3E35;
    font-size:28px;
    cursor:pointer;
    box-shadow:
    0 6px 18px rgba(
        0,0,0,.12
    );
}

</style>

<section
style="
min-height:calc(100vh - 90px);
display:flex;
flex-direction:column;
align-items:center;
justify-content:center;
padding:30px 20px;
"
>

    <!-- TITLE -->
    <div
    style="
    text-align:center;
    margin-bottom:40px;
    "
    >

        <h1
        style="
        font-size:24px;
        font-weight:900;
        margin:0;
        text-transform:uppercase;
        "
        >
            MASIH BINGUNG <br>
            PILIH MAKANAN ?
        </h1>

        <p
        style="
        color:#9A3E35;
        font-size:15px;
        margin-top:12px;
        "
        >
            pakai spinner aja
        </p>

    </div>

    <!-- SPINNER -->
    <div
    style="
    display:flex;
    justify-content:center;
    width:100%;
    "
    >

        <div
        style="
        position:relative;
        width:500px;
        height:500px;
        "
        >

            <!-- POINTER -->
            <div
            style="
            position:absolute;
            top:50%;
            right:-10px;
            transform:translateY(-50%);
            width:0;
            height:0;
            border-top:22px solid transparent;
            border-bottom:22px solid transparent;
            border-right:36px solid #9A3E35;
            z-index:99;
            "
            ></div>

            <canvas
            id="wheelCanvas"
            width="500"
            height="500"
            ></canvas>

        </div>

    </div>

</section>

<!-- POPUP -->
<div id="popupOverlay">

    <div id="popupCard">

        <button
        id="closePopup"
        onclick="closePopup()"
        >
            ×
        </button>

        <div id="resultCard"></div>

    </div>

</div>

<script>

const canvas =
    document.getElementById(
        'wheelCanvas'
    );

const ctx =
    canvas.getContext(
        '2d'
    );

const wheelRadius =
    canvas.width / 2;

const token =
    localStorage.getItem(
        'token'
    );

let foods = [];
let sections = [];

let currentAngle = 0;
let spinSpeed = 0;
let isSpinning = false;

const colors = [
    '#C85555',
    '#EAA624',
    '#767B39',
    '#AADCF2',
    '#F7BCB0'
];

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

    sections =
        foods.map(
            food => food.name
        );

    drawWheel();
}

function drawWheel(){

    ctx.clearRect(
        0,
        0,
        canvas.width,
        canvas.height
    );

    const arcSize =
        (2 * Math.PI)
        / sections.length;

    let startAngle =
        currentAngle;

    sections.forEach(
    (food,index)=>{

        const endAngle =
            startAngle
            + arcSize;

        // slice
        ctx.beginPath();

        ctx.moveTo(
            wheelRadius,
            wheelRadius
        );

        ctx.arc(
            wheelRadius,
            wheelRadius,
            wheelRadius - 8,
            startAngle,
            endAngle
        );

        ctx.closePath();

        ctx.fillStyle =
            colors[
                index %
                colors.length
            ];

        ctx.fill();

        ctx.strokeStyle =
            '#fff';

        ctx.lineWidth =
            2;

        ctx.stroke();

        // text
        ctx.save();

        ctx.translate(
            wheelRadius,
            wheelRadius
        );

        ctx.rotate(
            startAngle +
            arcSize / 2
        );

        ctx.textAlign =
            'center';

        ctx.fillStyle =
            '#fff';

        ctx.font =
            'bold 13px Arial';

        ctx.fillText(
            food,
            wheelRadius / 1.55,
            5
        );

        ctx.restore();

        startAngle =
            endAngle;
    });

    // CENTER BUTTON
    ctx.beginPath();

    ctx.arc(
        wheelRadius,
        wheelRadius,
        72,
        0,
        Math.PI * 2
    );

    ctx.fillStyle =
        '#9A3E35';

    ctx.fill();

    ctx.fillStyle =
        '#fff';

    ctx.textAlign =
        'center';

    ctx.font =
        'bold 24px Arial';

    ctx.fillText(
        'SPIN',
        wheelRadius,
        wheelRadius - 5
    );

    ctx.font =
        '14px Arial';

    ctx.fillText(
        'klik untuk mulai',
        wheelRadius,
        wheelRadius + 20
    );
}

// CLICK CENTER
canvas.addEventListener(
'click',
function(e){

    const rect =
        canvas
        .getBoundingClientRect();

    const x =
        e.clientX
        - rect.left
        - wheelRadius;

    const y =
        e.clientY
        - rect.top
        - wheelRadius;

    const distance =
        Math.sqrt(
            x*x + y*y
        );

    if(distance <= 72){

        spinWheel();
    }
});

function spinWheel(){

    if(isSpinning)
    return;

    isSpinning =
        true;

    spinSpeed =
        Math.random()
        * 8 + 24;

    const spinDuration =
        3200;

    const deceleration =
        spinSpeed /
        (spinDuration / 20);

    const spinInterval =
        setInterval(()=>{

        currentAngle +=
            spinSpeed *
            Math.PI /
            180;

        spinSpeed -=
            deceleration;

        if(
            spinSpeed <= 0
        ){

            clearInterval(
                spinInterval
            );

            isSpinning =
                false;

            showResult();
        }

        drawWheel();

    },20);
}

function showResult(){

    const finalAngle =
        currentAngle %
        (2 * Math.PI);

    const winningIndex =
        Math.floor(
        (
            sections.length -
            (
                finalAngle /
                (
                    2 *
                    Math.PI
                ) *
                sections.length
            )
        )
        %
        sections.length
    );

    const food =
        foods[
            winningIndex
        ];

    confetti({
        particleCount:180,
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
        'popupOverlay'
    )
    .classList.add(
        'show'
    );

    document
    .getElementById(
        'resultCard'
    )
    .innerHTML =
    `
    <div
    style="
    background:white;
    border-radius:28px;
    overflow:hidden;
    box-shadow:0 12px 30px rgba(0,0,0,.12);
    width:100%;
    max-width:430px;
    "
    >

        <!-- IMAGE -->
        <div
        style="
        width:100%;
        height:240px;
        overflow:hidden;
        "
        >

            <img
            src="/${food.image_url}"
            style="
            width:100%;
            height:100%;
            object-fit:cover;
            display:block;
            "
            >

        </div>

        <!-- CONTENT -->
        <div
        style="
        padding:22px;
        "
        >

            <div
            style="
            display:flex;
            justify-content:space-between;
            align-items:flex-start;
            "
            >

                <!-- LEFT -->
                <div>

                    <h3
                    style="
                    margin:0;
                    font-size:32px;
                    font-weight:700;
                    color:#1f2937;
                    "
                    >
                        ${food.name}
                    </h3>

                    <div
                    style="
                    display:flex;
                    flex-wrap:wrap;
                    gap:10px;
                    margin-top:18px;
                    "
                    >
                        ${tags}
                    </div>

                </div>

                <!-- RIGHT -->
                <div
                style="
                text-align:center;
                "
                >

                    <i
                    class="
                    fa-regular fa-heart
                    "
                    style="
                    color:#9A3E35;
                    font-size:26px;
                    "
                    ></i>

                    <p
                    style="
                    margin-top:10px;
                    color:#6B7280;
                    font-size:16px;
                    "
                    >
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
        'popupOverlay'
    )
    .classList.remove(
        'show'
    );
}

loadFoods();

</script>

@endsection