<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Drag And Drop File Upload Using Dropzone</title>
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
</head>
<style type="text/css">
    body{
        background:#f2f2f2;
    }
    .section{
        margin-top:150px;
    }
    h1{
        margin-bottom:35px;
    }
</style>
<body>

<div class="container section">
    <div class="row">
        <div class="col-md-8  col-md-offset-2">
            <h2 class="text-center">Laravel 8 Drag And Drop File Upload Using Dropzone</h2>
            <form action="{{ route('dropzone.store') }}" method="POST" enctype="multipart/form-data" class="dropzone" id='image-upload'>
                @csrf
                <div>
                    <h3 class="text-center">Upload Multiple Image By Click On Box</h3>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    Dropzone.options.imageUpload ={
        maxFilesize:1,
        acceptedFiles: ".jpeg,.jpg,.png,.gif,.zip",
    };
</script>
</body>
</html>