<div class="modal fade" id="productModal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Product</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body modal-content">
                <div class="modal-ajax-content"></div>
{{--                {{ Form::model($product,['route' =>['products.update',$product->id],'method'=>"POST","id"=>"productForm","data-productid"=>$product->id,"data-type"=>2]) }}--}}
                <form enctype="multipart/form-data" method="POST" id="productForm" data-new-product="1">
                    @csrf
                    <input type="hidden" class="method" name="_method" value="POST">
                    @include("admin.products.form-product",['button'=>'Save'])
                </form>
            </div>
        </div>
    </div>
</div>
