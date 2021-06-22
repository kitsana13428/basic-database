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
                        <div class="card-header">แบบฟอร์มแก้ไขข้อมูล</div>
                        <div class="card-body">
                            <form action="" method="post">
                            @csrf
                            <!--ข้อความ ↓-->
                                <div class="form-group">
                                    <label for="service_name">ชื่อบริการ</label>
                                    <input type="text" class="form-control" name="service_name" value="{{$service->service_name}}">
                                </div>
                            @error('service_name')
                                <div class="my-2">
                                    <span class="text-danger">{{$message}}</span>
                                </div>
                            @enderror

                            <!--รูปภาพ ↓-->
                            <div class="form-group">
                                    <label for="service_image">ภาพประกอบ</label>
                                    <input type="file" class="form-control" name="service_image" value="{{$service->service_image}}">
                                </div>
                            @error('service_image')
                                <div class="my-2">
                                    <span class="text-danger">{{$message}}</span>
                                </div>
                            @enderror
                                <br>
                                <div class="form-group">
                                    <img src="{{asset($service->service_image)}}" alt="" width="500px" height="500px">
                                </div>
                                <br>

                                <input type="submit" value="อัพเดต" class="btn btn-success">
                            </form>   
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</x-app-layout>