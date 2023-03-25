
@php $currentRoute = currentRoute() ;@endphp

<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">

            <li>
                <a class=" ai-icon" href="{{ $currentRoute == 'home' ? "#" : route('home') }}" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard </span>
                </a>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="javascript:void();" aria-expanded="false">
                    <i class="fa fa-cogs fa-2x"></i>
                    <span class="nav-text">Products</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('products.index') }}">All Products</a></li>
                </ul>
            </li>


        </ul>
        <div class="add-menu-sidebar">
{{--            <img src="{{ asset('adminFiles') }}/images/food-serving.png" alt="">--}}
            <p class="mb-3">Ripon Uddin</p>
            <span class="fs-12 d-block mb-3"> <a target="_blank" href="http://ruarman.com">http://ruarman.com</a> </span>
        </div>
        <div class="copyright">
            <p class="text-center"><strong>Web Application</strong> © {{ Date('Y') }} All Rights Reserved</p>
            <p>Made with <span class="heart"></span> by Ripon Uddin</p>
        </div>
    </div>
</div>
