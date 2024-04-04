@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Welcome To Dashboard</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sales Dashboard</li>
            </ol>
        </div>
       <!--  <div class="d-flex">
            <div class="mr-2">
                <a class="btn ripple btn-outline-primary dropdown-toggle mb-0" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i class="fe fe-external-link"></i> Export <i class="fas fa-caret-down ml-1"></i>
                </a>
                <div class="dropdown-menu tx-13">
                    <a class="dropdown-item" href="#"><i class="far fa-file-pdf mr-2"></i>Export as Pdf</a>
                    <a class="dropdown-item" href="#"><i class="far fa-image mr-2"></i>Export as Image</a>
                    <a class="dropdown-item" href="#"><i class="far fa-file-excel mr-2"></i>Export as Excel</a>
                </div>
            </div>
            <div class="">
                <a href="#" class="btn ripple btn-secondary navresponsive-toggler mb-0" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fe fe-filter mr-1"></i>  Filter <i class="fas fa-caret-down ml-1"></i>
                </a>
            </div>
        </div> -->
    </div>
    <!-- End Page Header -->

    <!--Navbar-->
    <div class="responsive-background">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="advanced-search">
                <div class="row align-items-center">
                    
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-lg-0">
                                    <label class="">From :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fe fe-calendar lh--9 op-6"></i>
                                            </div>
                                        </div><input class="form-control fc-datepicker" placeholder="11/01/2019" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-lg-0">
                                    <label class="">To :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fe fe-calendar lh--9 op-6"></i>
                                            </div>
                                        </div><input class="form-control fc-datepicker" placeholder="11/08/2019" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-lg-0">
                            <label class="">Sales By Country :</label>
                            <select class="form-control select2-flag-search" data-placeholder="Select Contry">
                                <option value="AF">Afghanistan</option>
                                <option value="AL">Albania</option>
                                <option value="AD">Andorra</option>
                                <option value="AG">Antigua and Barbuda</option>
                                <option value="AU">Australia</option>
                                <option value="AM">Armenia</option>
                                <option value="AO">Angola</option>
                                <option value="AR">Argentina</option>
                                <option value="AT">Austria</option>
                                <option value="AZ">Azerbaijan</option>
                                <option value="BA">Bosnia and Herzegovina</option>
                                <option value="BB">Barbados</option>
                                <option value="BD">Bangladesh</option>
                                <option value="BE">Belgium</option>
                                <option value="BF">Burkina Faso</option>
                                <option value="BG">Bulgaria</option>
                                <option value="BH">Bahrain</option>
                                <option value="BJ">Benin</option>
                                <option value="BN">Brunei</option>
                                <option value="BO">Bolivia</option>
                                <option value="BT">Bhutan</option>
                                <option value="BY">Belarus</option>
                                <option value="CD">Congo</option>
                                <option value="CA">Canada</option>
                                <option value="CF">Central African Republic</option>
                                <option value="CI">Cote d'Ivoire</option>
                                <option value="CL">Chile</option>
                                <option value="CM">Cameroon</option>
                                <option value="CN">China</option>
                                <option value="CO">Colombia</option>
                                <option value="CU">Cuba</option>
                                <option value="CV">Cabo Verde</option>
                                <option value="CY">Cyprus</option>
                                <option value="DJ">Djibouti</option>
                                <option value="DK">Denmark</option>
                                <option value="DM">Dominica</option>
                                <option value="DO">Dominican Republic</option>
                                <option value="EC">Ecuador</option>
                                <option value="EE">Estonia</option>
                                <option value="ER">Eritrea</option>
                                <option value="ET">Ethiopia</option>
                                <option value="FI">Finland</option>
                                <option value="FJ">Fiji</option>
                                <option value="FR">France</option>
                                <option value="GA">Gabon</option>
                                <option value="GD">Grenada</option>
                                <option value="GE">Georgia</option>
                                <option value="GH">Ghana</option>
                                <option value="GH">Ghana</option>
                                <option value="HN">Honduras</option>
                                <option value="HT">Haiti</option>
                                <option value="HU">Hungary</option>
                                <option value="ID">Indonesia</option>
                                <option value="IE">Ireland</option>
                                <option value="IL">Israel</option>
                                <option value="IN">India</option>
                                <option value="IQ">Iraq</option>
                                <option value="IR">Iran</option>
                                <option value="IS">Iceland</option>
                                <option value="IT">Italy</option>
                                <option value="JM">Jamaica</option>
                                <option value="JO">Jordan</option>
                                <option value="JP">Japan</option>
                                <option value="KE">Kenya</option>
                                <option value="KG">Kyrgyzstan</option>
                                <option value="KI">Kiribati</option>
                                <option value="KW">Kuwait</option>
                                <option value="KZ">Kazakhstan</option>
                                <option value="LA">Laos</option>
                                <option value="LB">Lebanons</option>
                                <option value="LI">Liechtenstein</option>
                                <option value="LR">Liberia</option>
                                <option value="LS">Lesotho</option>
                                <option value="LT">Lithuania</option>
                                <option value="LU">Luxembourg</option>
                                <option value="LV">Latvia</option>
                                <option value="LY">Libya</option>
                                <option value="MA">Morocco</option>
                                <option value="MC">Monaco</option>
                                <option value="MD">Moldova</option>
                                <option value="ME">Montenegro</option>
                                <option value="MG">Madagascar</option>
                                <option value="MH">Marshall Islands</option>
                                <option value="MK">Macedonia (FYROM)</option>
                                <option value="ML">Mali</option>
                                <option value="MM">Myanmar (formerly Burma)</option>
                                <option value="MN">Mongolia</option>
                                <option value="MR">Mauritania</option>
                                <option value="MT">Malta</option>
                                <option value="MV">Maldives</option>
                                <option value="MW">Malawi</option>
                                <option value="MX">Mexico</option>
                                <option value="MZ">Mozambique</option>
                                <option value="NA">Namibia</option>
                                <option value="NG">Nigeria</option>
                                <option value="NO">Norway</option>
                                <option value="NP">Nepal</option>
                                <option value="NR">Nauru</option>
                                <option value="NZ">New Zealand</option>
                                <option value="OM">Oman</option>
                                <option value="PA">Panama</option>
                                <option value="PF">Paraguay</option>
                                <option value="PG">Papua New Guinea</option>
                                <option value="PH">Philippines</option>
                                <option value="PK">Pakistan</option>
                                <option value="PL">Poland</option>
                                <option value="QA">Qatar</option>
                                <option value="RO">Romania</option>
                                <option value="RU">Russia</option>
                                <option value="RW">Rwanda</option>
                                <option value="SA">Saudi Arabia</option>
                                <option value="SB">Solomon Islands</option>
                                <option value="SC">Seychelles</option>
                                <option value="SD">Sudan</option>
                                <option value="SE">Sweden</option>
                                <option value="SG">Singapore</option>
                                <option value="TG">Togo</option>
                                <option value="TH">Thailand</option>
                                <option value="TJ">Tajikistan</option>
                                <option value="TL">Timor-Leste</option>
                                <option value="TM">Turkmenistan</option>
                                <option value="TN">Tunisia</option>
                                <option value="TO">Tonga</option>
                                <option value="TR">Turkey</option>
                                <option value="TT">Trinidad and Tobago</option>
                                <option value="TW">Taiwan</option>
                                <option value="UA">Ukraine</option>
                                <option value="UG">Uganda</option>
                                <option value="UM">United States of America</option>
                                <option value="UY">Uruguay</option>
                                <option value="UZ">Uzbekistan</option>
                                <option value="VA">Vatican City (Holy See)</option>
                                <option value="VE">Venezuela</option>
                                <option value="VN">Vietnam</option>
                                <option value="VU">Vanuatu</option>
                                <option value="YE">Yemen</option>
                                <option value="ZM">Zambia</option>
                                <option value="ZW">Zimbabwe</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-lg-0">
                            <label class="">Products :</label>
                            <select multiple="multiple" class="group-filter">
                                <optgroup label="Mens">
                                    <option value="1">Foot wear</option>
                                    <option value="2">Top wear</option>
                                    <option value="3">Bootom wear</option>
                                    <option value="4">Men's Groming</option>
                                    <option value="5">Accessories</option>
                                </optgroup>
                                <optgroup label="Women">
                                    <option value="1">Western wear</option>
                                    <option value="2">Foot wear</option>
                                    <option value="3">Top wear</option>
                                    <option value="4">Bootom wear</option>
                                    <option value="5">Beuty Groming</option>
                                    <option value="6">Accessories</option>
                                    <option value="7">Jewellery</option>
                                </optgroup>
                                <optgroup label="Baby & Kids">
                                    <option value="1">Boys clothing</option>
                                    <option value="2">Girls Clothing</option>
                                    <option value="3">Toys</option>
                                    <option value="4">Baby Care</option>
                                    <option value="5">Kids footwear</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group mb-lg-0">
                            <label class="">Sales Type :</label>
                            <select multiple="multiple" class="multi-select">
                                <option value="1">Online</option>
                                <option value="2">Offline</option>
                                <option value="3">Reseller</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-right">
                    <a href="#" class="btn btn-primary" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Apply</a>
                    <a href="#" class="btn btn-secondary" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Reset</a>
                </div>
            </div>
        </div>
    </div>
    <!--End Navbar -->
    <div class="row row-sm">
     
                   
        <div class="col-sm-6 col-xl-3 col-lg-6">
            <div class="card custom-card">
                <div class="card-body dash1">
                    <div class="d-flex">
                        <p class="mb-1 tx-inverse">Total Agent</p>
                        <div class="ml-auto">
                            <i class="fas fa-chart-line fs-20 text-primary"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="dash-25">{{ DB::table('users')->where('type','agent')->count()}}</h3>
                    </div>
                    <div class="progress mb-1">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-70p" role="progressbar"></div>
                    </div>
                   <!--  <div class="expansion-label d-flex">
                        <span class="text-muted">Last Month</span>
                        <span class="ml-auto"><i class="fas fa-caret-up mr-1 text-success"></i>0.7%</span>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 col-lg-6">
            <div class="card custom-card">
                <div class="card-body dash1">
                    <div class="d-flex">
                        <p class="mb-1 tx-inverse">Total Cutomer</p>
                        <div class="ml-auto">
                            <i class="fab fa-rev fs-20 text-secondary"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="dash-25">{{ DB::table('users')->where('type','user')->count()}}</h3>
                    </div>
                    <div class="progress mb-1">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-60p bg-secondary" role="progressbar"></div>
                    </div>
                  <!--   <div class="expansion-label d-flex">
                        <span class="text-muted">Last Month</span>
                        <span class="ml-auto"><i class="fas fa-caret-down mr-1 text-danger"></i>0.43%</span>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 col-lg-6">
            <div class="card custom-card">
                <div class="card-body dash1">
                    <div class="d-flex">
                        <p class="mb-1 tx-inverse">Total Collection </p>
                        <div class="ml-auto">
                            <i class="fas fa-dollar-sign fs-20 text-success"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="dash-25">{{ number_format(DB::table('payments')->sum('amount'),2)}}</h3>
                    </div>
                    <div class="progress mb-1">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-50p bg-success" role="progressbar"></div>
                    </div>
                    <!-- <div class="expansion-label d-flex text-muted">
                        <span class="text-muted">Last Month</span>
                        <span class="ml-auto"><i class="fas fa-caret-down mr-1 text-danger"></i>1.44%</span>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="row row-sm">
   
        @if($agentlist)
        @foreach($agentlist as $agent)
        <div class="col-sm-6 col-xl-3 col-lg-6">
            <div class="card custom-card">
                <div class="card-body dash1">
                    <div class="d-flex">
                        <p class="mb-1 tx-inverse">Daily Collection By Agent {{$agent->name}}</p>
                        <div class="ml-auto">
                            <i class="fas fa-user fs-20 text-primary"></i>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="dash-25">{{ number_format(DB::table('payments')->where(array('payment_date'=>date('Y-m-d'),'user_id'=>$agent->id))->sum('amount'),2)}}</h3>
                    </div>
                    <div class="progress mb-1">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-70p" role="progressbar"></div>
                    </div>
                   <!--  <div class="expansion-label d-flex">
                        <span class="text-muted">Last Month</span>
                        <span class="ml-auto"><i class="fas fa-caret-up mr-1 text-success"></i>0.7%</span>
                    </div> -->
                </div>
            </div>
        </div>
        @endforeach
        @endif
       
    </div>

     <div class="row row-sm">
   
        @if($agentlist)
        @foreach($agentlist as $agent)
        <div class="col-sm-6 col-xl-3 col-lg-6">
            <div class="card custom-card">
                <div class="card-body dash1">
                    <div class="d-flex">
                        <p class="mb-1 tx-inverse">Monthly Collection By Agent {{$agent->name}}</p>
                        <div class="ml-auto">
                            <i class="fas fa-user fs-20 text-primary"></i>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="dash-25">{{ number_format(DB::table('payments')->where('payment_date','>=',date('Y-m-d',strtotime('01-'.date('m-Y'))))->where('payment_date','<=',date('Y-m-d',strtotime('31-'.date('m-Y') )))->where('user_id',$agent->id)->sum('amount'),2)}}</h3>
                    </div>
                    <div class="progress mb-1">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-70p" role="progressbar"></div>
                    </div>
                   <!--  <div class="expansion-label d-flex">
                        <span class="text-muted">Last Month</span>
                        <span class="ml-auto"><i class="fas fa-caret-up mr-1 text-success"></i>0.7%</span>
                    </div> -->
                </div>
            </div>
        </div>
        @endforeach
        @endif
       
    </div>

    <!--End  Row -->
    <!-- <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
              <div class="row">
                 <div class="col-md-4">
                    <div class="form-group">
                          <select class="form-control" id="sel1">
                            {{-- <option value="Weekly">Weekly</option> --}}
                            <option value="Monthly" selected>Monthly</option>
                            <option value="Yearly">Yearly</option>
                          </select>
                    </div>     
                 </div>  
              </div>
              <div id="chart_js"></div>
            </div>
        </div>
    </div>

    </div> -->
	

