<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            สวัสดีคุณ {{Auth::user()-> name}}
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
               <div class="col-md-8">
                    @if(session("success"))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif

                    <!--ตารางข้อมูลหลัก ↓-->
                    <div class="card">
                        <div class="card-header">ตารางข้อมูลบริการ</div>
                            <table class="table ">
                                <thead class="table-dark">
                                    <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">ภาพประกอบ</th>
                                    <th scope="col">ชื่อบริการ</th>
                                    <th scope="col">เวลาบันทึก</th>  
                                    <th scope="col">แก้ไขข้อมูล</th>   
                                    <th scope="col">ลบข้อมูล</th>                                 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $row)
                                    <tr>
                                        <th>{{$services->firstItem()+$loop->index}}</th>
                                        <td>
                                            <img src="{{asset($row->service_image)}}" alt="" width="200px" heigth="200px">
                                        </td>
                                        <td>{{$row->service_name}}</td>
                                        <td>
                                            @if($row->created_at == NULL)
                                                ไม่มีข้อมูล
                                            @else
                                                {{Carbon\Carbon::parse($row->created_at)->diffForHumans()}}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('/service/edit/'.$row->id)}}" class="btn btn-info">แก้ไข</a>
                                        </td>
                                        <td>
                                        <a href="{{url('/service/delete/'.$row->id)}}" 
                                        class="btn btn-warning"
                                        onclick="return confirm('ต้องการลบข้อมูลหรือไม่ ?')"
                                        >ลบ</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$services->links()}}
                    </div>
                   
               </div>
               <div class="col-md-4">
               <div class="card">
                        <div class="card-header">แบบฟอร์มบริการ</div>
                        <div class="card-body">
                            <form action="{{route('addService')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <!--อัพข้อมูลลง ↓-->
                                <div class="form-group">
                                    <label for="service_name">ชื่อบริการ</label>
                                    <input type="text" class="form-control" name="service_name">
                                </div>
                            @error('service_name')
                                <div class="my-2">
                                    <span class="text-danger">{{$message}}</span>
                                </div>
                            @enderror

                            <!--อัพรูปลง ↓-->
                            <div class="form-group">
                                    <label for="service_image">ภาพประกอบ</label>
                                    <input type="file" class="form-control" name="service_image">
                                </div>
                            @error('service_image')
                                <div class="my-2">
                                    <span class="text-danger">{{$message}}</span>
                                </div>
                            @enderror
                                <br>
                                <input type="submit" value="บันทึก" class="btn btn-success">
                            </form>        
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</x-app-layout>
