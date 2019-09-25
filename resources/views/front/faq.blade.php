
@extends('front.app')
@section('content')
    <section class="page-header">
        <div class="ph-img" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),   url('{{asset('public/front/img/ijen.jpg')}}') center no-repeat; background-size: cover">
            <h1 class="ph-title">Pilihan Destinasi</h1>
        </div>
        <style>
            .ui-state-active{
                background-color: #138496;
                border: unset;
            }
            .ui-accordion-header{
                padding: 70px;
                border-radius: unset;
            }
        </style>
    </section>
    <section class="content-sec">
        <div class="container">
            <div class="sec-title left">
                <h4>FAQ</h4>
            </div>
            <div class="sec-content">
                <div class="row">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="accordion">
                                <h3>Section 1</h3>
                                <div>
                                    <p>
                                    Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
                                    ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
                                    amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
                                    odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
                                    </p>
                                </div>
                                <h3>Section 2</h3>
                                <div>
                                    <p>
                                    Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
                                    purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
                                    velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
                                    suscipit faucibus urna.
                                    </p>
                                </div>
                                <h3>Section 3</h3>
                                <div>
                                    <p>
                                    Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
                                    Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
                                    ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
                                    lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
                                    </p>
                                    <ul>
                                    <li>List item one</li>
                                    <li>List item two</li>
                                    <li>List item three</li>
                                    </ul>
                                </div>
                                <h3>Section 4</h3>
                                <div>
                                    <p>
                                    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
                                    et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
                                    faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
                                    mauris vel est.
                                    </p>
                                    <p>
                                    Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
                                    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                                    inceptos himenaeos.
                                    </p>
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
    @section('custom-script')
   <script>
       $('#accordion').accordion()
   </script>
    @endsection