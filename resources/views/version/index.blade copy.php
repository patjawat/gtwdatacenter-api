@extends('layouts.app')

@section('content')
@section('title', 'Version Control')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <br>
    @if ($message = Session::get('success'))
        <script>
            Swal.fire(
                'บันทึกสำเร็จ !',
                'กำปุ่ม OK!',
                'success'
            )

        </script>
    @endif

    <div class="card card-primary card-outline direct-chat direct-chat-primary">
        <div class="card-header">

            <h5 class="card-title"><i class="fas fa-list-ul"></i> List Version Control</h5>
            <div class="card-tools">
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search" style="background-color: #f1f4f6;">
                        <div class="input-group-append">
                            <button class="btn btn-secondary btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="card-body  p-3">
            <table class="table table-striped table-sm">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Introduction</th>
                    <th>Location</th>
                    <th>Cost</th>
                    <th>Date Created</th>
                    <th width="150px">Action</th>
                </tr>
                @foreach ($dataProvider as $model)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $model->name }}</td>
                        <td>{{ $model->introduction }}</td>
                        <td>{{ $model->location }}</td>
                        <td>{{ $model->cost }}</td>
                        <td>{{ date_format($model->created_at, 'jS M Y') }}</td>
                        <td>
                            <a href="{{ route('version-control.destroy', $model->id) }}" class="delete" data-id="{{ $model->id }}" >Delete Record</a>
                            <form action="{{ route('version-control.destroy', $model->id) }}" method="POST">
                                <a href="{{ route('version-control.show', $model->id) }}" title="show">
                                    <i class="fas fa-eye text-success  fa-lg"></i>
                                </a>
|
                                <a href="{{ route('version-control.edit', $model->id) }}">
                                    <i class="fas fa-edit  fa-lg"></i>

                                </a>
|
                                @csrf
                                @method('DELETE')

                                <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                    <i class="fas fa-trash fa-lg text-danger"></i>

                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="card-footer clearfix">
            <div class="float-left">
                <a class="btn btn-success" href="{{ route('version-control.create') }}" title="Create a project"> <i
                        class="fas fa-plus"> สร้างใหม่</i></a>
            </div>
            <div class="float-right">
                {{ $dataProvider->links('vendor.pagination.custom') }}


            </div><br>


        </div>

    </div>

<script>
$('.delete').click(function (e) { 
    e.preventDefault();
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
   
    $.ajax(
    {
        url: $(this).attr('href'),
        type: 'POST',
        data: {
            "id": id,
            "_token": token,
            _method: 'DELETE'
        },
        success: function (){
            console.log("it Works");
        }
    });
    
});    

//     Swal.fire({
//   title: 'Are you sure?',
//   text: "You won't be able to revert this!",
//   icon: 'warning',
//   showCancelButton: true,
//   confirmButtonColor: '#3085d6',
//   cancelButtonColor: '#d33',
//   confirmButtonText: 'Yes, delete it!'
// }).then((result) => {
//   if (result.isConfirmed) {
//     Swal.fire(
//       'Deleted!',
//       'Your file has been deleted.',
//       'success'
//     )
//   }
// })
</script>
@endsection
