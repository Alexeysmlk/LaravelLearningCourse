@extends('layouts.my')

@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-5">
                    <h4 class="page-title">Dashboard</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Library</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Sales chart -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Sales chart -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Table -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- column -->
                <div class="col-12">
                    <div class="card">
                        <div class="d-flex justify-content-start">
                            <a href="{{route('admin.products.create')}}" class="btn btn-success p-4 ms-5">Add new product</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table v-middle">
                                <thead>
                                <tr class="bg-light">
                                    <th class="border-top-0">Id</th>
                                    <th class="border-top-0">Name</th>
                                    <th class="border-top-0">Category</th>
                                    <th class="border-top-0">Price</th>
                                    <th class="border-top-0">Picture</th>
                                    <th class="border-top-0">Status</th>
                                    <th class="border-top-0">Description</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->id_category}}</td>
                                    <td>{{\App\Models\Product::getRealPrice($product->price)}}</td>
                                    <td>
                                        <img src="{{$product->img}}" alt="picture of product">
                                    </td>
                                    <td>{{$product->status ? 'active' : 'not active'}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>
                                        <a href="{{route('admin.products.edit', ['product' => $product->id])}}" class="label label-danger">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $products->links('vendor.pagination.bootstrap-5') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer text-center">
            All Rights Reserved by Xtreme Admin. Designed and Developed by <a
                href="https://www.wrappixel.com">WrapPixel</a>.
        </footer>
    </div>
@endsection
