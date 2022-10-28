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
        .form-control
        {
            color: #000;
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
                <img class="card-img" src="../img/register.webp">
                <div class="card-img-overlay text-white col-10 col-lg-6 mx-auto">
                    <h4 class="card-title">Registration</h4>
                    <div class="row">
                        <form class="mx-auto col-md-7" name="reg">
                            <div class="form-group text-left">
                                <label for="email">Email Address</label>
                                <input class="form-control mb-3" value="<?php if(isset($_POST['eid'])) echo $_POST['eid']; ?>" type="email" id="email" placeholder="Email Id"/>
                                <small class="form-text text-danger"></small>
                            </div>
                            <button type="submit" class="mb-2 btn btn-primary btn-lg">Submit</button>
                        </form>
                    </div>
                    <div class="text-center">
                        <p class="mb-0"></p>
                        <strong>A verification code will be sent on given email address.</strong><br>
                        <strong class="text-warning">For any problem click on <a href="../assets/contact.html">contact</a></strong><br><br>
                        <span>Already have an account?</span>
                        <a href="../login/">Login</a>
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
        
        email=document.querySelector("#email");
        email.focus();

        function valid()
        {
            if(email.value=="")
            {
                email.classList.add("error");
                email.nextElementSibling.innerText="Email cannot be empty";
                email.focus();
                return 0;
            }
            if(email.value.indexOf("@")==-1)
            {
                email.classList.add("error");
                email.nextElementSibling.innerText="Invalid Email";
                email.focus();
                return 0;
            }
            email.classList.remove("error");
            email.nextElementSibling.innerText="";
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
            a.open("POST","register_back.php",true);
            a.setRequestHeader("content-type","application/x-www-form-urlencoded");
            a.send("email="+email.value);
            a.onreadystatechange=()=>{
                if(a.readyState==4)
                    result(); 
            };
        }

        function result()
        {
            sub.innerHTML="Submit";
            sub.disabled=false;
            if(a.responseText=="Email already registered")
            {
                email.nextElementSibling.innerText=a.responseText;
                email.classList.add("error");
                email.focus();
                return;
            }                
            if(a.responseText.indexOf("Error while sending verification code")!=-1)
                p.innerText="Error while sending verification code.";
            else
                window.location.href="register1.php";
        }
    </script>
</body>
</html>
