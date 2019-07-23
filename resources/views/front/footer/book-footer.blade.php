 <!-- my form ends-->
 <h6 class="logistic" style="display: none;"> : AVAILABLE RIDES :</h6>
 <div class="row_autolist"></div>
</div>
<!-- main mobile column ends -->
<div class="col-md-8 hidden-sm hidden-xs right-desk2 right-desk-gen">
   <div class="right-desk-content">
       <h3 class="white">We are always ready to help you.</h3>
       # My Thela For Web
   </div>
</div>
</div>
</div>
<!-- Modal -->
<div class="modal left fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-body">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <br/><br/>
               @if(Auth::user()) 
               <div class="top-menu">
                   <a href="{{route('book')}}"><i class="fa fa-bookmark" aria-hidden="true"></i> Book Now</a>
               </div>
               <div class="top-menu">
                   <a href="{{route('profile')}}"><i class="fa fa-user-circle-o" aria-hidden="true"></i> My Account</a>
               </div>
               <div class="top-menu">
                   <a href="{{route('active.booking')}}"><i class="fa fa-truck" aria-hidden="true"></i> Active Biddings <small>(Logistics)</small></a>
               </div>
               <div class="top-menu">
                   <a href="{{route('my.booking')}}"><i class="fa fa-cab" aria-hidden="true"></i> My Bookings</a>
               </div>
               <div class="top-menu">
                   <a href="javascript:void(0);" id="logout" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-power-off" aria-hidden="true"></i> Logout</a>
               </div>
               @else
               <div class="top-menu">
                   <a href="{{route('login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
               </div>
               @endif
               <div class="bottom-div">
                   <div class="row bot-row">
                       <div class="col-xs-6 text-left"><a target="_blank" href="terms-of-service.php">Terms Of Service</a></div>
                       <div class=" col-xs-6 text-right"> &copy; 2019</div>
                   </div>
                   <div class="dwnld-app"><i class="fa fa-download" aria-hidden="true"></i> Download App</div>
               </div>
           </div>
       </div>
       <!-- modal-content -->
   </div>
   <!-- modal-dialog -->
