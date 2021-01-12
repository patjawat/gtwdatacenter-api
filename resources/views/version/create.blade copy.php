@extends('layouts.app')
@section('content')
    {{ $title = 'สร้าง' }}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">{{ __('สร้างใหม่') }}</div>

                <div class="card-body">
                    {{-- @if ($model->id) --}}
                        {{-- <form id="versionForm" action="{{ route('version.update', $model->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                        @else --}}
                            <form id="versionForm" action="{{ route('version.store') }}" method="POST"
                                enctype="multipart/form-data">
                    {{-- @endif --}}
                    @csrf
                    @include ('version._form', ['model' => $model])

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
