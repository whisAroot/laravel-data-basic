<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <title>Welcome</title>
</head>
<body>
    <style>
        nav svg{
            display: none;
        }
        nav .hidden{
            display: block !important;
        }
        nav p{
            margin-top: 10px;
        }
    </style>
    <div class="container" style="padding: 50px">
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif

                @if (Session::has('warning'))
                    <div   div class="alert alert-warning" role="alert">
                        {{Session::get('warning')}}
                    </div>
                @endif

                @if (Session::has('delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    {{Session::get('delete')}}
                  </div>
                  
                  <script>
                    $(".alert").alert();
                  </script>

                @endif

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                ข้อมูลพนักงาน
                            </div>
                            <div class="col-md-6 text-right" >
                                <a href="{{route('employee.add')}}"><button class="btn btn-primary">เพิ่มข้อมูล</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อพนักงาน</th>
                                    <th>รูปภาพ</th>
                                    <th>วันที่บันทึกล่าสุด</th>
                                    <th>การจัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employeeKey as $key => $employee)
                                <tr>
                                    <td>{{$employee->id}}</td>
                                    <td>{{$employee->name}}</td>
                                    <td><img src="{{asset('image')}}/{{$employee->image}}" alt="{{$employee->name}}" style="max-width: 120px"></td>
                                    <td>{{DateThai($employee->created_at)}}</td>
                                    <td>
                                        <a href="/manage/edit/{{$employee->id}}"><button class="btn btn-warning">แก้ไข</button></a>
                                        <a href="/manage/delete/{{$employee->id}}" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่')"><button class="btn btn-danger">ลบ</button></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                        {{$employeeKey->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>