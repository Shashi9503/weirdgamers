<?php
    session_start();
    if($_SESSION['verified']==true)
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
        .form-control
        {
            color: #000 !important;
            border: solid 1px #000 !important;
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
                    <h4 class="card-title">Registration</h4>
                    <div class="row">
                        <form class="mx-auto col-md-7" name="reg">
                            <div class="form-group text-left">
                                <label for="name" >Name</label>
                                <input class="form-control mb-3" type="text" id="name" placeholder="Name"/>
                                <small class="form-text text-danger"></small>
                            </div>
                            <div class="form-group text-left">
                                <label for="name" >Phone Number</label>
                                <input class="form-control mb-3" type="number" id="phone" placeholder="Phone number"/>
                                <small class="form-text text-danger"></small>
                            </div>
                            <div class="form-group text-left">
                                <label for="pwd">Password</label>
                                <input class="form-control mb-3" type="password" id="pwd" placeholder="Password"/>
                                <small class="form-text text-danger"></small>
                            </div>
                            <button type="submit" class="mb-2 btn btn-primary btn-lg">Submit</button>
                        </form>
                    </div>
                    <div class="text-center">
                        <p class="mb-0"></p>
                        <strong></strong><br>
                        <strong class="text-warning">For any problem click on <a href="../assets/contact.html">contact</a></strong>
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
        
        pwd=document.querySelector("#pwd");
        u_name=document.querySelector("#name");
        phone=document.querySelector("#phone");
        u_name.focus();

        function valid()
        {
            if(u_name.value=="")
            {
                u_name.classList.add("error");
                u_name.nextElementSibling.innerText="Name cannot be empty";
                u_name.focus();
                return 0;
            }
            u_name.classList.remove("error");
            u_name.nextElementSibling.innerText="";

            if(phone.value.length!=10)
            {
                phone.classList.add("error");
                phone.nextElementSibling.innerText="Number must be 10 digit";
                phone.focus();
                return 0;
            }
            phone.classList.remove("error");
            phone.nextElementSibling.innerText="";

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
            a.open("POST","register_back2.php",true);
            a.setRequestHeader("content-type","application/x-www-form-urlencoded");
            a.send("name="+u_name.value+"&pwd="+pwd.value+"&phone="+phone.value);
            a.onreadystatechange=()=>{
                if(a.readyState==4)
                {
                    sub.innerHTML="Submit";
                    sub.disabled=false;
                    p.innerHTML=a.responseText;
                    if(a.responseText=="Successfully registered")
                        p.nextElementSibling.innerHTML="Go to <a href='../login/'></a>";
                } 
            };
        }
    </script>
</body>
</html>
<?php
    }
    else
        header("Location: ../index.html");
    exit(0);
?>