@forelse($products as $key=>$product)

    {{--                                    {{ dd($product) }}--}}
    <tr>
        <td><strong>{!! $loop->iteration !!}</strong></td>
        <td>{{ $product->sku_code }}</td>
        <td>{{ $product->title }}</td>
        <td>{{ moneyIcon()." ". shopMoneyFormat($product->price)  }}</td>
        <td>
            {{--                                            <img src="{{ asset($product->thumbnail) }}" alt="">--}}
            {!! imagePreview($product->thumbnail) !!}
        </td>
        <td>  {!! showStatus($product->status) !!}</td>
        <td> {{ shopDateTimeFormat($product->created_at) }} </td>
        <td> {!! $product->creator->name !!} </td>
        <td> <span class="badge light badge-success">{!! $product->creator ? $product->creator->name : null !!}</span></td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                    <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                </button>
                <div class="dropdown-menu">

                    <button
                        type="button"
                        class="dropdown-item editProduct"
                        data-id="{{ $product->id }}"
                        data-url="{{ route('products.edit',$product->id) }}"
                    >
                        <i class="fa fa-edit btn btn-success  shadow  sharp mr-1"></i>
                    </button>

                    <button
                        type="button"
                        class="dropdown-item deleteProduct"
                        data-id="{{ $product->id }}"
                        data-url="{{ route('products.destroy',$product->id) }}"
                    >
                        <i class="fa fa-trash btn btn-danger  shadow  sharp mr-1"></i>
                    </button>


                </div>
            </div>
        </td>
    </tr>
@empty
@endforelse
