@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper" style="min-height: 1342.88px;">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Quản lí user</h3>
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
                                        <th>Tên</th>
                                        <th>Avatar URL</th>
                                        <th>Ngày tham gia</th>
                                    </tr>
                                </thead>
                                @if ($users->isEmpty())
                                    <td>Chưa có dữ liệu để hiển thị!</td>
                                @endif
                                @foreach ($users as $user)
                                    <tbody>
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->avatar_fb }}</td>
                                            <td>{{ $user->getTimeJoin() }}</td>
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
