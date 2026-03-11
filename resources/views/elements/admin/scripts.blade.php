<script src="{{ url('admin_assets/js/oneui.app.min.js') }}"></script>
<!-- jQuery (required for Magnific Popup plugin) -->
<script src="{{ url('admin_assets/js/lib/jquery.min.js') }}"></script>
<!-- Page JS Plugins -->
<script src="{{ url('admin_assets/js/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<!-- Page JS Helpers (Magnific Popup Plugin) -->
<script>
    One.helpersOnLoad(['js-ckeditor5']);
</script>


<!-- Page JS Plugins -->
<script src="{{ url('admin_assets/js/plugins/chart.js/chart.umd.js') }}"></script>

<!-- Page JS Code -->
<script src="{{ url('admin_assets/js/pages/be_pages_dashboard.min.js') }}"></script>
    
    <script src="{{ url('admin_assets/js/plugins/select2/js/select2.full.min.js') }}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.9.1/summernote-bs5.min.js"></script>

<script>


    function uploadImage(file, selector = '#editor') {
        let data = new FormData();
        data.append("image", file);
        data.append("_token", "{{ csrf_token() }}");

        $.ajax({
            url: "/upload-image",
            method: "POST",
            data: data,
            contentType: false,
            processData: false,
            success: function (response) {
                $(selector).summernote('insertImage', response.url);
            },
            error: function (error) {
                console.log(error);
            }
        });
    };


</script>
@yield('scripts')