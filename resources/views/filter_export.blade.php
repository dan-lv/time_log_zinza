<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Filter</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-2">Month:</div>
                    <div class="col-5">
                        <select class="custom-select" name="operator_month">
                            <option value="0" @if (old('operator_month') == 0) selected @endif>Is equal to</option>
                            <option value="1" @if (old('operator_month') == 1) selected @endif>Greater than</option>
                            <option value="2" @if (old('operator_month') == 2) selected @endif>Greater than or Equal</option>
                            <option value="3" @if (old('operator_month') == 3) selected @endif>Less than</option>
                            <option value="4" @if (old('operator_month') == 4) selected @endif>Less than or Equal</option>
                        </select>
                    </div>
                    <div class="col-5"><input type="text" name="month" class="form-control" placeholder="Value" value="{{ old('month') }}"></div>
                </div>

                <div class="row mt-2">
                    <div class="col-2">Year:</div>
                    <div class="col-5">
                        <select class="custom-select" name="operator_year">
                            <option value="0" @if (old('operator_year') == 0) selected @endif>Is equal to</option>
                            <option value="1" @if (old('operator_year') == 1) selected @endif>Greater than</option>
                            <option value="2" @if (old('operator_year') == 2) selected @endif>Greater than or Equal</option>
                            <option value="3" @if (old('operator_year') == 3) selected @endif>Less than</option>
                            <option value="4" @if (old('operator_year') == 4) selected @endif>Less than or Equal</option>
                        </select>
                    </div>
                    <div class="col-5"><input type="text" name="year" class="form-control" placeholder="Value" value="{{ old('year') }}"></div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer d-flex justify-content-around">
                <button type="submit" class="btn btn-danger">Apply</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
