@extends('layouts.foruser')

@section('content')
    <h3>Your requests</h3>
    <table class="table v-middle">
        <thead>
        <tr class="bg-light">
            <th class="border-top-0">Title of request</th>
            <th class="border-top-0">Text of request</th>
            <th class="border-top-0">Data of request</th>
            <th class="border-top-0">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($callbacks as $callback)
        <tr>
            <td>{{$callback->title}}</td>
            <td>{{$callback->text}}</td>
            <td>{{$callback->created_at}}</td>
            <td>
                <a href="{{route('user.callbacks.show', ['callback' => $callback])}}" class="btn btn-cyan text-white">View</a>
            </td>
        </tr>
        @endforeach
        </tbody>
        {{$callbacks->links('vendor.pagination.bootstrap-5')}}
    </table>
    <div class="col-sm-12">
        <a href="{{route('user.callbacks.create')}}" class="btn btn-success text-white">Add new request</a>
    </div>
@endsection
