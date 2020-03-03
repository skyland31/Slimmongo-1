<?php $stuid1 = $_GET['stuid'];
?>
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
        <a class="navbar-brand" href="index2.php">Registration</a>
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
    <form class="form-inline" id="form1" >
          <input type="hidden" name="stuid" id="stdidback" value="<?php echo $stuid1?>">
    </form>
        <form class="form-inline" id="form">
          <input type="hidden" name="stuid" id="stdidback" value="<?php echo $stuid1?>">
          <input class="form-control mr-sm-2" type="search" name="courseid" id="name" placeholder="รหัสวิชา" aria-label="Search" >
          <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value = "ลงทะเบียนเรียนรายวิชา">
          <div class="form-group mx-sm-1 mb-1">
                <button type="button" class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#myModal1" id ="allCourse">รายวิชาทั้งหมด</button>
                <div class="container">
    
                    <!-- Modal -->
                    <div class="modal fade" id="myModal1" role="dialog">
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
                                                <th scope="col">สถานะ</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tblData3">
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default"
                                        data-dismiss="modal">Close</button>
                                </div>
                            </div>
    
                        </div>
                    </div>
    
                </div>
            </div>
        </form>
        <br>


    <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">รหัสนักศึกษา</th>
                    <th scope="col">ชื่อนักศึกษา</th>
                    <th scope="col">รหัสวิชา</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody id="tblData">
                </td>
                
            </tbody>
        </table>

    <form class="form-inline" id="formNameSub" >
          
    </form>
</body>

</html>


<script>
    $(document).ready(function(){
        var url = "http://localhost/slimmongo-1/course";
        $.getJSON(url).done(function( data ) {
            console.log(JSON.stringify(data));
          var profile = $("#tblData3");
          profile.empty();
          $.each(data, function (index, value) { 
            console.log(value);
                profile.append('<tr>'
                + "<td align='center'>"+value.Course+"</td>"
                + "<td align='center'>"+value.name+"</td>"
                + "<td align='center'>"+value.state+"</td>"
                + '</tr>')
          });
        });
         /*var data1 = $("#form1").serialize();
         $.post("http://localhost/slimmongo-1/search-std", data1,
         function (data, textStatus, jqXHR) {
             var profile = $("#tblData");
             profile.empty();
             $.each(data, function (index, value) { 
                 var i = 0;
                 $.each(value.register, function (index, value1) { 
                
                 profile.append('<tr>'
                     + '<th>'+value.STDid+'</th>'
                     + '<td>'+value.name+'</td>'
                     +  '<td>'+value.register[i]+'</td>'
                     +  '<td>'+data1+'</td>'
                     + '</tr>')
                    i++;
                 });
             });
         }); */
         var data1 = $("#form1").serialize();
         $.post("http://localhost/slimmongo-1/search-std", data1,
         function (data, textStatus, jqXHR) {
             var profile = $("#tblData");
             profile.empty();
             $.each(data, function (index, value) { 
                 var i = 0;
                 $.each(value, function (index, value1) { 
                    var line = ""
                    line = '<tr>';
                    line += '<th>'+value.STDid+'</th>';
                    line += '<td>'+value.name+'</td>';
                    line +=  '<td name = "courseid">'+value.register[i]+'</td>';
                    line += '</tr>';
                     profile.append(line);
                    i++;
                 });
             });
         });
         /*var data2 = $("#form").serialize();
         $.post("http://localhost/slimmongo-1/insert", data2,
         function (data, textStatus, jqXHR) {
             alert("เพิมสำเร็จ");
             });
         });*/
    });
    
</script>

</html>