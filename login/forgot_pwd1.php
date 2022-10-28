<?php
    session_start();
    if($_SESSION['start_time']+300 >= time())
    {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .container-fluid
        {
            font-family: 'Roboto','sans-serif';
            padding: 0px !important;
        }
        .card, .card-img
        {
            border: 0px !important;
        }
        .card-img-overlay
        {
            text-align: center;
            background-color: rgba(0,0,0,0.7);
            height: fit-content;
            margin-top: 5%
        }
        .btn-primary
        {
            border-radius: 25px !important;
            padding: 1% 8% !important;
        }
        button:hover
        {
            background-color: transparent !important;
        }
        form
        {
            padding: 0px !important;
        }
        .error
        {
            border: solid 2px red;
        }

        @media (min-width: 575px)
        {
            .card-img-overlay
            {
                background-color: rgba(0,0,0,0.87);
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <img class="card-img" src="../img/register.webp"/>
                <div class="card-img-overlay text-white col-10 col-lg-6 mx-auto">
                    <h4 class="card-title">Email Verification</h4>
                    <div class="row">
                        <form class="mx-auto col-md-7" name="reg">
                            <div class="form-group text-left">
                                <label for="code">Verification Code</label>
                                <input class="form-control form-control-sm mb-3" type="text" id="code" placeholder="Enter code"/>
                                <small class="form-text text-danger"></small>
                            </div>
                            <button type="submit" class="mb-2 btn btn-primary btn-md">Submit</button>
                        </form>
                    </div>
                    <div class="text-center">
                        <p class="mb-0"></p>
                        <span>Code expires in <span id="m">5</span>:<span id="s">00</span></span><br>
                        <span>Didn't get code?</span><button class="btn btn-link"><strong>Resend</strong></button><br>
                        <strong class="text-warning">For any problem click on <a href="../assets/contact.html">contact</a></strong><br>
                        <a href="index.php">Change Email</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        function myFunction(x)
        {
            if(x.matches)
                document.querySelector(".card-img").setAttribute("src","../img/weird.webp");
        }

        var x = window.matchMedia("(min-width: 575px)");
        myFunction(x);
        x.addListener(myFunction);
        
        code=document.querySelector("#code");
        resend=document.querySelector(".btn-link");
        code.focus();
        
        m=document.querySelector("#m");
        s=document.querySelector("#s");

        function timer()
        {
            if(m.innerText=="0" && s.innerText=="00")
            {
                clearInterval(x);
                m.parentElement.style.color="red";
                resend.previousElementSibling.innerText="Click on";
                m.parentElement.innerText="Code Expired";
            }
            sec=parseInt(s.innerText);
            if(sec)
            {
                if(sec>10)
                    s.innerText=`${sec-1}`;
                else
                    s.innerText=`0${sec-1}`;
            }
            else
            {
                m.innerText=`${parseInt(m.innerText)-1}`;
                s.innerText="59";
            }
        }
        x=setInterval(timer,1000);

        function valid()
        {
            if(code.value=="")
            {
                code.classList.add("error");
                code.nextElementSibling.innerText="Cannot be empty";
                code.focus();
                return 0;
            }
            code.classList.remove("error");
            code.nextElementSibling.innerText="";
            return 1;
        }
        
        sub=document.querySelector(".btn-primary");
        sub.addEventListener("click",r);
        p=document.querySelector("p");

        function r(e)
        {
            e.preventDefault();
            p.innerText="";
            sub.disabled=true;
            if(!valid())
            {
                sub.disabled=false;
                return;
            }
            sub.innerHTML="<span class='spinner-border spinner-border-sm'></span> Submitting...";
            a=new XMLHttpRequest();
            a.open("POST","forgot_pwd_back1.php",true);
            a.setRequestHeader("content-type","application/x-www-form-urlencoded");
            a.send("code="+code.value);
            a.onreadystatechange=()=>{
                if(a.readyState==4)
                    result(); 
            };
        }

        function result()
        {
            sub.innerHTML="Submit";
            sub.disabled=false;
            if(a.responseText=="0")
            {
                code.nextElementSibling.innerText="Invalid Code";
                code.classList.add("error");
                code.focus();
                return;
            }
            if(a.responseText=="-1")
            {
                p.nextElementSibling.innerText="Code expired. Click on";
                p.nextElementSibling.nextElementSibling.nextElementSibling.innerText="";
                
            }
            else if(a.responseText=="-2")
            {
                p.nextElementSibling.innerText="Reached Maximum limit. Try Later.";
                p.nextElementSibling.style.color="red";
            }
            else
                window.location.href="forgot_pwd2.php";
        }

        resend.addEventListener("click",()=>{
            sub.disabled=true;
            a=new XMLHttpRequest();
            a.open("GET","forgot_pwd_back1a.php",true);
            a.send(null);
            a.onreadystatechange=()=>{
                if(a.readyState==4)
                {
                    sub.disabled=false;
                    clearInterval(x);
                    p.nextElementSibling.innerHTML=`<span>Code expires in <span id="m">5</span>:<span id="s">00</span></span>`;
                    p.nextElementSibling.style.color="white";
                    m=document.querySelector("#m");
                    s=document.querySelector("#s");
                    x=setInterval(timer,1000);
                    resend.previousElementSibling.innerText="Didn't get code?";
                    if(a.responseText.indexOf("sent")!=-1)
                    {
                        p.innerText="Verification code sent";
                        code.value="";
                        code.focus();             
                    }
                    else if(a.responseText=="Session expired")
                    {
                        p.innerText="Session Expired. Redirecting...";
                        sub.disabled=true;
                        setTimeout(()=>{
                            window.location.replace="index.php";
                        },2000);
                    }
                    else
                        p.innerText="Error while sending verification code";
                }
            }
        })
    </script>
</body>
</html>
<?php
    }
    else
        header("Location: index.php");
    exit(0);
?>