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
        .btns{
            display: flex;
            flex-wrap: wrap;
        }
        .btns button{
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
            <div class="btns">
                <button>%</button>
                <button>CE</button>
                <button id='clear'>C</button>
                <button>Back</button>
                <button>1/x</button>
                <button>x<sup>2</sup></button>
                <button>sqrt</button>
                <button>/</button>
                <button>7</button>
                <button>8</button>
                <button>9</button>
                <button>*</button>
                <button>4</button>
                <button>5</button>
                <button>6</button>
                <button>-</button>
                <button>1</button>
                <button>2</button>
                <button>3</button>
                <button>+</button>
                <button>+/-</button>
                <button>0</button>
                <button>.</button>
                <button id="equal">=</button>

            </div>
        </div>
    </div>

    <script>
        let screen = document.querySelector('.screen input');
        let eql = document.querySelector('#equal');
        let clr = document.getElementById('clear');
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

        clr.addEventListener('click',()=>{
            screen.value = '';
        })
    </script>
</body>
</html>