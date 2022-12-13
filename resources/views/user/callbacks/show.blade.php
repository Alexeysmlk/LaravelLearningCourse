@extends('layouts.foruser')

@section('content')
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-material mx-2">
                    <div class="form-group">
                        <label class="col-md-12">Title of request</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control form-control-line"
                                   value="{{$callback->title}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Text of request</label>
                        <div class="col-md-12">
                            <textarea class="form-control form-control-line" readonly>{{$callback->text}}</textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
