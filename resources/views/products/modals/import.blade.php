<div class="modal fade" id="importProductsModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Import Products</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="importProductsForm">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="importProductsFile">File</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input" id="importCustomersFile">
                                        <label class="custom-file-label" for="importProductsFile">Choose file</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">
                        @lang('buttons.general.import')
                    </button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
