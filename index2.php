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
    </style>


</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">Registration</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">ยืนยันการลงทะเบียนเรียน <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="result.html">ผลการลงทะเบียนเรียน <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
        
    <br>
    <h1>การลงทะเบียนเรียน ภาคการศึกษาที่ 1/2563</h1><br>
    <form class="form-inline" id="form">
          <input class="form-control mr-sm-2" type="search" name="stuid" id="idstd" placeholder="รหัสนักศึกษา" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id = "lg">login</button>
          
    </form><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="200">รหัสศึกษา</th>
                <th scope="col">ชื่อ-สกุล</th>
                <th scope="col">เพศ</th>
            </tr>
        </thead>
        <tbody id="tblData1">
        </tbody>
    </table>

</body>

</html>


<script>
    
    function renderTable(data){
        var url = "http://localhost/slimmongo-1/student";
        $.getJSON(url).done(function( data ) {
            console.log(JSON.stringify(data));
          
          var profile = $("#tblData1");
          profile.empty();
          $.each(data, function (index, value) { 
            console.log(value);
            var g = "";
            if(value.gender == "M"){
                g = "ชาย";
            }
            else {g = "หญิง"}
                profile.append('<tr>'
                + "<td align='center'>"+value.STDid+"</td>"
                + "<td align='center'>"+value.name+"</td>"
                + "<td align='center'>"+g+"</td>"
                + '</tr>')
          });
        });
    }
    $(function(){
        renderTable();
        $("#form").submit(function (e) { 
           e.preventDefault();
           var data = $(this).serialize();
           $.post("http://localhost/slimmongo-1/search-std", data,
           function (data, textStatus, jqXHR) {
            window.location.href = "register.php?stuid="+$("#idstd").val();
           }
           );    
         });  
    });
  
  </script>


</html>