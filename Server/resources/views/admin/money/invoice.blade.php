<body>
<div id="invoiceholder">
  <div id="invoice" class="effect2">



    <!-- Header -->
    <div id="invoice-top">
      <div class="logo">
        {{--<img src="data:image/png;base64, {!! base64_encode($qrCode) !!} ">--}}

        {{--<img class="logo-main" src="http://m.apgicl.com/logo/logo.png" alt="PDF LOGO" class="img img-responsive">--}}

        <img style="margin-left: 25%;
    display: block;
    text-align: center;
    width: 380px;"  src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/logo/logo.png'))) }}" >

      </div>
      <div class="ofc-add">
        <p style="line-height: 20px;">Head Office: Ta-99, Homestead Gulshan Link Tower, Gulshan- Badda Link Road,</p>
        <p style="line-height: 20px;">Middle Badda, Dhaka 1212, Phone: 09666-771771, Fax: 02-8834170,</p>
        <p style="line-height: 20px;">email: apgic@bdcom.com web: www.apgicl.com</p>

      </div>
    </div>
    <!--End: Header -->


    <div id="invoice-mid">

      <div class="invoice-mid-top">
        <p>BIN: 000226891-0101</p>
        <h3 style="line-height: 20px; font-size:18px; font-weight:nornmal">Money Receipt</h3>
        <h5 style="line-height: 20px; font-weight:nornmal; font-size:14px ">MUSHAK: 6.3</h5>
      </div>


      <div class="clearfix">
        <div class="col-left">
          <div class="clientinfo">
            <p>
              <span id="address">Issuing Office</span>
              <br>
              <span id="city">Money Receipt No</span>
              <br>
              <span id="country">Class of Insurance</span>

            </p>
          </div>
          <div class="clientinfo">
            <p>
              <span id="address">: {{ $money->issuing_office }}</span>
              <br>
              <span id="city">: {{ $money->money_receipt_no }}</span>
              <br>
              <span id="country">: {{ $money->class_of_insurance }}</span>
            </p>
          </div>
        </div>

        <div class="col-right">
          <p class="date">Date: {{ date('d-m-Y', strtotime($money->dated)) }}</p>
        </div>
      </div>




      <!-- Message -->
      <div id="table">
        <table class="table-main">
          <tbody>
          <tr class="list-item total-row" style="margin-top: 50px">
            <th colspan="" class="tableitem-tb-left" style="text-align:left; width: 28%; font-size:14px !important; float:left">Received with thanks from </th>
            <td colspan="" data-label="Grand Total" class="tableitem-right" style="font-weight:normal; color:#000;  width: 72%;">{{ $money->thanks_from }}</td>
          </tr>
          </tbody>
        </table>
      </div>


      <!-- Paymnet -->
      <div id="table">
        <table class="table-main">
          <tbody>
          <tr class="list-item total-row" style="margin-top: 50px">
            <td class="tableit" style="text-align:left; font-size:14px !important">The Sum of </td>

            <td colspan="4" class="tableit-rgt" style="font-weight:normal; font-size:14px !important">Tk. {{ number_format("$money->sum_of_tk",2) }} (<?php
                class numbertowordconvertsconver {
                    function convert_number($number)
                    {
                        if (($number < 0) || ($number > 999999999))
                        {
                            throw new Exception('Number is out of range');
                        }
                        $giga = floor($number / 10000000);
                        // Millions (giga)
                        $number -= $giga * 10000000;

                        $lac = floor($number / 100000);
                        // Thousands (kilo)
                        $number -= $lac * 100000;


                        $kilo = floor($number / 1000);
                        // Thousands (kilo)
                        $number -= $kilo * 1000;


                        $hecto = floor($number / 100);
                        // Hundreds (hecto)
                        $number -= $hecto * 100;
                        $deca = floor($number / 10);
                        // Tens (deca)
                        $n = $number % 10;
                        // Ones
                        $result = '';
                        if ($giga)
                        {
                            $result .= $this->convert_number($giga) .  ' Crore';
                        }

                        if ($lac)
                        {
                            $result .= (empty($result) ? '' : ' ') .$this->convert_number($lac) . ' Lac';
                        }

                        if ($kilo)
                        {
                            $result .= (empty($result) ? '' : ' ') .$this->convert_number($kilo) . ' Thousand';
                        }
                        if ($hecto)
                        {
                            $result .= (empty($result) ? '' : ' ') .$this->convert_number($hecto) . ' Hundred';
                        }
                        $ones = array('', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eightteen', 'Nineteen');
                        $tens = array('', '', 'Twenty', 'Thirty', 'Fourty', 'Fifty', 'Sixty', 'Seventy', 'Eigthy', 'Ninety');
                        if ($deca || $n) {
                            if (!empty($result))
                            {
                                $result .= ' and ';
                            }
                            if ($deca < 2)
                            {
                                $result .= $ones[$deca * 10 + $n];
                            } else {
                                $result .= $tens[$deca];
                                if ($n)
                                {
                                    $result .= '-' . $ones[$n];
                                }
                            }
                        }
                        if (empty($result))
                        {
                            $result = 'zero';
                        }
                        return $result;
                    }
                }
                ?>

                <?php
                $class_obj = new numbertowordconvertsconver();
                $convert_number = $money->sum_of_tk;
                echo $class_obj->convert_number($convert_number);
                ?>
              taka)</td>
          </tr>

          <tr class="list-item total-row" style="margin-top: 50px">
            <td class="tableit" style="text-align:left; font-size:14px !important; width:17%">Mode of Payment </td>

            <td class="tableit-rgt" style="font-weight:normal; width:58%; font-size:14px !important "> ({{ $money->mode_of_payement }})</td>

            <td class="tableit" style="text-align:center; width:12%; font-size:14px !important">Dated  </td>

            <td class="tableit-rgt" style="font-weight:normal; width:13%; font-size:14px !important"> {{ date('d-m-Y', strtotime($money->dated)) }}</td>
          </tr>

          <tr class="list-item total-row" style="margin-top: 50px">
            <td class="tableit" style="text-align:left; font-size:14px !important">Drawn on </td>

            <td colspan="4" class="tableit-rgt" style="font-weight:normal; font-size:14px !important"> {{ $money->drawn_on }}</td>
          </tr>

          <tr class="list-item total-row" style="margin-top: 50px">
            <td class="tableit" style="text-align:left; font-size:14px !important">Issued against  </td>

            <td colspan="4" class="tableit-rgt" style="font-weight:normal; font-size:14px !important"> {{ $money->issue_against }}</td>
          </tr>


          </tbody>
        </table>
      </div>
      <!-- Paymnet -->

    </div>
    <!--End Invoice Mid-->

    <div class="main-table-two">
      <div class="tab-left-side">
        <table class="table table-bordered table-total" style="border:1px solid #333 !important" aria-label="TABLE">
          <tbody role="rowgroup">
          <tr role="row">
            <td style="border:1px solid #333 !important; font-size: 14px !important; padding: 3px 9px !important;">Premium</td>
            <td style="border:1px solid #333 !important; font-size: 14px !important; padding: 3px 9px !important;">BDT</td>
            <td style="border:1px solid #333 !important; font-size: 14px !important; text-align: right !important; padding: 3px 9px !important; font-weight:normal !important;">{{ number_format("$money->Premium",2) }}</td>
          </tr>
          
          <tr role="row">
            <td style="border:1px solid #333 !important; font-size: 14px !important; padding: 3px 9px !important;">VAT</td>
            <td style="border:1px solid #333 !important; font-size: 14px !important; padding: 3px 9px !important;">BDT</td>
            <td style="border:1px solid #333 !important; font-size: 14px !important; text-align: right !important; padding: 3px 9px !important; font-weight:normal !important;">{{ number_format("$money->vat",2) }}</td>
          </tr>
          @if($money->stamp !='')
            <tr role="row">
              <td style="border:1px solid #333 !important; font-size: 14px !important; padding: 3px 9px !important;">Stamp</td>
              <td style="border:1px solid #333 !important; font-size: 14px !important; padding: 3px 9px !important;">BDT</td>
              <td style="border:1px solid #333 !important; font-size: 14px !important; padding: 3px 9px !important; text-align: right !important; font-weight:normal !important;">{{ number_format("$money->stamp",2) }}</td>
            </tr>
          @endif

          <tr role="row">
            <th style="border:1px solid #333 !important; font-size: 14px !important; font-weight:normal !important;">Total</th>
            <th style="border:1px solid #333 !important; font-size: 14px !important; font-weight:normal !important;">BDT</th>
            <th style="border:1px solid #333 !important; font-size: 14px !important; text-align: right !important; font-weight:normal !important; ">{{ number_format("$money->sum_of_tk",2) }}</th>
          </tr>
          </tbody>
        </table>
      </div>
      <div class="tab-right-side">
        <div class="br-code">
          <img style="height: 130px;width:130px;" src="data:image/png;base64, {!! base64_encode($qrCode) !!} ">
        </div>

      </div>
    </div>

    <!--End InvoiceBot-->
    <footer>
      <div id="legalcopy" class="clearfix">
        <h3 style="font-size: 14px;
    line-height: 9px;
    color: #222;
    font-weight:normal;
    /* padding: 0px; */
    margin: 8px;"> This RECEIPT is computer generated, authorized signature is not reqired.</h3>
        <p class="col-center" style="background-color: lightgray;
    line-height: 24px;
    padding: 0px;
    margin: 0px;">Receipt valid subject to encashment of cheque/P.O./D.D.</p>
        <p style="font-size: 13px;
    color: #f00;
    text-align: left;
    padding: 0px;
    /* line-height: 1.7em; */
    margin: 4px 0px;">
            <!--*Note: If have any compalin about insurance, call 16130.-->
            
            </p>
      </div>
    </footer>


  </div>
  <!--End Invoice-->
</div>
<!-- End Invoice Holder-->
<style>
  .logo-name {
    font-size: 12px;
    text-align: center;
    padding: 3px 0;
    margin: 0px;
  }
  .ofc-add{}
  .ofc-add p {
    font-size: 14px;
    line-height: 6px;
    text-align: center;
    padding: 0px;
  }
  .main-table-two {
    padding: 10px 20px 30px 20px;
    /*      border: 1px solid #f00;*/
    min-height: 247px;
  }
  .tab-left-side {
    width: 45%;
    float: left;
  }

  .tab-right-side{
    width: 55%;
    float: left;
  }
  .table-total tr td{
    border: 1px solid #cccaca !important;
  }

  .table-total tr th {
    border: 1px solid #cccaca !important;
    background-color: lightgray;
  }
  .br-code {
    margin: 0 auto;
    display: block;
    text-align: center;
  }
  .br-code img{
    width: 180px;
  }


  .invoice-mid-top{

  }

  .invoice-mid-top p{
    font-size: 14px;
  }
  .invoice-mid-top h3 {
    text-align: center;
    text-transform: uppercase;
    font-size: 20px;
    line-height: 6px;
    padding: 0px;
    margin: 0px;
  }
  .invoice-mid-top h5 {
    text-align: center;
    text-transform: uppercase;
    font-size: 16px;
    line-height: 7px;
    font-weight: normal;
  }

  .table-row-custom td {
    font-weight: normal !important;
    padding: 5px 5px !important;
  }

  #legalcopy {
    text-align: center;
  }

  .date {
    text-align: right;
    font-size: 14px;
    vertical-align: bottom;
    padding-top: 44%;
  }
  .tableitem-tb-left {
    width: 27%;
    vertical-align: top;
    padding: 0px;
  }

  .tableitem-right {
    padding: 0px;
    font-size: 13px !important;
    line-height: 21px;
    color: #373636;
  }

  .tableit {
    padding: 0px;
    font-weight: normal !important;
  }

  .tableit-rgt {
    border-bottom: 1px solid #867e7e !important;
    font-weight: normal !important;
    padding-bottom: 6px;
    padding-left: 0px !important;
  }
  @import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,900,700,500,300,100);



  * {
    margin: 0;
    box-sizing: border-box;
    -webkit-print-color-adjust: exact;
  }

  body {
    /*background: #E0E0E0;*/
    font-family: 'Roboto', sans-serif;
    font-size:14px !important;
  }

  ::selection {
    background: #f31544;
    color: #FFF;
  }

  ::moz-selection {
    background: #f31544;
    color: #FFF;
  }

  .clearfix::after {
    content: "";
    clear: both;
    display: table;
  }

  .col-left {
    float: left;
  }

  .col-right {
    float: right;
  }

  h1 {
    font-size: 1.5em;
    color: #444;
  }

  h2 {
    font-size: .9em;
  }

  h3 {
    font-size: 1.2em;
    font-weight: 300;
    line-height: 2em;
  }

  p {
    font-size: 14px !important;
    color: #000;
    line-height: 1.7em;
  }

  a {
    text-decoration: none;
    color: #00a63f;
  }

  #invoiceholder {
    width: 100%;
    /*height: 100%;*/
    padding: 50px 0;
  }

  #invoice {
    position: relative;
    margin: 0 auto;
    /*width: 700px;*/
    width: 770px;
    background: #FFF;
  }

  [id*='invoice-'] {
    /* Targets all id with 'col-' */
    /*  border-bottom: 1px solid #EEE;*/
    padding: 10px 20px 30px 20px;
  }

  #invoice-top {
    /*      border-bottom: 2px solid #00a63f;*/
  }

  #invoice-mid {
    /*min-height: 110px;*/
  }

  #invoice-bot {
    /*min-height: 240px;*/
  }

  .logo {
    display: inline-block;
    vertical-align: middle;
    width: 100%;
    overflow: hidden;
  }
  /*.logo img {*/
  /*max-width: 500px;*/
  /*margin: 0 auto;*/
  /*display: block;*/
  /*}*/

  .info {
    display: inline-block;
    vertical-align: middle;
    margin-left: 20px;
  }

  /*.logo img,*/
  /*.clientlogo img {*/
  /*width: 100%;*/
  /*}*/

  .clientlogo {
    display: inline-block;
    vertical-align: middle;
    width: 50px;
  }

  .clientinfo {
    display: inline-block;
    vertical-align: middle;
    margin-right: 20px;
  }

  .title {
    float: right;
  }

  .title p {
    text-align: right;
  }

  #message {
    margin-bottom: 30px;
    display: block;
  }

  h2 {
    margin-bottom: 5px;
    color: #444;
  }

  .col-right td {
    color: #666;
    padding: 5px 8px;
    border: 0;
    font-size: 0.75em;
    border-bottom: 1px solid #eeeeee;
  }

  .col-right td label {
    margin-left: 5px;
    font-weight: 600;
    color: #444;
  }

  .cta-group a {
    display: inline-block;
    padding: 7px;
    border-radius: 4px;
    background: rgb(196, 57, 10);
    margin-right: 10px;
    min-width: 100px;
    text-align: center;
    color: #fff;
    font-size: 0.75em;
  }

  .cta-group .btn-primary {
    background: #00a63f;
  }

  .cta-group.mobile-btn-group {
    display: none;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  td {
    padding: 10px;
    border-bottom: 1px solid #cccaca;
    font-size: 0.70em;
    text-align: left;
  }

  .tabletitle th {
    border-bottom: 2px solid #ddd;
    text-align: left;
  }

  .tabletitle th:nth-child(2) {
    text-align: left;
  }

  th {
    font-size: 0.7em;
    text-align: left;
    padding: 5px 10px;
  }

  .item {
    width: 50%;
  }

  .list-item td {
    text-align: left;
  }

  .list-item td:nth-child(2) {
    text-align: left;
  }

  .total-row th,
  .total-row td {
    text-align: right;
    /*font-weight: 700;*/
    font-size: .75em;
    border: 0 none;
  }

  .table-main {}

  footer {
    padding: 15px 20px;
  }



  @media screen and (max-width: 767px) {
    h1 {
      font-size: .9em;
    }

    #invoice {
      width: 100%;
    }

    #message {
      margin-bottom: 20px;
    }

    [id*='invoice-'] {
      padding: 20px 10px;
    }



    .title {
      float: none;
      display: inline-block;
      vertical-align: middle;
      margin-left: 40px;
    }

    .title p {
      text-align: left;
    }

    .col-left,
    .col-right {
      width: 100%;
    }

    .table {
      margin-top: 20px;
    }

    #table {
      white-space: nowrap;
      overflow: auto;
    }

    td {
      white-space: normal;
    }

    .cta-group {
      text-align: center;
    }

    .cta-group.mobile-btn-group {
      display: block;
      margin-bottom: 20px;
    }

    /*==================== Table ====================*/
    .table-main {
      border: 0 none;
    }

    .table-main thead {
      border: none;
      clip: rect(0 0 0 0);
      height: 1px;
      margin: -1px;
      overflow: hidden;
      padding: 0;
      position: absolute;
      width: 1px;
    }

    .table-main tr {
      border-bottom: 2px solid #eee;
      display: block;
      margin-bottom: 20px;
    }

    .table-main td {
      font-weight: 700;
      display: block;
      padding-left: 40%;
      max-width: none;
      position: relative;
      border: 1px solid #cccaca;
      text-align: left;
    }

    .table-main td:before {
      /*
      * aria-label has no advantage, it won't be read inside a table
      content: attr(aria-label);
      */
      content: attr(data-label);
      position: absolute;
      left: 10px;
      font-weight: normal;
      text-transform: uppercase;
    }

    .total-row th {
      display: none;
    }

    .total-row td {
      text-align: left;
    }

    footer {
      text-align: center;
    }
  }


</style>
</body>