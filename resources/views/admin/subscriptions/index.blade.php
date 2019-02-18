@extends('layouts.portal')

@section('content')
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Subscription List by Latest Registration</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="members-list" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Mmeber Type</th>
                        <th>Notification</th>
                        <th>Registraion Date</th>
                        <th>Renewal Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Mmeber Type</th>
                        <th>Notification</th>
                        <th>Registraion Date</th>
                        <th>Renewal Date</th>
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
@include('common.portal.page_heading', ['pageTitle' => 'Subscription Lists'])
@endsection

@include('partials.data_tables_assets')

@push('docready')
    $('#example1').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
        "language": {
            "emptyTable": "No data found"
        }
    })
@endpush
