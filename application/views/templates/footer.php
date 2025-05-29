<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Serikat Pekerja Kampus <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Anda yakin akan keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Salam perjuangan untuk segenap pekerja kampus! <br> Tekan tombol "Logout" untuk keluar.</br> </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Load DataTables and its dependencies -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>

<!-- Load DataTables Buttons and its dependencies -->
<script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>


<!-- Load Chart.js if needed -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

<!-- Initialize DataTables with Buttons -->
<script>
    $(document).ready(function() {
        $('#calonAnggota').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });

        $('#anggota').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });

        $('#eliminate').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });
</script>

<!-- Additional custom scripts -->
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });
    });

    $('.form-check-input-2').on('change', function() {
        var isChecked = $(this).prop('checked');
        var role_id = $(this).data('role');
        var user_id = $(this).data('id'); // Mengambil nilai data-id

        $.ajax({
            url: "<?= base_url('user/confirmrole'); ?>",
            method: 'post',
            data: {
                role_id: role_id,
                isChecked: isChecked,
                user_id: user_id // Mengirim user_id ke controller
            },
            success: function() {
                document.location.href = "<?= base_url('user/confirm'); ?>";
            },

        });
    });
</script>


<script src="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.umd.js"></script>

<script>
    const {
        ClassicEditor,
        Essentials,
        Bold,
        Italic,
        Font,
        Paragraph,
        Heading,
        BlockQuote,
        Link,
        List,
        Alignment
    } = CKEDITOR;

    ClassicEditor
        .create(document.querySelector('#sej_content'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, BlockQuote, Link, List, Alignment],
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'fontSize',
                'fontFamily',
                'fontColor',
                '|',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ],

        })
        .then( /* ... */ )
        .catch( /* ... */ );

    ClassicEditor
        .create(document.querySelector('#sej_quotes'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, BlockQuote, Link, List, Alignment],
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'fontSize',
                'fontFamily',
                'fontColor',
                '|',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ],

        })
        .then( /* ... */ )
        .catch( /* ... */ );

    ClassicEditor
        .create(document.querySelector('#manif_content'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, BlockQuote, Link, List, Alignment],
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'fontSize',
                'fontFamily',
                'fontColor',
                '|',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ],

        })
        .then( /* ... */ )
        .catch( /* ... */ );
    ClassicEditor
        .create(document.querySelector('#manif_quotes'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, BlockQuote, Link, List, Alignment],
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'fontSize',
                'fontFamily',
                'fontColor',
                '|',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ],

        })
        .then( /* ... */ )
        .catch( /* ... */ );
    ClassicEditor
        .create(document.querySelector('#vm_content'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, BlockQuote, Link, List, Alignment],
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'fontSize',
                'fontFamily',
                'fontColor',
                '|',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ],

        })
        .then( /* ... */ )
        .catch( /* ... */ );
    ClassicEditor
        .create(document.querySelector('#vm_quotes'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, BlockQuote, Link, List, Alignment],
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'fontSize',
                'fontFamily',
                'fontColor',
                '|',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ],

        })
        .then( /* ... */ )
        .catch( /* ... */ );
    ClassicEditor
        .create(document.querySelector('#urus_content'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, BlockQuote, Link, List, Alignment],
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'fontSize',
                'fontFamily',
                'fontColor',
                '|',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ],

        })
        .then( /* ... */ )
        .catch( /* ... */ );
    ClassicEditor
        .create(document.querySelector('#link'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, BlockQuote, Link, List, Alignment],
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'fontSize',
                'fontFamily',
                'fontColor',
                '|',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ],

        })
        .then( /* ... */ )
        .catch( /* ... */ );

    ClassicEditor
        .create(document.querySelector('#isi_tulisan'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, BlockQuote, Link, List, Alignment],
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'fontSize',
                'fontFamily',
                'fontColor',
                '|',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ],

        })
        .then( /* ... */ )
        .catch( /* ... */ );
    ClassicEditor
        .create(document.querySelector('#info_message'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, BlockQuote, Link, List, Alignment],
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'fontSize',
                'fontFamily',
                'fontColor',
                '|',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ],

        })
        .then( /* ... */ )
        .catch( /* ... */ );
    ClassicEditor
        .create(document.querySelector('#edit_isi_tulisan'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, BlockQuote, Link, List, Alignment],
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'fontSize',
                'fontFamily',
                'fontColor',
                '|',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ],

        })
        .then( /* ... */ )
        .catch( /* ... */ );
    ClassicEditor
        .create(document.querySelector('#about_content'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, BlockQuote, Link, List, Alignment],
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'fontSize',
                'fontFamily',
                'fontColor',
                '|',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ],

        })
        .then( /* ... */ )
        .catch( /* ... */ );
    ClassicEditor
        .create(document.querySelector('#publikasi'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, BlockQuote, Link, List, Alignment],
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'fontSize',
                'fontFamily',
                'fontColor',
                '|',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ],

        })
        .then( /* ... */ )
        .catch( /* ... */ );
</script>




</body>

</html>