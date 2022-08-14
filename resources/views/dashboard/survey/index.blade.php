@extends('dashboard.layouts.main')
@section('container')


			<div class="recentCustomer">
				<div class="card card-outline card-primary">
					<div class="card-header">
						<div class="card-tools">
							<a class="btn btn-success pull-right modal-show" href="{{ route('suvey.create') }}" style="margin-top: -8px;" title="Create suvey"><i class="fa fa-plus modal-show"></i> Add New Survey</a>
						</div>
					</div>
					<div class="card-body">
						<table class=" table-hover table-bordered" id="datatable">
							<colgroup>
								<col width="5%">
								<col width="20%">
								<col width="20%">
								<col width="20%">
								<col width="20%">
								<col width="15%">
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th>Title</th>
									<th>Description</th>
									<th>Start</th>
									<th>End</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tfoot>
									<th class="text-center">#</th>
									<th>Title</th>
									<th>Description</th>
									<th>Start</th>
									<th>End</th>
									<th>Action</th>
								</tfoot>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		

		
	

@endsection
@push('scripts')
    <script>
        $('#datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
			order: [[3, 'desc']],

            ajax: "{{ route('table.dashboardsuvey') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'title', name: 'title'},
                {data: 'description', name: 'description'},
                {data: 'start', name: 'start'},
                {data: 'end', name: 'end'},
                {data: 'action', name: 'action'}
            ]
        });
		$('#title').change(function(e) {
        $.get('{{ route('tipe_soals.check_slug') }}', 
            { 'title': $(this).val() }, 
            function( data ) {
            $('#slug').val(data.slug);
            }
        );
        });
    </script>
@endpush 

