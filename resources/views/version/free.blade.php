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

<a href="{{ url('/version/commercial')}} "  class="btn btn-primary"><i class="fas fa-coffee"></i> Commercial Version</a>
<a href="{{ url('version/free')}} "  class="btn btn-success"><i class="fas fa-user-friends"></i> Free Version</a>

   free Version

   
@endsection
