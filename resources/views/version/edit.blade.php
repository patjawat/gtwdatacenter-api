@extends('layouts.app')
@section('content')
{{ $title = 'แก้ไข' }}
                    @if ($errors->any())
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>Why do I have this issue?</a>'
                        })
                    </script>
                @endif
                        <form id="versionForm" action="{{ route('version.update', $model->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
  
                    @csrf
                    <input type="text" name="id" value="{{ $model->id }}" hidden="true"/>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card shadow">
                            <div class="card-header">{{ __('สร้างใหม่') }}</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Version Number:</strong>
                                            <input type="text" name="version_number" value="{{ $model->version_number }}"
                                                class="form-control {{ $errors->has('version_number') ? 'is-invalid' : '' }}"
                                                placeholder="ระบุเลขที่เวอร์ชั่น">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" name="files"
                                                    class="custom-file-input {{ $errors->has('files') ? 'is-invalid' : '' }}"
                                                    value="{{ $model->files }}">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h1>{{ $model->status }}</h1>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input {{ $errors->has('status') ? 'is-invalid' : '' }}"
                                                type="radio" name="status" id="inlineRadio1" value="Y" <?= $model->status == 'Y' ? 'checked' : null;?>>
                                            <label class="form-check-label" for="inlineRadio1">Active</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input {{ $errors->has('status') ? 'is-invalid' : '' }}"
                                                type="radio" name="status" id="inlineRadio2" value="N" <?= $model->status == 'N' ? 'checked' : null;?>>
                                            <label class="form-check-label" for="inlineRadio2">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> บันทึก</button>
                                <a class="btn btn-secondary loadscreen" href="{{ route('version.index') }}" title="Go back"> ยกเลิก </a>
                            </div>
                        </div>
                    </div>
                </div>
                

                    </form>


@endsection
