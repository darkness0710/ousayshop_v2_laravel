@extends('layouts.master')

@section('content')
    <div class="content-wrapper" style="min-height: 1342.88px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>General Form</h1>
                    </div>
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('chatworks.index') }}">Chatwork</a></li>
                            <li class="breadcrumb-item active">Setting Auth Api</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Setting API Token</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="{{ route('chatwork.setting.update') }}">
                            	@csrf	
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">API token</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="token"  id="inputEmail3" placeholder="API token" value="{{ $setting->token }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                                        @if ($status === true)
    	                                    <div class="text-success ml-3 text-uppercase">
    	                                        active
    	                                    </div>
                                        @endif
                                        @if ($status === false)
                                         	<div class="text-danger ml-3 text-uppercase">
    	                                        not active
    	                                    </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
