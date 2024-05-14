<div class="modal fade" id="newCustomerModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Customer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="newCustomerForm">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="newCustomerFirstName">
                                    @lang('labels.users.fields.first_name')
                                </label>
                                <input type="text" name="first_name" class="form-control" id="newCustomerFirstName"
                                    placeholder="@lang('labels.users.fields.first_name')" required autofocus>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="newCustomerLastName">
                                    @lang('labels.users.fields.last_name')
                                </label>
                                <input type="text" name="last_name" class="form-control" id="newCustomerLastName"
                                    placeholder="@lang('labels.users.fields.last_name')" autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="newCustomerPhone">
                                    @lang('labels.users.fields.phone')
                                </label>
                                <input type="text" name="phone" class="form-control" id="newCustomerPhone"
                                    placeholder="@lang('labels.users.fields.phone')" required autofocus>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="newCustomerEmail">
                                    @lang('labels.users.fields.email')
                                </label>
                                <input type="email" name="email" class="form-control" id="newCustomerEmail"
                                    placeholder="@lang('labels.users.fields.email')" autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="newCustomerGender">@lang('labels.users.fields.gender')</label>
                                <select name="gender" id="newCustomerGender" class="form-control select2"
                                    style="width: 100%;" required autofocus>
                                    <option selected="selected" disabled="disabled">Select @lang('labels.users.fields.gender')</option>
                                    @foreach (\Gender::toArray() as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="newCustomerLocation">
                                    @lang('labels.customers.fields.location')
                                </label>
                                <input type="text" name="location" class="form-control" id="newCustomerLocation"
                                    placeholder="@lang('labels.customers.fields.location')" autofocus required>
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
