@extends('layouts.portal')

@section('content')
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Members List by Latest Registration</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="members-list" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Country</th>
                        <th>Registered Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Country</th>
                        <th>Registered Date</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
@endsection

@section('content-header')
@include('common.portal.page_heading', ['pageTitle' => 'Members Lists'])
@endsection

@include('partials.data_tables_assets')

@push('docready')
    $('#members-list').DataTable({
        serverSide: true,
        ordering: false,
        searching: false,
        "ajax":{
            "url": "{{ route('api.members.index') }}",
            "dataType": "json",
            "type": "POST",
            "data": function(data) {
                var info = $('#members-list').DataTable().page.info();
                /*
                return {
                    _token: "{{csrf_token()}}",
                    page: info.page + 1
                }
                */
                data._token = "{{csrf_token()}}";
                data.page = info.page + 1;
            },
            dataFilter: function(data){
                var json = jQuery.parseJSON( data );
                var tableJson = {};
                tableJson.recordsTotal = json.meta.total;
                tableJson.recordsFiltered = json.meta.total;
                tableJson.data = json.data;
                console.log(tableJson);
     
                return JSON.stringify( tableJson ); // return JSON string
            }
        },
        "language": {
            "emptyTable": "No data found"
        },
        "columns": [
            { "data": "name" },
            {
                "data": "type"
            },
            { "data": "gender" },
            { "data": "age" },
            { "data": "country" },
            { "data": "registered_date" },
            {
                "data": "id",
                "render": function(data) {
                    return `
                        <a href="{{ url('admin/members/${data}/edit') }}"><i class="fa fa-eye"></i></a> &nbsp;
                        <a href="{{ url('admin/members/${data}/edit') }}"><i class="fa fa-pencil-square-o"></i></a> &nbsp;
                        <a href="{{ url('admin/members/${data}/edit') }}"><i class="fa fa-trash"></i></a>
                    `;
                }
            }
        ]
    });
@endpush
