@extends('home')
@section('title', 'Danh sách tỉnh thành')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h1>Danh Sách Khách Hàng</h1>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên tỉnh thành</th>
                    <th scope="col">Số khách hàng</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($cities as $key => $city)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $city->name }}</td>
                            <td>{{ count($city->customers) }}</td>
                            <td><a href="{{route('city.edit', $city->id)}}">sửa</a></td>
                            <td><a href="{{route('city.destroy', $city->id)}}" class="text-danger"
                                   onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{route('city.create')}}">Thêm mới</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 col-md-offset-5" >
            {{ $cities->appends(request()->query()) }}
        </div>
    </div>
@endsection