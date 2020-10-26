<style type="text/css">
body{
 margin-top:20px;
 background:#eee;
}
.invoice {
    background: #fff;
    padding: 20px
}
.invoice-company {
    font-size: 20px
}
.invoice-header {
    margin: 0 -20px;
    background: #f0f3f4;
    padding: 20px
}
.invoice-date,
.invoice-from,
.invoice-to {
    display: table-cell;
    width: 1%
}
.invoice-from,
.invoice-to {
    padding-right: 20px
}
.invoice-date .date,
.invoice-from strong,
.invoice-to strong {
    font-size: 16px;
    font-weight: 600
}
.invoice-date {
    text-align: right;
    padding-left: 20px
}
.invoice-price {
    background: #f0f3f4;
    display: table;
    width: 100%
}
.invoice-price .invoice-price-left,
.invoice-price .invoice-price-right {
    display: table-cell;
    padding: 20px;
    font-size: 20px;
    font-weight: 600;
    width: 75%;
    position: relative;
    vertical-align: middle
}
.invoice-price .invoice-price-left .sub-price {
    display: table-cell;
    vertical-align: middle;
    padding: 0 20px
}
.invoice-price small {
    font-size: 12px;
    font-weight: 400;
    display: block
}
.invoice-price .invoice-price-row {
    display: table;
    float: left
}
.invoice-price .invoice-price-right {
    width: 25%;
    background: #2d353c;
    color: #fff;
    font-size: 28px;
    text-align: right;
    vertical-align: bottom;
    font-weight: 300
}
.invoice-price .invoice-price-right small {
    display: block;
    opacity: .6;
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 12px
}
.invoice-footer {
    border-top: 1px solid #ddd;
    padding-top: 10px;
    font-size: 10px
}
.invoice-note {
    color: #999;
    margin-top: 80px;
    font-size: 85%
}
.invoice>div:not(.invoice-footer) {
    margin-bottom: 20px
}
.btn.btn-white, .btn.btn-white.disabled, .btn.btn-white.disabled:focus, .btn.btn-white.disabled:hover, .btn.btn-white[disabled], .btn.btn-white[disabled]:focus, .btn.btn-white[disabled]:hover {
    color: #2d353c;
    background: #fff;
    border-color: #d9dfe3;
}
</style>

@foreach($data as $row)
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
   <div class="col-md-12">
      <div id="invoice" style="max-width: 700px" class="invoice">
         <!-- begin invoice-company -->
         <div class="invoice-company text-inverse f-w-600">
            <span class="pull-right hidden-print">
           
            </span>
            Creative Projects .ltd
         </div>
         <!-- end invoice-company -->
         <!-- begin invoice-header -->
         <div class="invoice-header">
            <div class="invoice-from">
               <small>from</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">Creative Projects.</strong><br>
                  Al-Mansour 14 Ramadan, <br>
                  Baghdad Bank Building<br>
                  2nd floor
               </address>
            </div>
            <div class="invoice-to">
               <small>to</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">{{ $row->customer->name }}</strong><br>
                  {{ $row->customer->address }}<br>
                  {{ $row->customer->work_type }}<br>
                  Email {{ $row->customer->email }}<br>
                  Phone: +964 {{ $row->customer->phone }}<br>
               </address>
            </div>
            <div class="invoice-date">  
              <div>
                <small>{{ date('m-d-yy') }}</small>
                <div class="invoice-detail">
                  CP #{{ $row->id }}
                </div>
              </div>
            </div>
         </div>
         <!-- end invoice-header -->
         <!-- begin invoice-content -->
         <div class="invoice-content">
            <!-- begin table-responsive -->
            <div class="table-responsive">
               <table class="table table-invoice">
                  <thead>
                     <tr>
                        <th class="text-center" width="30%">Projects details</th>
                        <th class="text-center" width="15%">Project Price</th>
                        <th class="text-center" width="15%">First paymeny</th>
                        <th class="text-center" width="20%">Remaining amount</th>
                     </tr>
                  </thead>
                  <tbody>
                        @if($pay)
                        @foreach($pay as $r)
                     <tr>
                        <td style="font-size: 14pt;text-align: center;">{{ $row->details }}</td>
                        <td style="font-size: 14pt;text-align: center;">{{ $row->price }}</td>
                        <td style="font-size: 14pt;text-align: center;">{{ $r->value }}</td>
                        <td style=" font-size: 14pt;text-align: center;background-color: #000;color: #fff;">{{ $row->price - $r->value }}</td>
                     </tr>
                        @endforeach
                        @endif
                  </tbody>
               </table>
            </div>
            <!-- end table-responsive -->
         </div>
         <!-- end invoice-content -->
         <!-- begin invoice-footer -->
         <div class="invoice-footer">
            <p class="text-center m-b-5 f-w-900">
               THANK YOU FOR YOUR BUSINESS
            </p>
            <p class="text-center">
               
               <span style="float: left;" class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:+9647719777917 , +9647810010270 , +9647819777917
 , +9647810010240</span>
               <span  style="float: right;" class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> 
              c.p@creative-projects.co</span>
            </p>
         </div>
         <!-- end invoice-footer -->
      </div>
   </div>
</div>
@endforeach
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>

<script type="text/javascript">
    
window.print();
</script>
