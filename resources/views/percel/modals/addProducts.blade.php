<div class="modal fade" id="newProductModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="newProductForm">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="newProductName">
                                    @lang('labels.products.fields.name')
                                </label>
                                <input type="text" name="name" class="form-control" id="newProductName"
                                    placeholder="@lang('labels.products.fields.name')" required autofocus>
                            </div>
                        </div>
                    </div>
                    <!--/.product name row -->
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="newProductDescription">
                                    @lang('labels.products.fields.description')
                                </label>
                                <textarea name="description" id="newProductDescription" placeholder="@lang('labels.products.fields.description')" class="form-control" autofocus></textarea>
                            </div>
                        </div>
                    </div>
                    <!--/.product description row -->
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="newProductWeightUnit">
                                    @lang('labels.products.fields.weight_unit')
                                </label>
                                <select name="weigh_unit" id="newProductWeightUnit" class="form-control select2"
                                    style="width: 100%;" required autofocus>
                                    <option selected="selected" disabled="disabled">Select @lang('labels.products.fields.weight_unit')</option>
                                    @foreach (\ProductWeightUnits::toArray() as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="newProductWeight">
                                    @lang('labels.products.fields.weight')
                                </label>
                                <input type="number" name="weight" class="form-control"
                                    placeholder="@lang('labels.products.fields.weight')" id="newProductWeight" step="any" required
                                    autofocus>
                            </div>
                        </div>
                    </div>
                    <!--/.product weight and weight units row -->
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="newProductSizeUnit">
                                    @lang('labels.products.fields.unit_size')
                                </label>
                                <select name="size_unit" id="newProductSizeUnit" class="form-control select2"
                                    style="width: 100%;" required autofocus>
                                    <option selected="selected" disabled="disabled">Select @lang('labels.products.fields.unit_size')</option>
                                    @foreach (\ProductSizeUnits::toArray() as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--/.product size unit row -->
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="newProductLength">
                                    @lang('labels.products.fields.length')
                                </label>
                                <input type="number" name="length" class="form-control"
                                    placeholder="@lang('labels.products.fields.length')" id="newProductLength" step="any" required
                                    autofocus>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="newProductWidth">
                                    @lang('labels.products.fields.width')
                                </label>
                                <input type="number" name="width" class="form-control"
                                    placeholder="@lang('labels.products.fields.width')" id="newProductWidth" step="any" required
                                    autofocus>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="newProductHeight">
                                    @lang('labels.products.fields.height')
                                </label>
                                <input type="number" name="height" class="form-control"
                                    placeholder="@lang('labels.products.fields.height')" id="newProductHeight" step="any" required
                                    autofocus>
                            </div>
                        </div>
                    </div>
                    <!--/.product size -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">
                        @lang('buttons.general.create')
                    </button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
