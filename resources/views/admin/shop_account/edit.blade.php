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
                        <form class="form-horizontal" method="POST" id="form_shop" action="{{ route('admin.shops.update', $shop->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tên loại tài khoản (*)</label>
                                        <input type="text" name="name" class="form-control" placeholder="Ví dụ TN3Q-YOYO N188" value="{{ $shop->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Loại game(*)</label>
                                        <select class="form-control" name="type">
                                            @foreach ($type as $key => $value)
                                                @php
                                                    $checked = $shop->type == $key ? 'selected' : '';
                                                @endphp
                                                <option value="{{ $key }}" {{ $checked }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Loại quốc gia(*)</label>
                                        <select class="form-control" name="type_region">
                                            @foreach ($typeRegion as $key => $value)
                                                @php
                                                    $checked = $shop->type_region == $key ? 'selected' : '';
                                                @endphp
                                                <option value="{{ $key }}" {{ $checked }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Mô tả về tài khoản (*)</label>
                                        <textarea class="form-control" name="description" rows="12">{{ $shop->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Giá (*)</label>
                                        <input type="text" name="price" class="form-control" value="{{ $shop->price }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Giá khuyến mại</label>
                                        <input type="text" name="sale_price" class="form-control" value="{{ $shop->sale_price }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                  <!-- checkbox -->
                                  <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        {{-- {{ dd($shop) }} --}}
                                        @php
                                            $valueSale = 'true';
                                            if (!blank($shop->is_show_sale_price) && $shop->is_show_sale_price) {
                                                // $valueSale = 'true';
                                                $valueSaleChecked = 'checked';
                                            }
                                        @endphp
                                      <input name="is_show_sale_price" id="customCheckbox1" class="custom-control-input" type="checkbox" {{ $valueSaleChecked ?? '' }} value="{{ $valueSale }}">
                                      <label for="customCheckbox1" class="custom-control-label">Sử dụng giá khuyến mại</label>
                                    </div>
                                  </div>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        @include('admin.shop_account._dropzone', ['shop' => $shop])
                                        @include('admin.shop_account._dropzone', ['shop' => $shop])
                                        <input type="hidden" id="hidden_images" name="images" value="" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Thông tin bí mật của tài khoản (sẽ không hiển thị ở ngoài shop, có thể bỏ trống)</label>
                                        <textarea class="form-control" name="message" rows="12" >{{ $shop->private_note }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button onclick="myFunction()" type="submit" class="btn btn-primary">Cập nhật tài khoản</button>
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