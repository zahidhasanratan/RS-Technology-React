@extends('layouts.app2')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
@endpush
@section('title','All Approved List')
@section('content')

    <div id="wrapper">

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>All Approved List</h2>
                        {{--<a style="float:right" href="{{ route('dmcday.create') }}" class="btn btn-primary square-btn-adjust">Add News</a>--}}
                        <div class="row">

                        </div>
                    </div>


                    <hr />


                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Approved List
                            </div>
                            <div class="panel-body">

                                @include('layouts.partial.msg')
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Gender</th>
                                            <th>Batch</th>
                                            <th>Life Member No.</th>
                                            <th>Tshirt Size</th>
                                            <th>Acoompany?</th>
                                            <th><10 Year</th>
                                            <th>10 Year +</th>
                                            <th>Spouse?</th>
                                            <th>Total</th>

                                            <th width="17%;">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($news as $key=>$news)
                                            <tr class="odd gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $news->name }}</td>
                                                <td>{{ $news->email }}</td>
                                                <td>{{ $news->mobile }}</td>
                                                <td>{{ $news->gender }}</td>
                                                <td>{{ $news->batch }}</td>
                                                <td>{{ $news->lifeno }}</td>
                                                <td>{{ $news->size }}</td>
                                                <td>{{ $news->acoompany }}</td>
                                                <td>{{ $news->belowperson }}</td>
                                                <td>{{ $news->aboveperson }}</td>
                                                <td>@if($news->spouse !='') Yes @endif </td>
                                                @php
                                                    $btprice = $news->btprice;
                                                    if($news->spouse !='') $spouse ='1500'; else $spouse='0';
                                                    if($news->plus10 !='') $plus10 = ($news->plus10 * 1500); else $plus10='0';
                                                @endphp
                                                <td>{{ $total = $btprice + $spouse + $plus10 }}/=</td>
                                                <td>
                                                    <a href="{{route('dmc.ticket',$news->random)}}" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-file-pdf-o"></i> Ticket</a>

                                                    <form id="delete-form-{{ $news->id }}" action="{{ route('news.destroy',$news->id) }}" style="display: none;" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>

                                                    {{--<button type="submit" onclick="if(confirm('Are you sure? You want to delete this?')){--}}
                                                    {{--event.preventDefault();--}}
                                                    {{--document.getElementById('delete-form-{{ $news->id }}').submit();--}}
                                                    {{--}else {--}}
                                                    {{--event.preventDefault();--}}
                                                    {{--}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>--}}


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
@push('js')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.5/dist/FileSaver.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: 'Export to Excel',
                    exportOptions: {
                        columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
                    }
                },
                'pdfHtml5',

            ]
        });
    });
</script>
@endpush