</div>
<!-- modal -->
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
   </style>        <script>
       $(document).ready(function(){
           $("#logout").click(function(){
               $('#myModal').modal('hide');
           });
       });
   </script>
   <style>
   .map-btn{    border: 1px solid #ccc;
       margin-top:8px;
   }
   .map-link{    font-weight: bold;
       text-decoration: none !important;
       float: right;
       position: relative;
       right: 10px;
       top: 9px;
   }
   .current-btn{    background: transparent;
       border: none;
       position: relative;
       top: 8px;}
       .inner-addon { 
           position: relative;     margin: 8px 0;
       }
       .powered{background-color:rgba(255,255,255,0.7);padding:10px;    border-radius: 4px;}
       /* style icon */
       .inner-addon .glyphicon {
           position: absolute;
           padding: 11px;
           font-size: 17px;
           pointer-events: none;
           color:#000;
       }
       /* align icon */
       .left-addon .glyphicon  { left:  0px;}
       .right-addon .glyphicon { right: 0px;}
       /* add padding  */
       .left-addon input  { padding-left:  35px; }
       .right-addon input { padding-right: 30px; }
       .height40{height:40px; background-color:rgba(255,255,255,0.7);width:100%;color:#000;border-radius: 6px;border-width: 1px;}
       .height41{height:40px; background-color:rgba(255,255,255,0.98);color:#000;border-radius: 6px;border-width: 1px;    position: absolute;
           width: 89%;    top: 155px;}
       </style>
       <style>
       .top-menu{padding:7px;margin-bottom:6px;width:100%;background-color:rgba(0,0,0,0.6);}
       .top-menu a{color:#fff;text-decoration:none !important;}
       .dwnld-app{background-color:rgba(0,0,0,0.6);color:#fff;text-align:center;padding:10px 0px;font-size:16px;}
       .bottom-div{position:fixed;bottom:0px;left:0px;width:100%;}
       .bot-row{padding:10px;}
       .modal.left .modal-dialog,
       .modal.right .modal-dialog {
           position: fixed;
           margin: auto;
           width: 300px;
           height: 100%;
           -webkit-transform: translate3d(0%, 0, 0);
           -ms-transform: translate3d(0%, 0, 0);
           -o-transform: translate3d(0%, 0, 0);
           transform: translate3d(0%, 0, 0);
       }
       .modal.left .modal-content,
       .modal.right .modal-content {
           height: 100%;
           overflow-y: auto;
       }
       .modal.left .modal-body,
       .modal.right .modal-body {
           padding: 15px 15px 80px;
       }
       /*Left*/
       .modal.left.fade .modal-dialog{
           left: -300px;
           -webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
           -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
           -o-transition: opacity 0.3s linear, left 0.3s ease-out;
           transition: opacity 0.3s linear, left 0.3s ease-out;
       }
       .modal.left.fade.in .modal-dialog{
           left: 0;
       }
       /* ----- MODAL STYLE ----- */
       .modal-content {
           border-radius: 0;
           border: none;
       }
       #map-logis .centerMarker {
           position: absolute;
           /*url of the marker*/
           background: url(http://maps.gstatic.com/mapfiles/markers2/marker.png) no-repeat;
           /*center the marker*/
           top: 50%;
           left: 50%;
           z-index: 1;
           /*fix offset when needed*/
           margin-left: -10px;
           margin-top: -34px;
           /*size of the image*/
           height: 34px;
           width: 20px;
           cursor: pointer;
       }
   </style>
   <script>
       var Privileges = jQuery('#logi-sch');
       var select = this.value;
       Privileges.change(function () {
           if ($(this).val() == 'schedule_for_later') {
               $('.depart').show();
               $('.depart_date, .depart_time').prop('required',true);
           }else{
               $('.depart').hide(); // hide div if value is not "custom"
               $('.depart_date, .depart_time').prop('required',false);
           }
});
</script>
<script>
   $(document).on('click', '.book-ul > a > span', function(){
       $('.book-ul > a > span').removeClass('active-btn');
       $(this).addClass('active-btn');
       $('.div-map-li, .step2pickup-incity, .map-incity, .step3drop-incity, .outstep2, .outstep3, .map-out, .step2logistic, .step3logistic, .step4logistic, .step5logistic, .map-logis, .rentalstep2, .map-rental').hide();
       $('.'+$(this).parent().attr('div-act')).show();
   });
   $(document).on('click', '.pickincity', function(){
       $('.step1-incity').hide();
       $('.step2pickup-incity, .map-incity, .current-loc-incity').show();
   });
   $(document).on('click', '.backbtn-incity', function(){
       $('.step1-incity').show();
       $('.step2pickup-incity, .map-incity, .current-loc-incity, .step3drop-incity').hide();
   });
   $(document).on('click', '.confirm-loc-incity', function(){
       $('.backbtn-incity').trigger('click');
   });
   $(document).on('click', '.dropincity', function(){
       $('.step1-incity').hide();
       $('.step3drop-incity, .map-incity').show();
   });
 //for out
 $(document).on('click', '.pickup-out', function(){
   $('.outstep1').hide();
   $('.outstep2, .map-out, .current-out').show();
});
 $(document).on('click', '.back2out', function(){
   $('.outstep1').show();
   $('.outstep2, .map-out, .current-out, .outstep3').hide();
});
 $(document).on('click', '.confirm-loc-out', function(){
   $('.back2out').trigger('click');
});
 $(document).on('click', '.drop-out', function(){
   $('.outstep1').hide();
   $('.outstep3, .map-out').show();
});
 //for transport
 $(document).on('click', '.pickup-logistic', function(){
   $('.step1logistic').hide();
   $('.confirm-loc-logistic').attr('confirm-act', 'picuploc-logis');
   $('.step2logistic, .map-logis, .current-loc').show();
   initialize($("#pickup-lat").val(), $("#pickup-long").val());
});
 $(document).on('click', '.back2logistic', function(){
   $('.step1logistic').show();
   $('.step2logistic, .map-logis, .current-loc, .step3logistic, .step5logistic, .step4logistic').hide();
});
 $(document).on('click', '.confirm-loc-logistic', function(){
   var it_html=$(this).attr('confirm-act');
   $('.'+it_html).val($('#'+it_html).val());
   $('.back2logistic').trigger('click');
});
 $(document).on('click', '.drop-logistic', function(){
   $('.step1logistic').hide();
   $('.confirm-loc-logistic').attr('confirm-act', 'droploc-logis');
   $('.step3logistic, .map-logis').show();
   initialize($("#drop-lat").val(), $("#drop-long").val());
});
 $(document).on('click', '.mat', function(){
   $('.step1logistic, .step2logistic, .step3logistic,.step4logistic').hide();
   $('.step5logistic').show();
});
/* $(document).on('click', '.veh', function(){
   $('.step1logistic, .step2logistic, .step3logistic,.step5logistic').hide();
   $('.step4logistic').show();
});*/
 //for rental
 $(document).on('click', '.pickup-rental', function(){
   $('.rentalstep1').hide();
   $('.rentalstep2, .map-rental, .current-loc-rental').show();
});
 $(document).on('click', '.back2rental', function(){
   $('.rentalstep1').show();
   $('.rentalstep2, .map-rental, .current-loc-rental').hide();
});
 $(document).on('click', '.confirm-loc-rental', function(){
   $('.back2rental').trigger('click');
});
</script>
<script>
   $(document).on('click', '.fleet-img3', function(){
       $('.veh_type').val($(this).text());
       $('.back2logistic').trigger('click');
   });
   $(document).on('click', '.material-ul > li', function(){
       $('.mat_type').val($(this).text());
       $('.back2logistic').trigger('click');
   });
   $(document).on('submit', '#logistic-form', function(event){
       event.preventDefault();
       var data_all=$('#logistic-form').serialize()+'&picup_lat='+$("#pickup-lat").val()+'&picup_long='+$("#pickup-long").val()+'&drop_lat='+$("#drop-lat").val()+'&drop_long='+$("#drop-long").val()+'&pickup_from='+$(".picuploc-logis").val()+'&drop_to='+$(".droploc-logis").val();
       $.ajax({
           type: "post",
           url: "{{route('booking')}}",
           data:data_all,
           success: function(response){
             if(response.action=='auth'){
               $('#booking-id').val(response.data.id);
               var html='<div class="alert alert-success"><strong>Success!</strong> You should <a href="{{route('active.booking')}}" class="alert-link">check status for this bidding</a>.</div>';
               $('#logistic-form').html('<center style="margin:10px">'+html+'</center>');
             }
             if(response.action=='notauth'){
               window.location = "{{route('login')}}";
             }
           }
       });
   });
</script>
</body>
</html>