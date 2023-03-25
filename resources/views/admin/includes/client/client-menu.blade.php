

<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">

            <li>
                <a class=" ai-icon" href="{{ currentRoute() === 'client.dashboard' ? "#" : route('client.dashboard') }}" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard </span>
                </a>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="javascript:void();" aria-expanded="false">
                    <i class="fa fa-ship fa-2x"></i>
                    <span class="nav-text">Export Bills</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('client.exportBill') }}">All Export Bills</a></li>
                </ul>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="javascript:void();" aria-expanded="false">
                    <i class="fa fa-money fa-2x"></i>
                    <span class="nav-text">Transaction Bank</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('client.paidInvoices') }}">All Paid History</a></li>
                </ul>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="javascript:void();" aria-expanded="false">
                    <i class="fa fa-bank fa-2x"></i>
                    <span class="nav-text">Report Bank</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('client.exportBill',['billReport'=>true]) }}">All Export Bills</a></li>
                    <li><a href="{{ route('client.paidInvoices',['paidReport'=>true]) }}">All Paid History</a></li>
                </ul>
            </li>



            <li class="mm-active">
                <a class=" ai-icon" href="{{ url('/') }}" target="_blank" aria-expanded="false">
                    <i class="fa fa-globe fa-2x"></i>
                    <span class="nav-text">Contact Mang. Sys.</span>
                </a>
            </li>

        </ul>
        <div class="add-menu-sidebar">
            {{--            <img src="{{ asset('adminFiles') }}/images/food-serving.png" alt="">--}}
            <p class="mb-3">Discuss BD</p>
            <span class="fs-12 d-block mb-3"> <a target="_blank" href="http://ruarman.com">www.ruarman.com</a> </span>
        </div>
        <div class="copyright">
            <p class="text-center"><strong>Web Application</strong> © {{ Date('Y') }} All Rights Reserved</p>
            <p>Made with <span class="heart"></span> by Discuss-BD</p>
        </div>
    </div>
</div>
