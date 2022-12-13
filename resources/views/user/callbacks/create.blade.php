@extends('layouts.foruser')

@section('content')
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-material mx-2" method="post"
                    action="{{route('user.callbacks.store')}}">
                    @csrf
                    <div class="form-group">
                        <label class="col-md-12">Title of request</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="title"
                                   class="form-control form-control-line"
                                   name="title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Text of request</label>
                        <div class="col-md-12">
                            <textarea name="text" class="form-control form-control-line" placeholder="Text of request"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-success text-white">Send request</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
