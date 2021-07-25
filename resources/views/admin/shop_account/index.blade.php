@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper" style="min-height: 1342.88px;">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Chatwork Schedule</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <a class="btn btn-block btn-primary" href="{{ route('admin.shops.create') }}">Thêm mới</a>
                                </div>
                            </div>
                        </div>
                       @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên loại tài khoản</th>
                                        <th>Loại game</th>
                                        <th>Loại quốc gia</th>
                                        <th>Mô tả về tài khoản </th>
                                        <th>Thông tin bí mật tài khoản </th>
                                        <th>Giá </th>
                                        <th>Giá khuyến mại</th>
                                        <th>Sử dụng giá khuyến mại</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                @if ($shopAccounts->isEmpty())
                                    <td>No data!</td>
                                @endif
                                @foreach ($shopAccounts as $shop)
                                    <tbody>
                                        <tr>
                                            <td>{{ $shop->id }}</td>
                                            <td>{{ $shop->name }}</td>
                                            <td>{{ Arr::get($type, $shop->type) }}</td>
                                            <td>{{ Arr::get($typeRegion, $shop->type_region) }}</td>
                                            <td>{{ $shop->description }}</td>
                                            <td>{{ $shop->private_note }}</td>
                                            <td>{{ $shop->price }}</td>
                                            <td>{{ $shop->sale_price }}</td>
                                            @php
                                                $messageForSale = $shop->is_show_sale_price == true ? 'Đang sử dụng' : 'Không sử dụng';
                                            @endphp
                                            <td>{{ $messageForSale }}</td>
                                            <td>
                                                <form action="{{ route('admin.shops.destroy', $shop->id) }}" method="POST">   
                                                    <a class="btn btn-primary" href="{{ route('admin.shops.edit', $shop->id) }}">Chỉnh sửa</a>   
                                                    @csrf
                                                    @method('DELETE')      
                                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
