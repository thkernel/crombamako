@section("ckeditor")

<script type="text/javascript">
CKEDITOR.replace('editor', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
</script> 

@endsection