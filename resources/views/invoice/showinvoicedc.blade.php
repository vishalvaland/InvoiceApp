 <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Amee Electroninics') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>



</head>
<body>

  <style>
    body {
        font-size: 14px;
        font-family: calibri;
    }

    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
        vertical-align: top;
    }
    </style>
 <h2 style="text-align: center;">DELIVERY CHALLAN</h2>
 
 
   
    <table style="width: 100%;">
        <tr>
            <td style="width: 60%" rowspan="2">
                @foreach($settings as $item)
                <b>{{ $item->Company_Name }}</b> <br>
                {{ $item->Company_Address }} <br>
                (P) {{ $item->Company_Phone }}<br>
                (P) {{ $item->Company_Mobile }}<br>
                <b>GST No. {{ $item->GST_No }}</b> 

             @endforeach
            </td>
            
        </tr>
        <tr>
            <td>Delivery Note No.
                <br>
                <b>{{ $invoice -> invoiceid }}</b>
            </td>
            <td>Delivery Note Date
                <br>
                <b>{{ \Carbon\Carbon::parse($invoice -> deliverydate )->format('d/m/Y')}} </b>
            </td>
        </tr>
        <tr>
            <td rowspan=" 2">Buyer
                <br>
                @if(count($customers) > 0)
                <b>{{ $customers -> CustomerName }}</b> <br> 
              
                  {{ $customers -> CustomerAddress }}
                     
                    <br> (M)  {{ $customers -> MobileNo }}
                    <br>
                      @if(count($customers -> EMail) > 0)
                     E-mail: {{ $customers -> EMail }} <br> @endif
                        @if(count($customers ->GSTNo) > 0)
                    <b>GST No. {{ $customers ->GSTNo}}</b> @endif
                      @endif
            </td>
            <td colspan="2">Mode/Terms of Payment<br> 
            <b>{{ $invoice -> modeofpayment }}</b> 
                
            </td>
        </tr>
        <tr>  <td colspan="2"><b>Terms of Delivery</b>
               
                <br> - Good once sold will not be taken back
                <br> - Subject to Ahmedabad jurisdiction only
                <br> - SALES & SERVICE
                <br> - E. & O. E
            </td></tr>
    </table>
    <br>
    <table id="DivTable" style="width: 100%">
    <thead>
        <tr>
            <td style="width: 5%">Sr No</td>
            <td style="width: 45%">Description Of Items</td>
            <td style="width: 10%">HSN/SAC</td>
            <td style="width: 10%">Quantity</td>
            <td style="width: 15%;">Rate</td>
            <td style="width: 15%;">Amount</td>
        </tr>
        </thead>
         
 
            <tbody>
                
            </tbody>
 
       <!--  <tr style="font-weight:bold">
            <td>1</td>
            <td><div>LG LED T</div>
                <div style="text-align: right;">SGST (14%)</div>
                 <div style="text-align: right;">CGST (14%)</div>
            </td>
            <td>12454</td>
            <td>1</td>
            <td>25,000</td>
            <td style="text-align: right;"><div>25,000.10</div><div>800</div><div>800</div></td>
        </tr> -->
        
        <tfoot> 
        <tr style="font-weight:bold" class="alldata">
            <td colspan="5" style="text-align: right;">Round Off</td>
            <td style="width: 15%;text-align: right;">{{ $invoice ->roundoff }}</td>
        </tr>
        <tr style="font-weight:bold">
            <td colspan="5" style="text-align: right;">Total Amount(Rs.)</td>
            <td style="width: 15%;text-align: right;">{{ $invoice -> totalamount }}</td>
        </tr>
        </tfoot>   
    </table>



    <br>
    <table id="hsn_table" style="border: 1px solid black; padding: 5px; border-collapse: collapse; width:100%">
   <!--  <thead>
        <tr>
            <td colspan="6">
                Amount Chargeable (In Word)
                <br>
                <b>Tweenty five thousand only</b>
            </td>
        </tr>
        <tr>
            <td rowspan="2" style="width:40%">  HSN/SAC
            </td>
        
            <td colspan="2"  style="width:20%">
            Central Tax
            </td>
            <td colspan="2"  style="width:20%">
            State Tax
            </td>
              <td rowspan="2"  style="width:20%">
            taxable Value
            </td>
            
        </tr>
        <tr>
            <td style="width: 10%;">  Rate
            </td>
          <td  style="width: 10%;">
            Amount
            </td>
            <td  style="width: 10%;">
            Rate
            </td>
            <td  style="width: 10%;">
           Amount
            </td>
            
        </tr>
        </thead>

        <tbody> </tbody>
 -->


        <tfoot> <!-- <tr>
          <td colspan="5" style="text-align: right;"><b>
            Total
          </b></td>
          
          <td><b id="totaltaxamount"></b></td>
        </tr>
         <tr>
            <td colspan="6">
                Tax Amount (In Word)
                <br>
                <b id="taxinword"> </b>
            </td>
        </tr> -->
        <tr>
            <td colspan="2" style="width: 50%">Customer Signature</td>
            <td colspan="4" style="width: 50%; text-align: right;">For, Amee Electronics
                <br> <br> 
             Authorised Singature 
            </td>
        </tr>
        <tr>
            <td colspan="6">
                Declaration
                <br> We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct.
            </td>
        </tr></tfoot>
        
    </table>
        <script>
     var allitems='{!! $allitems !!}';
     // alert(allitems);
   
    obj = JSON.parse(allitems);
    // alert(obj.length);
    var html;

    for (var i = 0; i < obj.length; i++) { 
       
         html="<tr style='font-weight:bold'><td>"+ obj[i].srno +"</td><td><div>"+ obj[i].itemname +" - "+ obj[i].itemmodelnumber + "</div><div style='text-align: right;''>SGST ("+obj[i].sgstper+") %</div><div style='text-align: right;''>CGST ("+obj[i].cgstper+") %</div></td><td>"+obj[i].hsn_sac+"</td><td>"+obj[i].quantity+"</td><td>"+obj[i].rate+"</td><td style='text-align: right;''><div>"+obj[i].amount+"</div><div> "+obj[i].cgstamt+"</div><div>"+obj[i].cgstamt+"</div></td></tr> ";
        
           console.log(html);
         $('#DivTable tbody').append(html);
       
    }


    //    var htmlhsv;

    //   var totaltaxamount=0;

     
      
     
    // for (var i = 0; i < obj.length; i++) { 

       
    //      html="<tr style='font-weight:bold'><td>"+obj[i].hsn_sac+"</td><td>"+obj[i].cgstper+"</td><td>"+obj[i].cgstamt+"</td><td>"+obj[i].sgstper+"</td><td style='text-align: right;''><div>"+obj[i].sgstamt+"</div> </td><td><div>"+ obj[i].totaltax + "</div> </td> </tr> ";
        
    //       $('#hsn_table tbody').append(html);
    //        totaltaxamountt = parseFloat(obj[i].totaltax);
    //        totaltaxamount = totaltaxamount + totaltaxamountt;
         
         
    //      // alert(totaltaxamount);
       
    // }
    //    $('#totaltaxamount').html(totaltaxamount);
      
  
 </script>
    <div style="width: 100%;text-align: center;"> <small>This is computer generated Invoice</small> </div>

  <!-- Script by hscripts.com -->
<script type="text/javascript">
setTimeout(function(){ var nume = document.getElementById('totaltaxamount').innerHTML;
 
    
}, 3000);
 
   
</script>
<!-- Script by hscripts.com -->

 
    <!-- Scripts -->
   
     <script src="{{ asset('js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('js/moment.min.js') }}"></script>
     <script src="{{ asset('js/numeral.min.js') }}"></script>
     <script src="{{ asset('js/jquery-calx-2.2.7.js') }}"></script>
     <script src="{{ asset('js/select2.min.js') }}"></script>

  <!--   <script src="{{ asset('js/app.js') }}"></script> -->

</body>
</html>
