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
                    <div class="card">
                        <div class="card-header">ตารางข้อมูลแผนก</div>
                    </div>
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
