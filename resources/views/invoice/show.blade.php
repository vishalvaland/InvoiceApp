@extends('layouts.app')

@section('content')
show
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
                     <h2 style="text-align: center;">TAX INVOICE</h2>
    <table style="width: 100%;">
        <tr>
            <td style="width: 60%" rowspan="2">
                <b>Amee Electroninics</b> <br>  
               
                    7/2 Morlidhar Society,
                    <br> Odhav Road,Ahmedabad-382415.
                    <br> (P) 079-22893631
                    <br> (M) 98242 40142
                    <br>
                    <b>GST No. 24075103999</b>
                 
            </td>
            <td>Invoice No.
                <br><b>001</b> </td>
            <td>Date
                <br><b>02-04-2017</b> </td>
        </tr>
        <tr>
            <td>Delivery Note No.
                <br>
                <b>001</b>
            </td>
            <td>Delivery Note Date
                <br>
                <b>02-04-2017</b>
            </td>
        </tr>
        <tr>
            <td rowspan=" 2">Buyer
                <br>
                <b>Vishal Parekh</b> <br> 
              
                    Bhavda Society,
                    <br> Odhav Road,Ahmedabad-382415.
                    <br> (M) 98989 898989
                    <br>
                    <b>GST No. 24075103333</b>
                    
            </td>
            <td colspan="2">Mode/Terms of Payment<br> 
            <b>Cheque</b> 
                
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
    <table style="width: 100%">
        <tr>
            <td style="width: 5%">Sr No</td>
            <td style="width: 45%">Description Of Items</td>
            <td style="width: 10%">HSN/SAC</td>
            <td style="width: 10%">Quality</td>
            <td style="width: 15%;">Rate</td>
            <td style="width: 15%;">Amount</td>
        </tr>
        <tr style="height: 180px;font-weight:bold">
            <td>1</td>
            <td>LG LED TV</td>
            <td>12454</td>
            <td>1</td>
            <td>25,000</td>
            <td style="text-align: right;">25,000.10</td>
        </tr>
        <tr style="font-weight:bold">
            <td colspan="5" style="text-align: right;">SGST (14%) </td>
            <td style="width: 15%;text-align: right;">800</td>
        </tr>
        <tr style="font-weight:bold">
            <td colspan="5" style="text-align: right;">CGST (14%) </td>
            <td style="width: 15%;text-align: right;">800</td>
        </tr>
        <tr style="font-weight:bold">
            <td colspan="5" style="text-align: right;">Round Off</td>
            <td style="width: 15%;text-align: right;">- 0.10</td>
        </tr>
        <tr style="font-weight:bold">
            <td colspan="5" style="text-align: right;">Total Amount(Rs.)</td>
            <td style="width: 15%;text-align: right;">25,000</td>
        </tr>
    </table>
    <br>
    <table style="border: 1px solid black; padding: 5px; border-collapse: collapse; width:100%">
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
          <td rowspan="2"  style="width:20%">
            taxable Value
            </td>
            <td colspan="2"  style="width:20%">
            Central Tax
            </td>
            <td colspan="2"  style="width:20%">
            State Tax
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
        <tr>
          <td>12454</td>
          <td>25,000.10</td>
          <td>14%</td>
          <td>800</td>
          <td>14%</td>
          <td>800</td>
        </tr>
         <tr>
          <td><b>
            Total
          </b></td>
          <td><b>25,000.10</b></td>
          <td> </td>
          <td><b>800</b></td>
          <td> </td>
          <td><b>800</b></td>
        </tr>
         <tr>
            <td colspan="6">
                Tax Amount (In Word)
                <br>
                <b>One Thousant six hundred only</b>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="width: 50%">Customer Signature</td>
            <td colspan="4" style="width: 50%">For, Amee Electronics
                <br>
                <p style="text-align: right;">Authorised Singature</p>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                Declaration
                <br> We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct.
            </td>
        </tr>
    </table>
    <div style="width: 100%;text-align: center;"> <small>This is computer generated Invoice</small> </div>


@endsection
