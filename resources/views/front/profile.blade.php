@extends('layouts.app-login')
@section('content')
<!-- profile-->
<div class="row">
    <div class="col-xs-12">
        <a href="{{route('book')}}">
            <div class="back"><i class="fa fa-long-arrow-left"></i></div>
        </a>
    </div>
</div>
<div class="row text-center">
    <div class="col-xs-12">
        <i class="fa fa-user-circle user-dp" aria-hidden="true"></i><br/>
        <h3>{{Auth::user()['fullname']}}</h3>
        <h4>{{Auth::user()['mobile']}}</h4>
        <br/>
        <div class=" border">
            <a href="{{route('my.booking')}}"><i class="fa fa-cab"></i> My Bookings</a>
        </div>
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><i class="fa fa-inr"></i> My Wallet</a>
                    </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="money"><i class="fa fa-inr"></i><b> {{$ulist['wallet']['amount']}} /- </b></div>
                        <p class="para">Current Wallet Balance</p>
                        <div class="row">
                            <div class="col-xs-6"><a href="{{route('add.money')}}" class="btn btn-skin2 btn-block"> <i class="fa fa-plus"></i> Add Money</a></div>
                            <div class="col-xs-6"><a href="{{route('send.money')}}" class="btn btn-skin2 btn-block"> <i class="fa fa-share"></i> Send Money</a></div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-xs-12 text-center">
                            <a href="{{route('wallet.history')}}" class="btn btn-skin2" style="width:50%;"> <i class="fa fa-inr"></i> Transaction History</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="border">
            <a class="red" href="javascript:void(0);"><i class="fa fa-address-card-o" aria-hidden="true"></i> Complete KYC</a>
        </div>
        <div class="border" style="display:none;">
            <a class="blue"><i class="fa fa-address-card-o" aria-hidden="true"></i> KYC Pending <small>for approval</small> </a>
        </div>
        <div class="border" style="display:none;">
            <a class="green"><i class="fa fa-check-circle-o"></i> KYC Completed</a>
        </div>
        <div class="border">
            <a class="logout" href="#"  data-toggle="modal" data-target="#logoutModal"><i class="fa fa-power-off"></i> Logout</a>
            <!-- Logout Modal -->
            <div id="logoutModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content modal-contenttt text-center">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Confirm Logout</h4>
                        </div>
                        <div class="modal-body">
                            <h5>Are you sure you want to Logout ?</h5>
                            <br/>
                            <button type="button" class="btn btn-default thela-btn1" data-dismiss="modal">Cancel</button>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="btn btn-danger thela-btn2">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <style>
            .thela-btn1{width:50%;float:left;border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-right-radius:0px;padding: 7px 0px;
                font-size: 18px;font-weight: 500;}
                .thela-btn2{width:50%;float:right;border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;padding: 7px 0px;
                    font-size: 18px;}
                    .modal-contenttt {border-bottom-left-radius:0px;border-bottom-right-radius:0px;    margin-top: 20%;}
                    .modal-body {
                        position: relative;
                        padding: 0px;
                    }
                </style>                           
            </div>
        </div>
    </div>
    <!--row ends-->
    @endsection