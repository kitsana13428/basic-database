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
                        <div class="card-header">ตารางข้อมูลแผนก</div>
                            <table class="table ">
                                <thead class="table-dark">
                                    <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">ชื่อแผนก</th>
                                    <th scope="col">รหัสผู้ใช้งาน</th>
                                    <th scope="col">เวลาบันทึก</th>  
                                    <th scope="col">แก้ไขข้อมูล</th>   
                                    <th scope="col">ลบข้อมูล</th>                                 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departments as $row)
                                    <tr>
                                        <th>{{$departments->firstItem()+$loop->index}}</th>
                                        <td>{{$row->department_name}}</td>
                                        <td>{{$row->user->name}}</td>
                                        <td>
                                            @if($row->created_at == NULL)
                                                ไม่มีข้อมูล
                                            @else
                                                {{Carbon\Carbon::parse($row->created_at)->diffForHumans()}}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('/department/edit/'.$row->id)}}" class="btn btn-info">แก้ไข</a>
                                        </td>
                                        <td>
                                        <a href="{{url('/department/softdelete/'.$row->id)}}" class="btn btn-warning" onclick="return confirm('ต้องการลบข้อมูลหรือไม่ ?')">ลบ</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$departments->links()}}
                    </div>

                    <!--ถังขยะ ถ้าไม่มีข้อมุลจะไม่แสดง ↓-->
                @if (count($trashDepartments)>0)
                <div class="card my-2">
                        <div class="card-header">ถังขยะ</div>
                                <table class="table ">
                                    <thead class="table-dark">
                                        <tr>
                                        <th scope="col">ลำดับ</th>
                                        <th scope="col">ชื่อแผนก</th>
                                        <th scope="col">รหัสผู้ใช้งาน</th>
                                        <th scope="col">เวลาบันทึก</th>  
                                        <th scope="col">กู้คืนข้อมูล</th>   
                                        <th scope="col">ลบข้อมูล</th>                                 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($trashDepartments as $row)
                                        <tr>
                                            <th>{{$trashDepartments->firstItem()+$loop->index}}</th>
                                            <td>{{$row->department_name}}</td>
                                            <td>{{$row->user->name}}</td>
                                            <td>
                                                @if($row->created_at == NULL)
                                                    ไม่มีข้อมูล
                                                @else
                                                    {{Carbon\Carbon::parse($row->created_at)->diffForHumans()}}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{url('/department/restore/'.$row->id)}}" class="btn btn-info">กู้คืน</a>
                                            </td>
                                            <td>
                                            <a href="{{url('/department/delete/'.$row->id)}}" class="btn btn-danger" onclick="return confirm('ต้องการลบข้อมูลหรือไม่ ?')">ลบ</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$trashDepartments->links()}}
                    </div>
                @endif
                   
               </div>
               <div class="col-md-4">
               <div class="card">
                        <div class="card-header">แบบฟอร์ม</div>
                        <div class="card-body">
                            <form action="{{route('addDepartment')}}" method="post">
                            @csrf
                                <div class="form-group">
                                    <label for="department_name">ชื่อตำแหน่งงาน</label>
                                    <input type="text" class="form-control" name="department_name">
                                </div>
                            @error('department_name')
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
