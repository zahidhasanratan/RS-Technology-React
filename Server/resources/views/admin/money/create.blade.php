@extends('layouts.app')

@section('title','Add Money Receipt')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Money Receipt</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Money Receipt
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('money_receipt.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Issuing Office *</label>
                                            <input type="text" class="form-control" name="issuing_office" placeholder="Issuing Office" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Money Receipt No *</label>
                                            <input type="text" class="form-control" name="money_receipt_no" placeholder="Money Receipt No" required/>
                                        </div>

                                        <div class="form-group">
                                            <label>Class of Insurance *</label>
                                            <input type="text" class="form-control" name="class_of_insurance" placeholder="Class of Insurance" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Received with thanks from *</label>
                                            <input type="text" class="form-control" name="thanks_from" placeholder="Received with thanks frome" required/>
                                        </div>

                                        <div class="form-group">
                                            <label>Mode of Payment *</label>
                                            <input type="text" class="form-control" name="mode_of_payement" placeholder="Mode of Payment" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Dated *</label>
                                            <input type="date" class="form-control" name="dated" placeholder="dated" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Drawn on *</label>
                                            <input type="text" class="form-control" name="drawn_on" placeholder="Drawn on" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Issue Against *</label>
                                            <input type="text" class="form-control" name="issue_against" placeholder="Issue Against" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Premium</label>
                                            <input type="number" class="form-control" name="Premium" placeholder="Premium" />
                                        </div>
                                         <div class="form-group">
                                            <label>VAT</label>
                                            <input type="number" class="form-control" name="vat" placeholder="VAT" value="0"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Stamp</label>
                                            <input type="number" class="form-control" name="stamp" placeholder="Stamp" />
                                        </div>
                                       <input type="hidden" name="userid" value="{{ Auth::user()->id }}">

                                        <a href="{{ route('money_receipt.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Save</button>

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