@extends('layouts.app')
 

@section('content')
       

                    <style>
    .invoice {
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
    .border0, .border0 td{
        border-top:none;
         border-bottom:none;
    }
    .invoiceTable div{
        margin-bottom:5px;
    }
    .invoiceTable div input{
        display: inline-block;
            width: auto;
    }
    .selecteditemname{
      width: 97% !important;
    margin-top: 5px;
    }
    </style>
<div class="container">
<div class="col-md-12">
 <div class="invoice"   id="calx_form"><h4 style="text-align: center;">Basic Price Calculator</h4>
 <table style="margin:0 auto;">
   <tr><td>Total Amount
                <br> <input type="text" id="ccaltotalamt"></td>
   <td>Tax(CGST+SGST)
                <br> <input type="text" id="ccaltax"></td>
   <td>Basic Price(Rate)
                <br> <input type="text" id="ccalbasic"></td></tr>
 </table>

 <script>
   $('body').delegate('#ccaltax,#ccaltotalamt', 'keyup', function() {

   var ccaltax = $('#ccaltax').val(); 
    var cccaltax =ccaltax/100+1;
   var ccaltotalamt = $('#ccaltotalamt').val();
  //var ccalbasic = $('#ccalbasic').val(); 

  var  ccalbasic =  parseFloat(ccaltotalamt/cccaltax).toFixed(2); 

$('#ccalbasic').val(ccalbasic); 
 

   });

 </script>
 <div class="clearfix"></div>
 <hr>

    <div class="invoice"   id="calx_form"><h2 style="text-align: center;">TAX INVOICE</h2>
    <table style="width: 100%;">
        <tr>
            <td style="width: 60%" >
                @foreach($settings as $item)
                <b>{{ $item->Company_Name }}</b> <br>
                {{ $item->Company_Address }} <br>
                (P) {{ $item->Company_Phone }}<br>
                (M) {{ $item->Company_Mobile }}<br>
                <b>GST No. {{ $item->GST_No }}</b> 

             @endforeach
              

 
            </td>
       <!--      <td>Invoice No.
                <br><b>001</b> </td>
            <td>Date
                <br><b>02-04-2017</b> </td> -->
        
            <td>
              Invoice No.
                <br> <input type="text" id="invoice-no">
                 </td>
            <td>
           
            Invoice Date
                <br> <input type="date" id="invoice-date">  
<br> 
            Delivery Note Date
                <br>
                 <input type="date" id="dc-date">
            </td>
        </tr>
        <tr>
            <td rowspan=" 2">Buyer
                <br>

                <select class="selectcustomer form-control" name="selectcustomer" id="selectcustomer" >
                   <option value="999">Select Customer</option>
                   @foreach($customers as $item)   
                   <option value="{{ $item->id }}">{{ $item->CustomerName }}</option>
                   @endforeach
                     
                </select>
                 <script type="text/javascript">
                    $(document).ready(function() {
                      $("#selectcustomer").select2();
                    });

                    // $('#selectcustomer').change(function() {
                    //    var Cstselectedvalu = $(this).val();                  
                    //      });
                </script>
                
	                    <b class="cus_name"></b> <br>
	                    <div class="cus_addess"></div>
	                    <div class="cus_mobile"></div>                     
	                  <b class="cus_gstno"></b>
	
            </td>
            <td colspan="2">Mode/Terms of Payment<br>

            <select name="" id="mode-payment" class="form-control">
                <option value="Cheque">Cheque</option>
                  <option value="Cash">Cash</option>     
                   <option value="Bank">Bank Transfer</option>                 
            </select>
             
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

   <table style="width: 100%" class="invoiceTable">
   <thead>
        <tr>
            <th width="2%"><!-- <input id="check_all" class="formcontrol" type="checkbox"/> --></th>
            <th style="width: 5%">Sr No</th>
            <th style="width: 45%">Description Of Items</th>
            <th style="width: 10%">HSN/SAC</th>
            <th style="width: 10%">Quality</th>
            <th style="width: 15%;">Rate</th>
            <th style="width: 15%;">Amount</th>
        </tr>
        </thead>

        <tbody> 

        <tr class="border0" style=" border:0;font-weight:bold;vertical-align: center">
       <td><input class="case" type="checkbox"/></td> 
            <td><input type="text" data-type="productSr" name="data[0]['product_sr']" id="itemNo_1" class="form-control srno" value="1"  ></td>
            <td>
            <div>
            <select name=""  data-type="productName" name="data[0]['product_Name']" id="itemName_1" class="form-control selectitem">
              <option value="Select Product">Select Product</option>
                   @foreach($inventories as $item)   
                   <option value="{{ $item->id }}">{{ $item->itemname }}</option>
                   @endforeach
            </select>
             <input  type="text" class="selecteditemname form-control">  
             <input  type="hidden" class="serialno"> 
              </div>
              
                <div>
                CGST(%) -<input type="text" data-cell="B1" data-type="productCGST" name="data[0]['product_CGST']" id="itemCGST_1" class="form-control cgst"  disabled="disabled">
                </div>
                  <div>
                SGST(%) - <input type="text" data-cell="A1" data-type="productSGST" name="data[0]['product_SGST']" id="itemSGST_1" class="form-control sgst" disabled="disabled">
                </div>

            </td>

            <td><input type="text" data-type="productHSN" name="data[0]['product_HSN']" id="itemHSN_1" class="form-control hsnno"  disabled="disabled"></td>

            <td><input type="text"  data-cell="C1" data-type="productQNT" name="data[0]['product_QNT']" id="itemQNT_1" class="form-control quantity" value="1"></td>

            <td><input type="text"  data-cell="D1" data-type="productRate" name="data[0]['product_Rate']" id="itemRate_1" class="form-control rate" ></td>

            <td style="text-align: right;"><div>
                <input type="text"  data-cell="E1" data-type="productAmount" name="data[0]['product_Amount']" id="itemAmount_1" class="form-control amt"  required="required" disabled="disabled"  >
            </div>
                
                <div>
                    <input type="text" data-cell="G1" data-type="productCGSTAmount" name="data[0]['product_CGSTAmount']" id="itemCGSTAmount_1" class="form-control amtcgst"  disabled="disabled">
                </div>
                <div><input type="text" data-cell="F1" data-type="productSGSTAmount" name="data[0]['product_SGSTAmount']" id="itemSGSTAmount_1" class="form-control amtsgst" disabled="disabled"></div>
            </td>
        </tr>
         
        </tbody>

        <tfoot>
     
        <tr style="font-weight:bold">
            <td colspan="6" style="text-align: right;">Round Off</td>
            <td  style="width: 15%;text-align: right;" id="round-off" class="totalceil"></td>
        </tr>
        <tr style="font-weight:bold">
            <td colspan="6" style="text-align: right;">Total Amount(Rs.)</td>
            <td  style="width: 15%;text-align: right;" id="total-all" class="total"></td>
        </tr>

        </tfoot>
   
</table>

<br>
<button id="addmore" class="btn btn-success">ADD</button>
<button id="delete" class="btn btn-danger">Delete</button>
 <br>


<hr style="border-top: 1px solid #b5b5b5;">

  <div id="ajaxResponse" style="text-align: right;font-size: 24px;">  </div>
  <br>
  <div class="clearfix"></div>
<div style="width: 100%;text-align: right;"> 
        <button class="btn btn-info" id="save">Save</button>
        <!--  <button class="btn btn-success">Print Invoice</button>
         <button class="btn btn-success">Print DC</button>  -->
        <button style="display: none;" class="btn btn-info" id="create-new" onclick="location.reload();">Create New Invoice</button> 
        <script type="text/javascript">
          // var invoiceidd= $('#invoiceidd').val();

        </script>
         <a style="display: none;" target="_blank"  href="" class="btn btn-success" id='print-invoice'>Print Invoice</a>
         <a style="display: none;" target="_blank" class="btn btn-success" id='print-dc'>Print DC</a>
       

         <br><br>
 

    </div>


   </div>

</div>




 <script type="text/javascript"> 
      function initselectitem(){
      	 $(".selectitem").select2(); 
      }

    $(document).ready(function() {
      initselectitem();
    }); 


	      var i=$('table.invoiceTable tbody tr').length+1;
	    // var i=$(".invoiceTable tbody tr:last-child").index() +1; 
	$("#addmore").on('click',function(){

	html = '<tr class="border0" style=" border:0;font-weight:bold;vertical-align: center">';
	 html += '<td><input class="case" type="checkbox"/></td>'; 
	  html += '<td><input type="text" data-type="productSr" name="data['+i+'][product_sr]" id="itemNo_'+i+'" class="form-control srno" value='+i+' ></td>';

	 html += '<td><div><select name=""  data-type="productName" name="data['+i+'][product_Name]" id="itemName_'+i+'" class="form-control selectitem"><option value="Select Product">Select Product</option> @foreach($inventories as $item)<option value="{{ $item->id }}">{{ $item->itemname }} </option>@endforeach</select></div><input  type="text" class="selecteditemname form-control"><input  type="hidden" class="serialno"> <div>CGST(%) -<input type="text" data-cell="B1" data-type="productCGST" name="data['+i+'][product_CGST]" id="itemCGST_'+i+'" class="form-control cgst"  disabled="disabled"></div><div>SGST(%) - <input type="text" data-cell="A1" data-type="productSGST" name="data['+i+'][product_SGST]" id="itemSGST_'+i+'" class="form-control sgst" disabled="disabled"></div></td>';

	 html += '<td><input type="text" data-type="productHSN" name="data['+i+'][product_HSN]" id="itemHSN_'+i+'" class="form-control hsnno" disabled="disabled"></td>';

	  html += '<td><input type="text"  data-cell="C1" data-type="productQNT" name="data['+i+'][product_QNT]" id="itemQNT_'+i+'" class="form-control quantity" value="1"></td>';

	 html += '<td><input type="text"  data-cell="D1" data-type="productRate" name="data[0][product_Rate]" id="itemRate_1" class="form-control rate" ></td>'

	 html += '<td style="text-align: right;"><div><input type="text"  data-cell="E1" data-type="productAmount" name="data['+i+'][product_Amount]" id="itemAmount_'+i+'" class="form-control amt"  disabled="disabled"></div><div><input type="text" data-cell="G1" data-type="productCGSTAmount" name="data['+i+'][product_CGSTAmount]" id="itemCGSTAmount_'+i+'" class="form-control amtcgst"  disabled="disabled"></div><div><input type="text" data-cell="F1" data-type="productSGSTAmount" name="data['+i+'][product_SGSTAmount]" id="itemSGSTAmount_'+i+'" class="form-control amtsgst" disabled="disabled"></div></td>';

	 html += '</tr>';
	  
	    $('table.invoiceTable tbody').append(html);
	    i++;

   	initselectitem();

});

//to check all checkboxes
$(document).on('change','#check_all',function(){
    $('input[class=case]:checkbox').prop("checked", $(this).is(':checked'));
});

//deletes the selected table rows
$("#delete").on('click', function() {
    if(   $('.invoiceTable tbody tr').length > 1){
    $('.case:checkbox:checked').parents("tr").remove();
    $('#check_all').prop("checked", false); 
    }
    else{
        alert("One Row required")
    }
    total()
});
 

 
$('body').delegate('.quantity,.rate,.cgst,.sgst', 'keyup', function() {
 
 

 var tr =$(this).closest("tr");
// alert(tr);

// var tr = $(this).parent().parent().css({"color": "red", "border": "2px solid red"});

// alert(JSON.stringify(tr))
var qty = tr.find('.quantity').val();
var rate = tr.find('.rate').val();
 
var sgst = tr.find('.sgst').val();

var cgst = tr.find('.cgst').val(); 

var amt = (qty * rate); 
tr.find('.amt').val(amt);


var amtcgst = amt*cgst/100; 
var amtsgst = amt*sgst/100;
 
tr.find('.amtcgst').val(amtcgst);
tr.find('.amtsgst').val(amtsgst);

total();

});
 


function total() {
    var t = 0;
     var t1 = 0;
      var t2 = 0;
      var totalamount=0;

    $('.amt').each(function(i, e) {
        var amt = $(this).val() - 0;
        t += amt;
    });

     $('.amtcgst').each(function(i, e) {
        var amt = $(this).val() - 0;
        t1 += amt;
    });

      $('.amtsgst').each(function(i, e) {
        var amt = $(this).val() - 0;
        t2 += amt;
    });

 var totalamount= t+t1+t2;
 

   var totalamountceil= Math.round(t+t1+t2);

    $('.total').html(totalamountceil);

    
     $('.totalceil').html( Math.round( (totalamountceil-totalamount)* 100) / 100);


 
} 
 
//      var myurl = "/invoiceapp/public";
//     $(document).ready(function() {
//     $('#save').on('click', function (e) {
//         e.preventDefault();
//         var title = "Hi";
//         // var body = $('#body').val();
//         // var published_at = $('#published_at').val();
//         $.ajax({

//         	 headers: {
// 	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// 			   },
// 	        type: "POST",
//             url: myurl + '/invoice/create',
//             data: {"title": title},
//             success: function( $response) {
//                 $("#ajaxResponse").append("<div>hi</div>");
//             } 

//         });


//     });
// });


$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
});

