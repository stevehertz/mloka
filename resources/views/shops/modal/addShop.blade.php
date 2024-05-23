<div class="modal fade" id="addShopModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Shop</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addShopForm">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="addShopName">
                                    @lang('labels.shops.fields.name')
                                </label>
                                <input type="text" name="name" class="form-control" id="addShopName"
                                    placeholder="@lang('labels.shops.fields.name')" required>
                            </div>
                        </div>
                    </div>
                    <!--/.row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="addShopAddress">
                                    @lang('labels.shops.fields.address')
                                </label>
                                <input type="text" name="address" class="form-control" id="addShopAddress"
                                    placeholder="@lang('labels.shops.fields.address')" required>
                            </div>
                        </div>
                    </div>
                    <!--/.row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addShopCounty">
                                    @lang('labels.shops.fields.county')
                                </label>
                                <select id="addShopCounty" name="county" class="form-control select2"
                                    style="width: 100%;">
                                    <option selected="selected" disabled="disabled">
                                        Select @lang('labels.shops.fields.county')
                                    </option>
                                    @foreach ($counties as $county)
                                        <option>{{ $county->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addShopLocation">
                                    @lang('labels.shops.fields.location')
                                </label>
                                <input type="text" name="location" class="form-control" id="addShopLocation"
                                    placeholder="@lang('labels.shops.fields.location')" required>
                            </div>
                        </div>
                    </div>
                    <!--/.row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addShopEmail">
                                    @lang('labels.shops.fields.email')
                                </label>
                                <input type="email" name="email" class="form-control" id="addShopEmail"
                                    placeholder="@lang('labels.shops.fields.email')">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addShopPhone">
                                    @lang('labels.shops.fields.phone')
                                </label>
                                <input type="text" name="phone" class="form-control" id="addShopPhone"
                                    placeholder="@lang('labels.shops.fields.phone')">
                            </div>
                        </div>
                    </div>
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
