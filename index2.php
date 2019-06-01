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
        th {
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

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="50">รหัสวิชา</th>
                <th scope="col">ชื่อวิชา</th>
                <th scope="col">หน่วยกิต</th>
                <th scope="col">กลุ่ม</th>
                <th scope="col"> </th>
            </tr>
        </thead>
        <tbody id="tblData1">
            <td scope="row">
                <form class="form-inline" id="form">
                    <div class="form-group mx-sm-1 mb-1">
                        <input type="text" class="form-control" id="search" placeholder="ค้นหารายวิชา" value="">
                        <!-- รายวิชา-->
                        <button type="button" class="btn btn-primary mb-1" data-toggle="modal"
                            data-target="#myModal">ค้นหา</button>
                        <div class="container">

                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog modal-lg">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">ผลการค้นหา</h4>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">รหัสวิชา</th>
                                                        <th scope="col">ชื่อวิชา</th>
                                                        <!-- <th scope="col">หน่วยกิต</th> -->
                                                        <th scope="col">สถานะ</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tblData2">
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                </form>
            </td>
        </tbody>
    </table>

</body>

</html>


<script>
    
      $(document).ready(function () { 
          var courseid = $("#search").val();  
          $.post("http://localhost/slimmongo-1/search-course", courseid,
          function (data) {
                console.log(JSON.stringify(data));
            
            var profile = $("#tblData2");
            profile.empty();
            $.each(data, function (index, value) { 
                console.log(value);
                    profile.append('<tr>'
                    + "<td align='center'>"+value.stuid+"</td>"
                    + "<td align='center'>"+value.name+"</td>"
                    + "<td align='center'>"+value.gender+"</td>"
                    + "<td align='center'>"+("html", "<input type=\"submit\" class=\"btn\" value=\"[เลือก]\">")+"</td>"
                    + '</tr>')
            });
          });
        }
    
    
    
    </script>


</html>