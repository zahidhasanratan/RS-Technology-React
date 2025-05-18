
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('')}}bootstrap.css">
  <link rel="stylesheet" href="{{ asset('')}}solaimanlipi.css">
  <link rel="stylesheet" href="{{ asset('')}}style.css">

  <!-- <link rel="stylesheet" href="/static/bootstrap.css">
      <link rel="stylesheet" href="/static/solaimanlipi.css"> -->
  <!-- <link rel="stylesheet" href="/static/style.css"> -->
  <style>
    td {
      padding: 3px 9px;
    }

    #myImg {
      border-radius: 5px;
      cursor: pointer;
      transition: 0.3s;
    }


    #myImg:hover {
      opacity: 0.7;
    }

    .modal {
      transition: 3s;
      display: none;
      position: fixed;
      z-index: 1;
      padding-top: 100px;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.8);
    }

    .b_bottom {
      border-bottom: 1px solid #333;
      padding-left: 0px;
    }
    .res_image {
      width: 100%;
      max-width: 450px;
      height: auto;
    }
  </style>
  <title>Money Receipt</title>
</head>

<body style="background: whitesmoke;">
<div class="container-fluid" style="max-width: 800px; background: #fff;">
  <!-- <div class="row">
      <div class="col">
          <div id="myModal" class="modal" style="text-align: center;">
              <div>
                  <button class="btn btn-light" id="close" style="margin-left: 22%;"><b>X</b></button>
              </div>
              <div>
                  <a class="myImg" href="#"
                      target="_blank" rel="noopener noreferrer">
                      <img id="myImg" src="https://um.pe/static/app_qrcode.png" alt="Qr Code Image"
                          class="img img-responsive res_image">
                  </a>
              </div>
          </div>
      </div>
  </div> -->
  <div class="row text-center mb-5">
    <div class="col-sm-12 pt-3">
      <img class="logo-main" src="{{ asset('')}}logo/logo.png" alt="Company Logo" class="img img-responsive">

    </div>
    <div class="col-sm-12">
                <span style="white-space: pre-line">Head Office: Ta- 99, Homestead Gulshan Link Tower, Gulshan- Badda Link Road, 
Middle Badda, Dhaka 1212, Phone: 09666-771771, Fax: 02-8834170, 
email: apgic@bdcom.com web: www.apgicl.com</span>
    </div>
  </div>

  <div class="row justify-content-between">
    <div class="col d-inline-block">
      <label for="BIN">BIN : 002226891-0101</label>
    </div>
    <div class="col d-inline-block d-print-none text-end">
      <a href="{{route('money.pdf',$money->id)}}" target="_blank" style="font-size: 18px">
        Download PDF
      </a>
    </div>
  </div>

  <div class="pe-3">
    <div class="row mt-1">
      <div class="col text-center">
        <label for="">MONEY RECEIPT</label>
        <p style="font-size: 11px">MUSHAK : 6.3</p>
      </div>
    </div>
    <div class="row py-4">
      <div class="col-sm-12 col-md-6">
        <div class="row no-gutters">
          <div class="col-5">Issuing Office</div>
          <div class="col-7">
            <div style="float: left; padding-right: 5px;">:</div>
            <div style="float: left;"> {{ $money->issuing_office }}</div>
          </div>
        </div>
        <div class="row">
          <div class="col-5">Money Receipt No.</div>
          <div class="col-7">
            <div style="float: left; padding-right: 5px;">:</div>
            <div style="float: left;">{{ $money->money_receipt_no }}</div>
          </div>
        </div>

      </div>
      <div class="row pe-0">
        <div class="col-sm-6 col-md-6">
          <div class="row no-gutters">
            <div class="col-5">Class of Insurance</div>
            <div class="col-7">
              <div style="float: left; padding-left: 3px; padding-right: 5px;">:</div>
              <div style="float: left;">{{ $money->class_of_insurance }}</div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 text-end pe-0">
          {{--Date : {{ $money->dated }} --}}
          {{ date('d-m-Y', strtotime($money->dated)) }}
        </div>
      </div>
    </div>
    <div class="row my-2">
      <div class="col-4">
        <span class="fw-bold">Received with thanks from</span>
      </div>
      <div class="col-8 b_bottom">
        <span>{{ $money->thanks_from }}</span>
      </div>
    </div>
    <div class="row align-items-end mb-2">
      <div class="col-2">
        <span>The sum of</span>
      </div>
      <div class="col-10 b_bottom">
       Tk. {{ number_format("$money->sum_of_tk",2) }} (<?php
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
        taka)
      </div>
    </div>
    <div class="row align-items-end mb-2">
      <div class="col-2">
        <span>Mode of Payment</span>
      </div>
      <div class="col-7 b_bottom">
        {{ $money->mode_of_payement }}
      </div>
      <div class="col-1 text-end">
        <span>Dated</span>
      </div>
      <div class="col-2 b_bottom">
        {{ date('d-m-Y', strtotime($money->dated)) }}
      </div>
    </div>
    <div class="row align-items-end mb-2">
      <div class="col-2">
        <span>Drawn on</span>
      </div>
      <div class="col-10 b_bottom">
        {{ $money->drawn_on }}
      </div>
    </div>
    <div class="row align-items-end mb-2">
      <div class="col-2">
        <span>Issued against</span>
      </div>
      <div class="col-10 b_bottom">
        {{ $money->issue_against }}
      </div>
    </div>

    <div class="row">
      <div class="col-6  mt-4">
        <table>
          <tr>
            <td style="width: 40%;" class="ps-2">Premium</td>
            <td style="width: 15%;" class="text-center">BDT</td>
            <td class="text-end pe-2">{{ number_format("$money->Premium",2) }}</td>
          </tr>
    
          <tr>
            <td class="ps-2">Vat</td>
            <td class="text-center">BDT</td>
            <td class="text-end pe-2">{{ number_format("$money->vat",2) }}</td>
          </tr>
      @if($money->stamp !='')
          <tr>
            <td class="ps-2">Stamp</td>
            <td class="text-center">BDT</td>
            <td class="text-end pe-2">{{ number_format("$money->stamp",2) }}</td>
          </tr>
          @endif

          <tr style="background-color: lightgray;">
            <td class="ps-2">Total</td>
            <td class="text-center">BDT</td>
            <td class="text-end pe-2">{{ number_format("$money->sum_of_tk",2) }}</td>
          </tr>

        </table>
      </div>
      <!-- <div class="col-6 text-center">
          <img src="" alt="qrCodeImage" class="qr-code img-responsive" />
      </div> -->
    </div>
    <div class="row mt-4">
      <div class="col-12 text-center font-weight-bold" style="color: gray; font-size: small;">
        This RECEIPT is computer generated, authorized signature is not required.
      </div>
    </div>
    <div class="row" style="margin-left: -1px; margin-right: -13px">
      <div class="col-12 text-center fbg">
        Receipt valid subject to encashment of cheque/P.O./D.D.
      </div>
    </div>
  </div>
  
  <!--<div class="row pb-2">-->
  <!--  <label for="" style="color: red;">* Note: If have any complain about Insurance, call 16130.</label>-->
  <!--</div>-->

</div>



<!-- <script src="/static/bootstrap.bundle.js"></script> -->
</body>

</html>