@endsection
@section('scripts')
<!-- chart js  -->
<script src="{{ URL::to('/') }}/assets/chart/highcharts.js"></script>
<script src="{{ URL::to('/') }}/assets/chart/series-label.js"></script>
<script src="{{ URL::to('/') }}/assets/chart/exporting.js"></script>
<script src="{{ URL::to('/') }}/assets/chart/export-data.js"></script>
<script src="{{ URL::to('/') }}/assets/chart/accessibility.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
function chartview(v1,v3){
    Highcharts.chart('chart_js', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Information Sales'
            },
            subtitle: {
                text: 'Source:drishti'
            },
            xAxis: {
                categories: v3,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                text: 'Invoice sale'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} Rs.</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                pointPadding: 0.2,
                borderWidth: 0
                }
            },
            series: [
             {
                name: 'Sales',
                 data: v1
            }]
        });
    }
$(document).ready ( function(){

var time = $('#sel1').val();
$.ajax({
url:"{{ route('saleschart') }}",
type:'post',
data:{
    "_token": "{{ csrf_token() }}",
    time:time
},
success:function(res){
    //alert(res);
    var obj = JSON.parse(res);
    chartview(obj.sales,obj.month);
}
})

$('#sel1').change(function(){
var time = $('#sel1').val();
$.ajax({
url:"{{ route('saleschart') }}",
type:'post',
data:{
    "_token": "{{ csrf_token() }}",
    time:time
},
success:function(res){
    //alert(res);
    var obj = JSON.parse(res);
    chartview(obj.sales,obj.month);
}
   })

})
});
</script>
@endsection