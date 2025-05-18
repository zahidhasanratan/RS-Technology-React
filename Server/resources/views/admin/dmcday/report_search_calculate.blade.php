@extends('layouts.app2')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
@endpush
@section('title','Search Result')
@section('content')

    <div id="wrapper">

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Search Result</h2>
                        {{--<a style="float:right" href="{{ route('dmcday.create') }}" class="btn btn-primary square-btn-adjust">Add News</a>--}}
                        <div class="row">

                        </div>
                    </div>


                    <hr />


                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form method="POST" action="{{route('newreport.search')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <label for="dropdown">Select Batch</label>
                                                <select name="batch" class="form-control form-control-custom-3">
                                                    <option value="">Select Option</option>

                                                    <option value="K-5">K-5</option>
                                                    <option value="K-6">K-6</option>
                                                    <option value="K-7">K-7</option>
                                                    <option value="K-8">K-8</option>
                                                    <option value="K-9">K-9</option>
                                                    <option value="K-10">K-10</option>
                                                    <option value="K-11">K-11</option>
                                                    <option value="K-12">K-12</option>
                                                    <option value="K-13">K-13</option>
                                                    <option value="K-14">K-14</option>
                                                    <option value="K-15">K-15</option>
                                                    <option value="K-16">K-16</option>
                                                    <option value="K-17">K-17</option>
                                                    <option value="K-18">K-18</option>
                                                    <option value="K-19">K-19</option>
                                                    <option value="K-20">K-20</option>

                                                    <option value="K-21">K-21</option>
                                                    <option value="K-22">K-22</option>
                                                    <option value="K-23">K-23</option>
                                                    <option value="K-24">K-24</option>
                                                    <option value="K-25">K-25</option>
                                                    <option value="K-26">K-26</option>
                                                    <option value="K-27">K-27</option>
                                                    <option value="K-28">K-28</option>
                                                    <option value="K-29">K-29</option>
                                                    <option value="K-30">K-30</option>
                                                    <option value="K-31">K-31</option>
                                                    <option value="K-32">K-32</option>
                                                    <option value="K-33">K-33</option>
                                                    <option value="K-34">K-34</option>
                                                    <option value="K-35">K-35</option>
                                                    <option value="K-36">K-36</option>
                                                    <option value="K-37">K-37</option>
                                                    <option value="K-38">K-38</option>
                                                    <option value="K-39">K-39</option>
                                                    <option value="K-40">K-40</option>
                                                    <option value="K-41">K-41</option>
                                                    <option value="K-42">K-42</option>
                                                    <option value="K-43">K-43</option>
                                                    <option value="K-44">K-44</option>
                                                    <option value="K-45">K-45</option>
                                                    <option value="K-46">K-46</option>
                                                    <option value="K-47">K-47</option>
                                                    <option value="K-48">K-48</option>
                                                    <option value="K-49">K-49</option>
                                                    <option value="K-50">K-50</option>
                                                    <option value="K-51">K-51</option>
                                                    <option value="K-52">K-52</option>
                                                    <option value="K-53">K-53</option>
                                                    <option value="K-54">K-54</option>
                                                    <option value="K-55">K-55</option>
                                                    <option value="K-56">K-56</option>
                                                    <option value="K-57">K-57</option>
                                                    <option value="K-58">K-58</option>
                                                    <option value="K-59">K-59</option>
                                                    <option value="K-60">K-60</option>
                                                    <option value="K-61">K-61</option>
                                                    <option value="K-62">K-62</option>
                                                    <option value="K-63">K-63</option>
                                                    <option value="K-64">K-64</option>
                                                    <option value="K-65">K-65</option>
                                                    <option value="K-66">K-66</option>
                                                    <option value="K-67">K-67</option>
                                                    <option value="K-68">K-68</option>
                                                    <option value="K-69">K-69</option>
                                                    <option value="K-70">K-70</option>
                                                    <option value="K-71">K-71</option>
                                                    <option value="K-72">K-72</option>
                                                    <option value="K-73">K-73</option>
                                                    <option value="K-74">K-74</option>
                                                    <option value="K-75">K-75</option>
                                                    <option value="K-76">K-76</option>
                                                    <option value="K-77">K-77</option>
                                                    <option value="K-78">K-78</option>
                                                    <option value="K-79">K-79</option>
                                                </select>
                                            </div>

                                        </div>


                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <label for="dropdown">Select T-shirt Size</label>
                                                <select name="size" class="form-control form-control-custom">
                                                    <option value="">Select Size</option>
                                                    <option>S -   (36-38) inches</option>
                                                    <option>M -  (38-40) inches</option>
                                                    <option>L -  (40-42) inches</option>
                                                    <option>XL -  (42-44) inches</option>
                                                    <option>XXL -  (46-48) inches</option>
                                                    <option>XXXL -  (48-50) inches</option>
                                                    <option>XXXXL -  (50-52) inches</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="dropdown">Select Gender</label>
                                                <select name="gender" class="form-control form-control-custom">
                                                    <option value="">Select Size</option>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <label for="dropdown">Select Game</label>
                                                <select name="game" class="form-control form-control-custom">
                                                    <option value="">Select Game</option>
                                                    <option>Table Tennis</option>
                                                    <option>Mini Basketball</option>
                                                    <option>Carrom Board </option>
                                                    <option>Ludo</option>
                                                    <option>Throw Darts</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="dropdown">Life Member</label>
                                                <select name="lifemember" class="form-control" id="dropdown">
                                                    <option>Select</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="dropdown">How Many Accompanying ?</label>
                                                <select name="acoompany" class="form-control" id="dropdown">
                                                    <option value="">Select</option>
                                                    <option value="all">All</option>
                                                    <option value="spouse">Spouse</option>
                                                    <option value="belowperson">Below 10 Years Kids</option>
                                                    <option value="aboveperson">Above 10 Years Person</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>

                            </div>
                            <div class="panel-heading">
                                Search Result
                            </div>
                            <div class="panel-body">

                                <div class="col-md-12">
                                    @if ($accompany == 'spouse')
                                    <p>Total Spouses: {{ $totalSpouse }}</p>
                                    @endif
                                    @if ($accompany == 'belowperson')
                                    <p>Total Below 10 Years Kids: {{ $totalBelowPerson }}</p>
                                    @endif
                                        @if ($accompany == 'aboveperson')
                                        <p>Total Above 10 Years Persons: {{ $totalAbovePerson }}</p>
                                        @endif
                                    @if ($accompany == 'all')
                                            <p>Total Spouses: {{ $totalSpouse }}</p>
                                            <p>Total Below 10 Years Kids: {{ $totalBelowPerson }}</p>
                                            <p>Total Above 10 Years Persons: {{ $totalAbovePerson }}</p>
                                        <p>Total Applicants: {{ $totalApplicants }}</p>

                                        <b>Total Participant: {{ $totalApplicants + $totalSpouse + $totalBelowPerson + $totalAbovePerson }}</b>
                                    @endif


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