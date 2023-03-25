@extends("admin.layouts.admin")

@section("title","Manage Products")

@section("heading","Manage Products")

@section("content")
    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                @include("admin.includes.admin.template-header",
                [
                    "title" => "All Products",
                    "icon" => "fa fa-plus",
                    "routeText" => "New Product",
                    "route" => route('products.create')
                ])

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                            <tr>
                                <th >#</th>
                                <th>SKU-Code</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Created By</th>
                                <th>Manage</th>
                            </tr>
                            </thead>
                            <tbody class="productsTbody">
                                @include("admin.products.ajax.ajax-products")
                            </tbody>
                        </table>
{{--                        {!! $products->count() ? $products->links() : false !!}--}}
                    </div>
                </div>
                @include("admin.products.modal.modal-form-product")


            </div>
        </div>

    </div>
@endsection

@section("scripts")
    <script src="{{ asset('backend') }}/js/sweetalert.min.js"></script>
    <script>

        window.token = "{{ csrf_token() }}";
        window.newProduct = true;

        $(()=>{
            setTimeout(function () {
               // getAll();
            },500)
        })


        async function getAll(){
            await $.get(" {{ route(currentRoute()) }}")
                .then((response)=>{
                    console.log(`Get ALL Server response is : ${response}`);

                    $(".productsTbody").append(response);
                })
                .catch();
        }

        $(document).on("click",".editProduct",function (e) {
            let id  = $(this).data("id");
            let url = $(this).data("url");

            $("#productModal").modal("show");
            findByProductId(id,url);
            window.newProduct = !window.newProduct;
        })


        $(document).on("click",".newProduct",function (e) {
            window.newProduct = true;
            formReset();
            $("#productModal").modal("show");
        })

        async function findByProductId(id,url){
            await $.get(url)
                .then(response=>{
                    console.log(`Server response is : ${response}`);
                    let data = response.data;

                    $("#productForm").attr("href","{{ route('products.index') }}" +"/"+id);
                    $(".method").val("PUT");

                    $(".title").val(data.title);
                    $(".sku_code").val(data.sku_code);
                    $(".price").val(data.price);
                    $(".details").val(data.details);
                    $(".status").val(data.status);

                    $(".saveButton").val("Update");

                })
                .catch();
        }

        function formReset(){
            $(".title").val(null);
            $(".sku_code").val(null);
            $(".price").val(null);
            $(".details").val(null);
            $(".status").val(null);
            $(".productImage").val(null);
        }

        $("#productForm").submit(function (e) {
            e.preventDefault();

            let title    = $(".title").val();
            let sku_code = $(".sku_code").val();
            let price    = $(".price").val();
            let details  = $(".details").val();
            let status   = $(".status").val();
            let image    = $(".productImage").prop('files')[0] ?? null;

            var formData = new FormData();
            formData.append('title',title);
            formData.append('sku_code',sku_code);
            formData.append('price',price);
            formData.append('details',details);
            formData.append('status',status);
            formData.append('image',image);
            formData.append("_token", window.token);
            formData.append("_method", $(".method").val());

           // let formData = new FormData(this);
            let url = $(this).attr("href");

            console.log(`URL : ${url} And Form Data ${formData}`);

            submitForm(url, formData);

        });

        async function submitForm(url,payloads){

            await $.ajax({
                method      : "POST",
                url         : url,
                data        : payloads,
                processData : false,
                contentType : false,
                cache       : false,
                dataType    : "json",
                success:function (res) {
                    console.log(`server response  Code ${res.code}`);
                    if(res.code && res.code == 405){
                        let data = res.data;

                        console.log(data.sku_code, data.sku_code[0]);
                        (data.title     ?  $(".title_error").text(data.title[0]) : false);
                        (data.sku_code  ?  $(".sku_code_error").text(data.sku_code[0]) : false);
                        (data.price     ?  $(".price_error").text(data.price[0]) : false);
                        (data.details   ?  $(".details_error").text(data.details[0]) : false);
                        (data.image     ?  $(".productImage_error").text(data.image[0]) : false);
                        notifyMessage("Validation Error","warning");

                        return ;
                    }
                    else{
                        console.log(`Updating Server response is : ${res}`);
                        $(".productsTbody").html(null);
                        $(".productsTbody").append(res.data);
                        window.newProduct = !window.newProduct;

                        notifyMessage(res.message,"success");

                        formReset();
                        $("#productModal").modal("hide");
                    }
                }
            });
        }



        $(document).on("click",".deleteProduct",function (e) {
            let id = $(this).data("id");
            let url = $(this).data("url");

            Swal.fire({
                title:" Are you sure?" ,
                text: "You won\'t be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteProduct(id,url);
                }
            })
        })

        async function deleteProduct(id,url){

            const payloads = {
                _token: window.token,
                _method : "DELETE",
                id : id
            };

            await $.ajax({
                url      : url,
                method   : "POST",
                data     : payloads,
                dataType : "json",
                success  : function (res) {

                    if(res.code == 200) {
                        notifyMessage(res.message,"warning");
                    }

                    if(res.code == 201){
                        notifyMessage(res.message,"success");

                        $(".productsTbody").html(null);
                        $(".productsTbody").append(res.data);
                        $("#productModal").modal("hide");
                    }

                },
                error: function (request, status, error) {

                    console.log(`Error : ${request.message} ${status} ,,${error}`);

                }
            })
        }


        function notifyMessage(message, status){
            $.notify(
                message,{
                    globalPosition: 'bottom right',
                    className : status
                }) ;
        }

    </script>
@endsection

