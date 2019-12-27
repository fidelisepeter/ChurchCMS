@extends('layouts.homeapp')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header border-0 bg-gradient-gray-dark">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0" style="color:white;">What kind of insights are you looking for? <i class="fas fa-pray"></i></h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="container pb-3">
                <div class="row">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0 shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Growth Insights</h5>
                                        <span class="h2 font-weight-bold mb-0"></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0 shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Income Insights</h5>
                                        <span class="h2 font-weight-bold mb-0"></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="fas fa-money-check-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0 shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Income</h5>
                                        <span class="h2 font-weight-bold mb-0"></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                            <i class="fas fa-hand-holding-usd"></i>                             </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0 shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Converts</h5>
                                        <span class="h2 font-weight-bold mb-0"></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                            <i class="fas fa-pray"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <p>On this page, you're given guidance/advice on what actions you  
                could take to help you, the administrator of your church, to increase your membership, 
                grow your income, attract more first timers, gain new converts and so much more.
            </p>
        </div>
    </div>
</div>
@endsection