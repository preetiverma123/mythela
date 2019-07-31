@extends('layouts.app-book')
@section('content')
        <!-- profile-->
        <div class="row rome" style="background-color:#fff;">
            <div class="col-xs-12">
                <a href="{{url('profile')}}">
                    <div class="back"><i class="fa fa-long-arrow-left"></i></div>
                </a>
                <h4><i class="fa fa-address-card-o" aria-hidden="true"></i> Complete KYC</h4>
            </div>
        </div>

        <div class="row text-center">
            <form method="post">
                {{csrf_field()}}
                <div class="col-xs-12">
                    @if(Session::get('msg'))
                    <div class="alert alert-{{Session::get('msg')['type']}} alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button> 
                      <strong>{{Session::get('msg')['text']}}</strong>
                    </div>
                    @endif
                    <br/>
                    <select  class="login-input2">
                        <option>Select ID Type</option>
                        <option>Aadhar</option>
                        <option>Voter ID</option>
                        <option>Driving License</option>
                        <option>PAN</option>
                    </select>
                    <input type="tel" maxlength="14" class="login-input" placeholder="Enter ID No." required="">
                   
                                <!--file -->
    <!--                           <label for="file-upload" class="custom-file-upload">-->
    <!--    <i class="fa fa-cloud-upload"></i> Upload Image-->
    <!--  </label>-->
    <!--  <input id="file-upload" name='upload_cont_img' type="file" style="display:none;">-->
    <!--  <script>-->
    <!--  $('#file-upload').change(function() {-->
    <!--  var i = $(this).prev('label').clone();-->
    <!--  var file = $('#file-upload')[0].files[0].name;-->
    <!--  $(this).prev('label').text(file);-->
    <!--});-->
    <!--</script>-->
    <!--<style>-->
    <!--.custom-file-upload {-->
    <!--    margin-bottom:15px;-->
    <!--  border: 1px solid #ccc;-->
    <!--  display: inline-block;-->
    <!--  padding: 6px 12px;-->
    <!--  cursor: pointer;-->
    <!--}-->
    <!--</style>-->
                    <!--file-->
                    <button tyle="submit" class="btn btn-skin btn-block">SUBMIT</button>
                </div>
            </form>
        </div>

    <div class="col-md-8 hidden-sm hidden-xs right-desk right-desk-gen">
        <div class="right-desk-content">
            <h3 class="white">KYC will be verified very soon by the admin.</h3>
            # Ogonn For Web
        </div>
    </div>

@endsection
    