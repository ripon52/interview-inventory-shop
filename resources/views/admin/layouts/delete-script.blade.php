<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    $(document).on("click",".erase",function (e){
        e.preventDefault();

        let url = $(this).attr("data-href");
        let id  = $(this).attr('data-id'); // $(this).data('id');
        let method =  $(this).data('method');


        Swal.fire({
            title:"Are you sure?" ,
            text: 'Data will be delete permanently',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes! Delete'
        }).then((result) => {
            if (result.isConfirmed) {
                dynamicDeleteMethod(url, id, method);
                $(this).closest("tr").remove();
            }
        })

    })

    /**
     * incomingParameters first Delete URL, second Row ID, Third Method
     * */
    async function dynamicDeleteMethod(url, id, method){

        const payloads = {
            _token  : "{{ csrf_token() }}",
            _method : method,
            id      : id
        };
        await $.ajax({
            method : "POST",
            url : url,
            data : payloads,
            dataType : "JSON",
            success:function (res) {
                console.log(res.message)
                Swal.fire(
                    'Success!, Data successfully deleted.',
                    res.message,
                    'success'
                )

            },
            error:function (err) {
                console.log("Error",err);
            }
        });

        console.log("Running from Dynamic Delete Method core script", url, id);
    }
</script>
