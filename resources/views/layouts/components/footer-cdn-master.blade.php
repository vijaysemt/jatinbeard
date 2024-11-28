<!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
        <!-- Vendor js -->
        <script src="{{url('admin/assets/js/vendor.min.js')}}"></script>
        <script src="{{url('admin/assets/libs/morris-js/morris.min.js')}}"></script>
        <script src="{{url('admin/assets/libs/raphael/raphael.min.js')}}"></script>
        <script src="{{url('admin/assets/js/pages/dashboard.init.js')}}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        @if(session('status'))
            <script>
                swal("{{session('status')}}");
            </script>
        @endif

        <!-- App js -->
        <script src="{{url('admin/assets/js/app.min.js')}}"></script>
    </body>

</html>

