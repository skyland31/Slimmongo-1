<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>ระบบลงทะเบียนเรียนออนไลน์</title>
    <style>
        th,td {
            text-align: center;
        }
        #Home {
            background-image: url("img/background.jpg");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        html {
            scroll-behavior: smooth;
            /*เลื่อนขึ้นลงแบบ animetion*/
        }
        #login{
            padding-top: 80px ;
            height: 700px;
        }
    </style>


</head>

<body>

    <nav class="navbar navbar-expand-lg shadow-sm navbar-light  bg-dark fixed-top">
        <!-- Navbar Icon Register -->
        <a class="navbar-brand" style="font-size:20px;color:white;margin-left: 30px;" href="#">Registration</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <div class="container-fluid" id="Home">
        <div class="row">
            <div class="col-md col-lg col-sm text-center" style="padding-top:355px;padding-bottom:355px;">
                <h1 class="text-monospace text-dark">การลงทะเบียนเรียน</h1>
                <h2 class="text-monospace" style="color: gray;">ภาคการศึกษาที่ 1/2563</h1>
                    <a class="btn btn-outline-primary" href="#login" id="move-edu" role="button">Try See
                        Login</a>
            </div>
        </div>
    </div>
        
    <br>
    <div id="login" class="container" >
        <div class="row">
            <div class="col-md col-lg col-sm bg-white text-center text-monospace" style=" align-content: center;">
                <h1>Login</h1>
                <h2 style="color: gray;">Student ID</h2>
                <form class="form-inline" id="form">
                    <div class="col-md">
                        <input class="form-control text-center mr-sm-2" type = "text" name="stuid" id="idstd" required placeholder="ID Student" >
                        <input class="form-control text-center mr-sm-2" type = "text" name="password" id="password" required placeholder="Password">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id = "lg">login</button>
                        <button class="btn btn-outline-success my-2 my-sm-0" id = "sh">Show Student</button>
                    </div>
                </form>
            </div>
    </div>
    <br>
    <div id="tableStudent" class="container">
        <table class="table">
            <thead >
                <tr>
                    <th scope="col" width="200">รหัสศึกษา</th>
                    <th scope="col">ชื่อ-สกุล</th>
                </tr>
            </thead>
            <tbody id="tblData1">
            </tbody>
        </table>
    </div>
</body>

</html>
<script>
    
    function renderTable(){
        var url = "http://localhost/slimmongo-1/student";
        $.getJSON(url).done(function( data ) {
            // console.log(JSON.stringify(data));
          var profile = $("#tblData1");
          profile.empty();
          $.each(data, function (index, value) { 
            // console.log(value);
                profile.append('<tr>'
                + "<td align='center'>"+value.STDid+"</td>"
                + "<td align='center'>"+value.name+"</td>"
                + '</tr>')
          });
        });
    }
    $(function(){
        renderTable();
        $("#form").submit(function (e) { 
           e.preventDefault();
           var data = $(this).serialize();
           var id = $('#idstd').val();
           $.post("http://localhost/slimmongo-1/search-std", data,
           function (data, textStatus, jqXHR) {
                console.log(JSON.stringify(data));
                var password = data.password;
                var password_input = $("#password").val();
                console.log(password_input + " = " + password);
                if(password_input == password){
                    alert("Login สำเร็จ");
                    window.location.href = "register.php?stuid="+$("#idstd").val(); 
                }
                else {
                    alert("กรุณาตรวจสอบ ID Student และ Password");
                }
                    // 
                    // $.each(data, function (index, value) { 
                    //     console.log(value);
                    //     alert(data);
                    // });
            }
           );   
           
            
         });  
         $('#tableStudent').hide();
         $('#sh').click(function (e) { 
             e.preventDefault();
             $('#tableStudent').toggle();
         });
    });
  
  </script>


</html>