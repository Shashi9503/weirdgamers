<?php
    session_start();
    if(isset($_SESSION['login_email']))
    {
        header("Location: ../dashboard/");
        exit(0);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            background-color: rgba(0,0,0,0);
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
                    <h4 class="card-title">Login to Dashboard</h4>
                    <div class="row">
                        <form class="mx-auto col-md-7" name="reg">
                            <div class="form-group text-left">
                                <label for="email">Email Address</label>
                                <input value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?>" class="form-control-sm form-control mb-3" type="email" id="email" placeholder="Email Id"/>
                                <small class="form-text text-danger"></small>
                            </div>
                            <div class="form-group text-left">
                                <label for="pwd">Password</label>
                                <input class="form-control form-control-sm mb-3" type="password" id="pwd" placeholder="Password"/>
                                <small class="form-text text-danger"></small>
                            </div>
                            <button type="submit" class="mb-3 btn btn-primary btn-md">Login</button>
                        </form>
                    </div>
                    <div class="text-center">
                        <p class="mb-0"></p>
                        <strong class="text-warning">For any problem click on <a href="../assets/contact.html">contact</a></strong><br>
                        <span>New User</span>
                        <button class="btn btn-link text-warning">Sign Up</button><br>
                        <a class='text-warning' href="forgot_pwd.php">Forgot Password</a>
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
        pwd=document.querySelector("#pwd");
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
            if(pwd.value=="")
            {
                pwd.classList.add("error");
                pwd.nextElementSibling.innerText="Password cannot be Empty";
                pwd.focus();
                return 0;
            }
            pwd.classList.remove("error");
            pwd.nextElementSibling.innerText="";
            return 1;
        }
        
        login_button=document.querySelector(".btn-primary");
        login_button.addEventListener("click",login);
        p=document.querySelector("p");

        function login(e)
        {
            e.preventDefault();
            p.innerText="";
            login_button.disabled=true;
            if(!valid())
            {
                login_button.disabled=false;
                return;
            }
            login_button.innerHTML="<span class='spinner-border spinner-border-sm'></span> Logging In...";
            a=new XMLHttpRequest();
            a.open("POST","login_back.php",true);
            a.setRequestHeader("content-type","application/x-www-form-urlencoded");
            a.send("email="+email.value+"&pwd="+pwd.value);
            a.onreadystatechange=()=>{
                if(a.readyState==4)
                    result(); 
            };
        }

        function result()
        {
            login_button.disabled=false;
            login_button.innerHTML="Login";
            if(a.responseText=="Incorrect password")
            {
                pwd.nextElementSibling.innerText=a.responseText;
                pwd.classList.add("error");
                pwd.focus();
                return;
            }
            if(a.responseText=="Email not registered")
            {
                email.nextElementSibling.innerText=a.responseText;
                email.classList.add("error");
                email.focus();
                return;                
            }
            p.innerText=a.responseText;
            if(a.responseText=="Hello")
                window.location.replace("../dashboard/");
        }

        document.querySelector(".btn-link").addEventListener("click",()=>{
            none=document.createElement("form");
            eid=document.createElement("input");
            document.body.append(none);
            none.append(eid);
            none.setAttribute("method","POST");
            none.setAttribute("action","../register/index.php");
            eid.setAttribute("name","eid");
            eid.value=email.value;
            none.submit();
        });
    </script>
</body>
</html>