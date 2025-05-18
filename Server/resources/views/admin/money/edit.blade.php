@extends('layouts.app')

@section('title','Edit Money Receipt')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Money Receipt</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Money Receipt
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('money_receipt.update',$slider->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label>Issuing Office *</label>
                                            <input type="text" class="form-control" name="issuing_office" placeholder="Issuing Office" value="{{ $slider->issuing_office }}" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Money Receipt No *</label>
                                            <input type="text" class="form-control" name="money_receipt_no" placeholder="Money Receipt No" value="{{ $slider->money_receipt_no }}" required/>
                                        </div>

                                        <div class="form-group">
                                            <label>Class of Insurance *</label>
                                            <input type="text" class="form-control" name="class_of_insurance" placeholder="Class of Insurance" value="{{ $slider->class_of_insurance }}" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Received with thanks from *</label>
                                            <input type="text" class="form-control" name="thanks_from" placeholder="Received with thanks frome" value="{{ $slider->thanks_from }}" required/>
                                        </div>

                                        <div class="form-group">
                                            <label>Mode of Payment *</label>
                                            <input type="text" class="form-control" name="mode_of_payement" placeholder="Mode of Payment" value="{{ $slider->mode_of_payement }}" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Dated *</label>
                                            <input type="date" class="form-control" name="dated" placeholder="dated" value="{{ $slider->dated }}" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Drawn on *</label>
                                            <input type="text" class="form-control" name="drawn_on" placeholder="Drawn on" value="{{ $slider->drawn_on }}" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Issue Against *</label>
                                            <input type="text" class="form-control" name="issue_against" placeholder="Issue Against" value="{{ $slider->issue_against }}" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Premium</label>
                                            <input type="number" class="form-control" name="Premium" value="{{ $slider->Premium }}" placeholder="Premium" />
                                        </div>
                                         <div class="form-group">
                                            <label>VAT</label>
                                            <input type="number" class="form-control" name="vat" value="{{ $slider->vat }}" placeholder="VAT" />
                                        </div>

                                        <div class="form-group">
                                            <label>Stamp</label>
                                            <input type="number" class="form-control" name="stamp" value="{{ $slider->stamp }}" placeholder="Stamp" />
                                        </div>
                                       


                                        <a href="{{ route('money_receipt.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Update</button>

                                    </form>
                                    <br />




                                </div>
                            </div>
                        </div>
                        <!-- End Form Elements -->
                    </div>
                </div>
                <!-- /. ROW  -->

                <!-- /. ROW  -->
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->

@endsection