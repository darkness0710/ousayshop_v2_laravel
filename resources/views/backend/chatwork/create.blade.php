@extends('layouts.master')
@section('content')
<div class="content-wrapper" style="min-height: 1342.88px;">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('chatworks.index') }}">Chatwork</a></li>
                    <li class="breadcrumb-item active">New schedule</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">New a schedule</h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="post" action="{{ route('chatworks.store') }}">
                @csrf   
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Group ID (*)</label>
                            <input type="text" name="group_id" class="form-control" placeholder="Enter ..." required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Time running(*)</label>
                                <select class="form-control" name="time_number">
                                    @foreach ($time_mapping as $index => $value)
                                        <option value="{{ $index }}">{{ $value }} </option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Message (*)</label>
                            <textarea class="form-control" name="message" rows="12" placeholder="Mesage ..." required></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
</section>
</div>
@endsection