$(document).ready(function(){
  //Ajax Get Customer Method	
	 var myurl = "/invoiceapp/public";
	$('#selectcustomer').change(function() {
		var itemselectedid= $(this).val();

		//alert(itemselectedid);
		// $.get(myurl + '/invoice/getitemlist', function(data){
		// 	console.log(data);
		// });
			if (itemselectedid!= 'SelectCustomer') {
		$.ajax({
			type:'GET',
			url:myurl + '/invoice/getcustomerlist', 
			data: {'itemid':itemselectedid},
			success: function(data){ 
				    $('.cus_name').html(data.CustomerName);
					$('.cus_addess').html(data.CustomerAddress);
					if(data.MobileNo != null || data.MobileNo != undefined ){  
					$('.cus_mobile').html('(M) '+ data.MobileNo);
					}
					if(data.GSTNo != null || data.GSTNo != undefined ){  
					$('.cus_gstno').html('GST No.  '+data.GSTNo); 
					}  
				 
			}
		});

		}

		  else{

		  	    $('.cus_name').html("");
					$('.cus_addess').html("");					 
					$('.cus_mobile').html("");				  
					$('.cus_gstno').html(""); 		
		  }


	}); 
	//Ajax Get customer Method	



	//Ajax Get item  Method	 
	 
		   $(".invoiceTable").on('change','.selectitem',function(){
		   	// alert("1");
		   	 var myurl = "/invoiceapp/public";
		  var itemselectedid= $(this).val();
		  var tr =$(this).closest("tr");
				$.ajax({
			type:'GET',
			url:myurl + '/invoice/getitemlist', 
			data: {'itemid':itemselectedid},
			success: function(data){
				 // console.log(data);
		 	 //     $('#ajaxResponse').html(data);


			 tr.find('.selecteditemname').val(data.itemmodelnumber); 
			  tr.find('.serialno').val(data.itemname); 
  
			  tr.find('.rate').val(data.rate); 	
			   tr.find('.hsnno').val(data.HSN_SAC); 			 
			//var sgst = tr.find('.sgst').val();
			tr.find('.sgst').val(data.statetax); 
			//var cgst = tr.find('.cgst').val();
			tr.find('.cgst').val(data.centraltax);

			var qty = tr.find('.quantity').val();
			var rate = tr.find('.rate').val();
			 
			var sgst = tr.find('.sgst').val();

			var cgst = tr.find('.cgst').val(); 

			var amt = (qty * rate); 
			tr.find('.amt').val(amt);


			var amtcgst = amt*cgst/100; 
			var amtsgst = amt*sgst/100;

			tr.find('.amtcgst').val(amtcgst);
			tr.find('.amtsgst').val(amtsgst);

			total();

			}
		 }); 
		 
     	}); 
   
		 
	

	//Ajax Get item Method	

	//Ajax post invoice data Method	
	$('#save').on('click',function(e){
		 e.preventDefault();
   var invoiceno=$('#invoice-no').val();
		var invoicedate=$('#invoice-date').val();
		var dcdate=$('#dc-date').val();		 
		var customerid=$('#selectcustomer').val();
		var modepayment=$('#mode-payment').val();
		var roundoff=$('#round-off').html();
		var totalall=$('#total-all').html();

        var itemAmount1=$('#itemAmount_1').val();
      
		// $( "tr.border0" ).each(function() {

		// 	var invocearrydata[];

		//     $( this ).addClass( "foo" );


		// 	  tr.find('.rate').val(data.rate); 	
		// 	   tr.find('.hsnno').val(data.HSN_SAC); 			 
		// 	//var sgst = tr.find('.sgst').val();
		// 	tr.find('.sgst').val(data.centraltax); 
		// 	//var cgst = tr.find('.cgst').val();
		// 	tr.find('.cgst').val(data.statetax); 

		// 	var qty = tr.find('.quantity').val();
		// 	var rate = tr.find('.rate').val();
			 
		// 	var sgst = tr.find('.sgst').val();

		// 	var cgst = tr.find('.cgst').val(); 
		// });

  				var invocearrydata = [];
			    $('tr.border0').each(function () {
			        //invocearrydata.push('HSNno'+ $(this).find('.hsnno').val());
			        obj = {};
   					//obj[text] = $input.val();
   					  obj["srno"]=$(this).find('.srno').val();
   					 obj["invoiceid"]=$(this).find('.srno').val();
			        obj["itemid"]=$(this).find('.selectitem').val();

              obj["itemmodelnumber"]=$(this).find('.selecteditemname').val();
                 obj["itemname"]=$(this).find('.serialno').val();
       

			         obj["hsn_sac"]=$(this).find('.hsnno').val();
			          obj["quantity"]=$(this).find('.quantity').val();
			           obj["rate"]=$(this).find('.rate').val();

			            obj["amount"]=$(this).find('.amt').val();
                    obj["cgstper"]=$(this).find('.cgst').val();
                    obj["sgstper"]=$(this).find('.sgst').val();
			           obj["sgstamt"]=$(this).find('.amtsgst').val();
			              obj["cgstamt"]=$(this).find('.amtcgst').val();
                    var val1 =$(this).find('.amtcgst').val();
                    var val2 =$(this).find('.amtsgst').val();
                    var valtotal=  parseFloat(val1) +  parseFloat(val2);

                    // alert(valtotal);
                     obj["totaltax"]= valtotal;

			       
			    	invocearrydata.push(obj);
			    });
           var invocearrydatajason = JSON.stringify(invocearrydata);
			   // alert( JSON.parse(invocearrydatajason)); 
			    // alert(JSON.stringify(x));
  // alert(JSON.stringify(invocearrydatajason));
// ;			    console.log(invocearrydata);
// 			    debugger;
		// $.post(myurl + '/invoice/postinvoice',{FirstName:fname, LastName:lname}, function(data){

		// 	console.log(data);
		// 	$('#ajaxResponse').html(data);
		// });
		// var datastring =[fname, lname];

		if( itemAmount1 > 1)
		{
			   
		$.ajax({
			type:'POST',
			url: myurl + '/invoice/postinvoice',

			data: {'invoiceno':invoiceno, 'invoicedate':invoicedate, 'dcdate':dcdate,  'customerid':customerid,  'modepayment':modepayment,  'roundoff':roundoff,  'totalall':totalall, 'invocearrydatajason':invocearrydatajason},

			success: function(data){
				 // console.log(data);
		 	       $('#ajaxResponse').html("Invoice Added Successfully").fadeOut(2000);
		 	        $('#create-new').show();
		 	        $('#save').hide();	
               $('#print-invoice').attr("href", "showinvoice/"+data);	 
                $('#print-dc').attr("href", "showinvoicedc/"+data);         	      
		 	        $('#print-invoice').show();
		 	         $('#invoiceidd').val(data);
		 	       $('#print-dc').show();
			}
		});

		}
		else{
			alert('Please fill data Correctly');
		}

	});

	//Ajax post invoice data Method
 
});

</script>
 
   <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
<input type="hidden" id="invoiceidd" >
<div class="clearfix"></div>
 
 

@endsection
