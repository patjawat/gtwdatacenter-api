@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
@section('title', 'Version Control')

@if ($message = Session::get('success'))
<script>
    Swal.fire(
        'บันทึกสำเร็จ !',
        'กำปุ่ม OK!',
        'success'
    )

</script>
@endif


    <div class="card">
        <div class="card-header">
        <a class="btn btn-success loadscreen show-modalx" title="สร้างใหม่" href="{{url('/version/create')}}" id="createNewProduct"> <i class="fas fa-plus"></i> สร้างใหม่</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Details</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="card-footer text-muted">
            Footer
        </div>
    </div>



    <script type="text/javascript">

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('version.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'version_number',
                    name: 'version_number'
                },
                {
                    data: 'files',
                    name: 'files'
                },
                {
                    width: "10%",
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });


$('body').on('click', '.save', function(e) {
             e.preventDefault();
             $(this).html('Sending..');
            var form = $('#versionForm');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                // data: form.serialize(),
                url: form.attr('action'),
                type: form.attr('method'),
                data: new FormData($('#versionForm')),
                dataType: 'json',
                success: function(data) {
                    // $('#productForm').trigger("reset");
                    // $('#ajaxModel').modal('hide');
                    // table.draw();
                    console.log(data);
                },
                error: function(data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });

        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: $('#productForm').serialize(),
                url: "{{ route('version.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    $('#productForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
                },
                error: function(data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });

        
        
        // });

    </script>
@endsection
