@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper" style="min-height: 1342.88px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Shop tài khoản</a></li>
                            <li class="breadcrumb-item active">Màn thêm mới</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Thêm mới tài khoản</h3>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <form class="form-horizontal" method="post" id="form_shop" action="{{ route('admin.shops.store') }}">
                            @csrf   
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tên loại tài khoản (*)</label>
                                        <input type="text" name="name" class="form-control" placeholder="Ví dụ TN3Q-YOYO N188" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Loại game(*)</label>
                                        <select class="form-control" name="type">
                                            <option value="0">Thiếu niên 3Q VNG</option>
                                            <option value="1">Thiếu niên 3Q YOYO</option>
                                            <option value="2">Thiếu niên 3Q 9G</option>
                                            <option value="3">Tân OMG 3Q VNG</option>
                                            <option value="4">Tân OMG 3Q China</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Loại quốc gia(*)</label>
                                        <select class="form-control" name="type_region">
                                            <option value="0">Ngụy</option>
                                            <option value="1">Ngô</option>
                                            <option value="2">Thục</option>
                                            <option value="3">Quần</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Mô tả về tài khoản (*)</label>
                                        <textarea class="form-control" name="description" rows="12" placeholder="Ví dụ tài khoản trắng thông tin ..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Giá (*)</label>
                                        <input type="text" name="price" class="form-control" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Giá khuyến mại</label>
                                        <input type="text" name="sale_price" class="form-control" placeholder="Ví dụ TN3Q-YOYO N188" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                  <!-- checkbox -->
                                  <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                      <input name="is_show_sale_price" class="custom-control-input" type="checkbox" id="customCheckbox1" value="true">
                                      <label for="customCheckbox1" class="custom-control-label">Sử dụng giá khuyến mại</label>
                                    </div>
                                  </div>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        @include('admin.shop_account._dropzone')
                                        @include('admin.shop_account._dropzone')
                                        <input type="hidden" id="hidden_images" name="images" value="" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Thông tin bí mật của tài khoản (sẽ không hiển thị ở ngoài shop, có thể bỏ trống)</label>
                                        <textarea class="form-control" name="private_note" rows="12" placeholder="Ví dụ tài khoản, mật khẩu, ..." required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button onclick="myFunction()" type="submit" class="btn btn-primary">Tạo tài khoản</button>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
    </div>
    <script type="text/javascript">
        function myFunction() {
            $('#form_shop').submit();
        }
    </script>
@endsection