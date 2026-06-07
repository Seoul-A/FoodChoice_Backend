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

.spinner-food-card:hover{
    transform:
    translateY(-5px);

    box-shadow:
    0 12px 25px rgba(
        0,0,0,0.15
    );
}

.spinner-food-card:hover
.spinner-food-img{
    transform:
    scale(1.08);
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
        font-size:28px;
        font-weight:bold;
        margin-top:0px;
        margin-bottom:7px;
        text-transform:uppercase;
        "
        >
            MASIH BINGUNG <br>
            PILIH MAKANAN ?
        </h1>

        <p
        style="
        color:#9A3E35;
        font-size:18px;
        margin-bottom:7px;
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
let isHoveringSpin = false;

const colors = [
    '#d67878',
    '#EAA624',
    '#ccdb30',
    '#73cff7',
    '#fe9ef1'
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
    const centerRadius =
        isHoveringSpin
        ? 78
        : 72;

    ctx.beginPath();

    ctx.arc(
        wheelRadius,
        wheelRadius,
        centerRadius,
        0,
        Math.PI * 2
    );

    ctx.fillStyle =
        isHoveringSpin
        ? '#7F2F28'
        : '#9A3E35';

    ctx.fill();

    ctx.fillStyle =
        '#fff';

    ctx.textAlign =
        'center';

    ctx.font =
        isHoveringSpin
        ? 'bold 26px Arial'
        : 'bold 24px Arial';

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
'mousemove',
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

    const hovering =
        distance <= 78;

    if(
        hovering !==
        isHoveringSpin
    ){

        isHoveringSpin =
            hovering;

        canvas.style.cursor =
            hovering
            ? 'pointer'
            : 'default';

        drawWheel();
    }
});

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

async function toggleSpinnerLike(id){

    try{

        const response =
            await fetch(
            `/api/foods/${id}/like`,
        {
            method:'POST',

            headers:{
                Authorization:
                    `Bearer ${token}`,
                Accept:
                    'application/json'
            }
        });

        const data =
            await response.json();

        const foodIndex =
            foods.findIndex(
                food =>
                food.id === id
            );

        if(
            foodIndex !== -1
        ){

            foods[
                foodIndex
            ].is_liked =
                data.is_liked;

            foods[
                foodIndex
            ].likes_count =
                data.likes_count;

            showResult(
                foods[
                    foodIndex
                ],
                false
            );
        }

    }catch(error){

        console.log(
            error
        );
    }
}

function showResult(
    selectedFood = null,
    showConfetti = true
){

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
        selectedFood ??
        foods[
            winningIndex
        ];

    if(
        showConfetti
    ){

        confetti({
            particleCount:180,
            spread:100
        });
    }

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
    class="spinner-food-card"
    style="
        background:white;
        border-radius:28px;
        overflow:hidden;
        box-shadow:
        0 12px 30px rgba(
            0,0,0,.12
        );
        width:100%;
        max-width:430px;
        transition:.3s;
    "
    >

        <!-- IMAGE -->
        <div
        style="
        position:relative;
        overflow:hidden;
        "
        >

            <img
            src="/${food.image_url}"
            alt="${food.name}"
            class="spinner-food-img"
            style="
            width:100%;
            height:240px;
            object-fit:cover;
            transition:.4s;
            display:block;
            "
            >

        </div>

        <!-- BODY -->
        <div
        style="
        padding:18px;
        display:flex;
        flex-direction:column;
        "
        >

            <!-- NAME -->
            <div
            style="
            font-size:24px;
            font-weight:bold;
            margin-bottom:18px;
            margin-top:5px;
            color:#222;
            "
            >
                ${food.name}
            </div>

            <!-- TAG -->
            <div>

                ${(food.tags || [])
                .map(tag => `

                <span
                style="
                    display:inline-block;
                    padding:9px 12px;
                    border-radius:20px;
                    font-size:14px;
                    margin-right:6px;
                    margin-bottom:8px;
                    font-weight:500;
                    box-shadow:
                    0 3px 8px rgba(
                        0,0,0,.08
                    );

                    ${
                        tag.type ===
                        'tipe'
                        ? `
                        background:#e5e5e5;
                        color:#444;
                        `
                        : ''
                    }

                    ${
                        tag.type ===
                        'jenis'
                        ? `
                        background:#d8f5d0;
                        color:#3c7a2a;
                        `
                        : ''
                    }

                    ${
                        tag.type ===
                        'rasa'
                        ? `
                        background:#ffd6d6;
                        color:#b30000;
                        `
                        : ''
                    }

                    ${
                        tag.type ===
                        'bahan_utama'
                        ? `
                        background:#ffe8cc;
                        color:#a35b00;
                        `
                        : ''
                    }
                "
                >
                    ${tag.name}
                </span>

                `)
                .join('')}

            </div>

            <!-- LIKE -->
            <div
            style="
                display:flex;
                justify-content:flex-end;
                align-items:center;
                margin-top:auto;
            "
            >

                <button
                onclick="
                toggleSpinnerLike(
                    ${food.id}
                )
                "
                style="
                    font-size:28px;
                    border:none;
                    background:none;
                    cursor:pointer;
                    color:#8B0000;
                    transition:.2s;
                "
                >

                    ${
                        food.is_liked
                        ? '♥'
                        : '♡'
                    }

                </button>

                <span
                style="
                margin-left:6px;
                "
                >
                    ${
                        food.likes_count
                        ?? 0
                    }
                </span>

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