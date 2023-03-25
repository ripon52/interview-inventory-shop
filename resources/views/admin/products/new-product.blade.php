@extends("admin.layouts.admin")

@section("title","Manage Products")

@section("heading","Manage Products")

@section("content")
    @include("admin.includes.admin.page-title",['title' => "Products"])

    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                @include("admin.includes.admin.template-header",
                [
                    "title" => "All Products",
                    "icon" => "fa fa-lists",
                    "routeText" => "All Product",
                    "route" => route('products.index')
                ])

                <div class="card-body">
                    {{ Form::open(['route' => 'products.store','method'=>"POST"]) }}
                        @include("admin.products.form-product",['button'=>'Save'])
                    {{ Form::close() }}
                </div>
            </div>
        </div>

    </div>
@endsection

@section("scripts")
@endsection
