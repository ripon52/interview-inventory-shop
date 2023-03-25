<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            {{ Form::label('Title') }}
            {{ Form::text('title',null,['class'=>'form-control title']) }}
            @include("admin.includes.admin.error",['title'=>'title'])
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-group">
            {{ Form::label('SKU-Code') }}
            {{ Form::text('sku_code',null,['class'=>'form-control sku_code']) }}
            @include("admin.includes.admin.error",['title'=>'sku_code'])
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-group">
            {{ Form::label('Price') }}
            {{ Form::number('price',null,['class'=>'form-control price']) }}
            @include("admin.includes.admin.error",['title'=>'price'])
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::select('status',activeInactiveOptions(),false,['class'=>'form-control status']) }}
            @include("admin.includes.admin.error",['title'=>'status'])
        </div>
    </div>

    <div class="col-lg-12">
        <div class="form-group">
            {{ Form::label('Image') }}
            {{ Form::file('productImage',['class'=>'form-control productImage']) }}
            @include("admin.includes.admin.error",['title'=>'productImage'])
        </div>
    </div>

    <div class="col-lg-12">
        <div class="form-group">
            {{ Form::label('Details') }}
            {{ Form::textarea('details',null,['class'=>'form-control details','rows'=>5,"cols"=>5]) }}
            @include("admin.includes.admin.error",['title'=>'details'])
        </div>
    </div>

    {{ Form::submit($button,['class'=>'btn btn-primary btn-block saveButton']) }}
</div>

