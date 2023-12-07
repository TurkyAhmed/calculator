<?php
// require_once("calculation.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        .container{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
        }
        .calculator{
            width: 320px;
            background-color: #aea1a1;
        }
        .screen input{
            box-sizing: border-box;
            width: 100%;
            height: 5rem;
            padding: 15px;
        }
        .commands{
            display: flex;
            flex-wrap: wrap;
        }
        .commands button{
            width: 80px;
            text-align: center;
            height: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="calculator">
            <div class="screen">
                <input type="text" name="screen" id="screen">
            </div>
            <div class="commands">
                <button id="pra">%</button>
                <button id="ce">CE</button>
                <button id="c">C</button>
                <button id="back">Back</button>
                <button id="bla">1/x</button>
                <button id="x2">x<sup>2</sup></button>
                <button id="sqrt">sqrt</button>
                <button id="divi">/</button>
                <button id="7">7</button>
                <button id="8">8</button>
                <button id="9">9</button>
                <button id="*">*</button>
                <button id="4">4</button>
                <button id="5">5</button>
                <button id="6">6</button>
                <button id="sub">-</button>
                <button id="1">1</button>
                <button id="2">2</button>
                <button id="3">3</button>
                <button id="sum">+</button>
                <button id="sub_sum">+/-</button>
                <button id="0">0</button>
                <button id="dot">.</button>
                <button id="equal">=</button>

            </div>
        </div>
    </div>

    <script>
        let screen = document.querySelector('.screen input');
        let eql = document.querySelector('#equal');
        let btn=document.getElementsByTagName('button');

        eql.addEventListener('click',()=>{
            let operand = screen.value.split(/([+\-*/])/);
            a = operand[0];
            b = operand[2];
            operator = operand[1];

            fetch('calculate.php',{
                method: 'POST',
                headers:{'content-type':'application/x-www-form-urlencoded'},
                body: new URLSearchParams({
                action:'calculate',
                a: a,
                b: b,
                operator: operator,
                }),
            })
            .then(response => response.json())
            .then(data =>{
                console.log(data);
                screen.value=data;
            })
            .catch(error => console.error('Error:', error));
        });

        for (let i = 0; i < btn.length; i++) {
            btn[i].addEventListener("click",()=>{
                screen.value += btn[i].innerHTML;
            });
        }
    </script>
</body>
</html>