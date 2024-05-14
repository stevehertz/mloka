<script>
    $(document).ready(function() {

        $(document).on('click', '#newProductBtn', function(e) {
            e.preventDefault();
            $('#newProductForm').trigger("reset");
            $('#newProductModal').modal('show');
        });

        $('#newProductForm').submit(function(e) {
            e.preventDefault();
            let form = $(this);
            let formData = new FormData(form[0]);
            let path = '{{ route('products.store', $shop->id) }}';
            $.ajax({
                type: "POST",
                url: path,
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                beforeSend: function() {
                    form.find('button[type=submit]').html(
                        '<i class="fa fa-spinner fa-spin"></i>');
                    form.find('button[type=submit]').attr('disabled', true);
                },
                complete: function() {
                    form.find('button[type=submit]').html('{{ trans('buttons.general.create') }}');
                    form.find('button[type=submit]').attr('disabled', false);
                },
                success: function(data) {
                    if (data['status']) {
                        toastr.success(data['message']);
                        $('#newProductForm')[0].reset();
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    }
                },
                error: function(data) {
                    var errors = data.responseJSON;
                    var errorsHtml = '<ul>';
                    $.each(errors['errors'], function(key, value) {
                        errorsHtml += '<li>' + value + '</li>';
                    });
                    errorsHtml += '</ul>';
                    toastr.error(errorsHtml);
                }
            });

        });

        $(document).on('click', '#importProductsBtn', function(e) {
            e.preventDefault();
            $('#importProductsForm').trigger("reset");
            $('#importProductsModal').modal('show');
        });

        $('#importProductsForm').submit(function (e) { 
            e.preventDefault();
            let form = $(this);
            let formData = new FormData(form[0]);
            let path = '{{ route('products.import', $shop->id) }}';
            $.ajax({
                type: "POST",
                url: path,
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                beforeSend: function() {
                    form.find('button[type=submit]').html(
                        '<i class="fa fa-spinner fa-spin"></i>');
                    form.find('button[type=submit]').attr('disabled', true);
                },
                complete: function() {
                    form.find('button[type=submit]').html('{{ trans('buttons.general.import') }}');
                    form.find('button[type=submit]').attr('disabled', false);
                },
                success: function(data) {
                    if (data['status']) {
                        toastr.success(data['message']);
                        $('#importProductsForm')[0].reset();
                        $('#importProductsModal').modal('hide');
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    }
                },
                error: function(data) {
                    var errors = data.responseJSON;
                    var errorsHtml = '<ul>';
                    $.each(errors['errors'], function(key, value) {
                        errorsHtml += '<li>' + value + '</li>';
                    });
                    errorsHtml += '</ul>';
                    toastr.error(errorsHtml);
                }
            });
        });
    });
</script>
