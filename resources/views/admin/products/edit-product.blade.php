@extends("admin.layouts.admin")

@section("title","Update Products")

@section("heading","Update Products")

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
                    {{ Form::model($product,['route' =>['products.update',$product->id],'method'=>"POST"]) }}
                    @method("PUT")
                     @include("admin.products.form-product",['button'=>'Update'])
                    {{ Form::close() }}
                </div>
            </div>
        </div>

    </div>
@endsection

@section("scripts")
@endsection
