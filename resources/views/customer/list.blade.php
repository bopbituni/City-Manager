@extends('home')
@section('title', 'Danh sách khách hàng')

@section('content')

    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h1 align="center">Danh Sách Khách Hàng</h1>
            </div>
            <a class="btn btn-outline-primary" href="" data-toggle="modal" data-target="#cityModal">
                <button>Lọc</button>
            </a>
            <div class="col-12">
                @if (Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>
                        {{ Session::get('success') }}
                    </p>
                @endif

                @if(isset($totalCustomerFilter))
                    <span class="text-muted">
                    {{'Tìm thấy' . ' ' . $totalCustomerFilter . ' '. 'khách hàng:'}}
                </span>
                @endif

                @if(isset($cityFilter))
                    <div class="pl-5">
                   <span class="text-muted"><i class="fa fa-check" aria-hidden="true"></i>
                       {{ 'Thuộc tỉnh' . ' ' . $cityFilter->name }}</span>
                    </div>
                @endif
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tỉnh thành</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($customers) == 0)
                    <tr>
                        <td colspan="7" class="text-center">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($customers as $key => $customer)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->city->name }}</td>
                            <td><a href="{{ route('customers.edit', $customer->id) }}">sửa</a></td>
                            <td><a href="{{ route('customers.destroy', $customer->id) }}" class="text-danger"
                                   onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{ route('customers.create') }}">Thêm mới</a>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="cityModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <form action="{{ route('customers.filterByCity') }}" method="get">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <!--Lọc theo khóa học -->
                            <div class="select-by-program">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label border-right">Lọc khách hàng theo tỉnh
                                        thành</label>
                                    <div class="col-sm-7">
                                        <select class="custom-select w-100" name="city_id">
                                            <option value="">Chọn tỉnh thành</option>
                                            @foreach($cities as $city)
                                                @if(isset($cityFilter))
                                                    @if($city->id == $cityFilter->id)
                                                        <option value="{{$city->id}}"
                                                                selected>{{ $city->name }}</option>
                                                    @else
                                                        <option value="{{$city->id}}">{{ $city->name }}</option>
                                                    @endif
                                                @else
                                                    <option value="{{$city->id}}">{{ $city->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- </form> -->
                            </div>
                            <!--End-->

                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="submitAjax" class="btn btn-primary">Chọn</button>
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Hủy</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 col-md-offset-5" >
            {{ $customers->appends(request()->query()) }}
        </div>
    </div>
@endsection