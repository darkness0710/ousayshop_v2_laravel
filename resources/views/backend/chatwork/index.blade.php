@extends('layouts.master')

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
                                    <a class="btn btn-block btn-primary" href="{{ route('chatworks.create') }}">New schedule</a>
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
                                        <th>No</th>
                                        <th>Time</th>
                                        <th>Group ID</th>
                                        <th>Message</th>
                                        <th>Check connection</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @if ($schedules->isEmpty())
                                    <td>No data!</td>
                                @endif
                                @foreach ($schedules as $schedule)
                                    <tbody>
                                        <tr>
                                            <td>{{ ++$loop->index }}</td>
                                            <td>{{ Arr::get($time_mapping, $schedule->time_number) }}</td>
                                            <td><a href="https://www.chatwork.com/#!rid{{ $schedule->group_id }}">{{ $schedule->group_id }}</a></td>
                                            <td>{{ $schedule->message }}</td>
                                            <td>
                                                @if (in_array($schedule->group_id, $roomIds))
                                                    <span class="text-success">Active</span>
                                                @else
                                                    <span class="text-danger">Fail</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('chatworks.destroy', $schedule->id) }}" method="POST">   
                                                    {{-- <a class="btn btn-primary" href="{{ route('posts.edit', $schedule->id) }}">Edit</a>    --}}
                                                    @csrf
                                                    @method('DELETE')      
                                                    <button type="submit" class="btn btn-danger">Delete</button>
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
