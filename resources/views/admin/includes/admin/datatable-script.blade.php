<!-- Datatable -->
<link
    href="{{ asset('adminFiles') }}/vendor/datatables/css/jquery.dataTables.min.css"
    rel="stylesheet"
/>

<!-- Custom Stylesheet -->
<link
    href="{{ asset('adminFiles') }}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css"
    rel="stylesheet"
/>



<!-- Datatable -->
<script src="{{ asset('adminFiles') }}/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('adminFiles') }}/js/plugins-init/datatables.init.js"></script>

<script>
    $(()=>{
        $(".table").dataTable();
       // $(".discussBDTable").dataTable();
    });
</script>
