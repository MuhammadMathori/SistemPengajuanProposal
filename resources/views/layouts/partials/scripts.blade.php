<script src="{{ asset('assets/static/js/components/dark.js') }}"></script>
<script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/compiled/js/app.js') }}"></script>
<script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="{{ asset('assets/static/js/pages/datatables.js') }}"></script>

<script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
<script src="{{ asset('assets/static/js/pages/form-element-select.js') }}"></script>
<script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

@if ($errors->any())
    <div id="ERROR_COPY" style="display: none;" class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <h6>{{ $error }}</h6>
        @endforeach
    </div>
@endif

<script type="text/javascript">
    var cekError = {{ $errors->any() > 0 ? 'true' : 'false' }};
    var ht = $("#ERROR_COPY").html();
    if (cekError) {
        Swal.fire({
            title: 'Errors',
            icon: 'error',
            html: ht,
            showCloseButton: true,
        });
    }

    function fungsiHapus() {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        Swal.fire({
            title: 'Apakah kamu yakin ?',
            text: "Data akan dihapus dari database",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Ya, Hapus !",
            cancelButtonText: "Batal",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then((result) => {
            if (result.value) {
                form.submit();
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Dibatalkan !',
                    'Data tidak berhasil terhapus',
                    'error'
                )
            }
        });
    }

    function logoutAction() {
        Swal.fire({
            title: 'Apakah kamu yakin ?',
            text: "Anda akan keluar dari sistem",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Ya, Keluar",
            cancelButtonText: "Batal",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then((result) => {
            if (result.value) {
                document.getElementById('logout-form').submit();
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Dibatalkan',
                    'Anda tidak berhasil keluar dari sistem',
                    'error'
                )
            }
        });
    }
</script>
