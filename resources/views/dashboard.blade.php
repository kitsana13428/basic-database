<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">อีเมล์</th>
                            <th scope="col">เข้าสู่ระบบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $row)
                            <tr>
                                <th>{{$row->id}}</th>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
