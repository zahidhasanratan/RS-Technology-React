@extends('layouts.app')

@section('title','All Money Receipt')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>All Money Receipt</h2>
                    <a style="float:right" href="{{ route('money_receipt.create') }}" class="btn btn-primary square-btn-adjust">Add Money Receipt</a>
                    <div class="row">

                </div>
            </div>


            <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Money Receipt
                        </div>
                        <div class="panel-body">

                            @include('layouts.partial.msg')
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Dated</th>
                                        <th>Issuing Office</th>
                                        <th>Money Receipt</th>
                                        <th>Class of Insurance</th>
                                        <th>Total</th>
                                        <th width="17%;">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($money as $key=>$slider)
                                    <tr class="odd gradeX">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $slider->dated }}</td>
                                        <td>{{ $slider->issuing_office }}</td>
                                        <td class="center">{{ $slider->money_receipt_no }}</td>
                                        <td class="center">{{ $slider->class_of_insurance }}</td>
                                        <td class="center">{{ $slider->total }}</td>
                                        <td style="width: 30%">
                                            <a target="_blank" href="{{route('money.pdf',$slider->id)}}" class="btn btn-info btn-sm"><i class="fa fa-file-pdf-o"></i> Pdf</a>
                                            <a target="_blank" href="{{route('money.details',$slider->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> View</a>
                                            <a href="{{route('money_receipt.edit',$slider->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>

                                            <form id="delete-form-{{ $slider->id }}" action="{{ route('money_receipt.destroy',$slider->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="submit" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $slider->id }}').submit();
                                                    }else {
                                                    event.preventDefault();
                                                    }" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach



                                </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>

        </div>

    </div>
    <!-- /. PAGE INNER  -->
</div>

@endsection

