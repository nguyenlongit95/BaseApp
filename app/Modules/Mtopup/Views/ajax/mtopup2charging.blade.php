<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

{!! Form::model($mtopup, ['method' => 'POST','route' => ['ajax.mtopup.actions', $mtopup->id]]) !!}
    <div class="modal-header">
        <h5 class="modal-title" id="MtopupModal">Mtopup</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div id="modalContent" class="modal-body">
        <table class="table table-striped">
            <tbody><tr>
                <th>Payment</th>
                <th>Telco</th>
                <th>Type</th>
                <th>Number phone</th>
                <th>Declared_value</th>
                <th>Process</th>
                <th>Mix</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>
                    @if ($mtopup->payment_status == 'paid') <span class="badge bg-primary">Paid</span> @else <span class="badge bg-danger">no</span> @endif
                </td>
                <td>{{ $mtopup->telco  }}</td>
                <td>{{ $mtopup->telco_type  }}</td>
                <td>{{ $mtopup->phone_number  }}</td>
                <td>{{ number_format($mtopup->declared_value)  }}</td>
                <td>
                    <span> {{number_format($mtopup->completed_value)}}/{{number_format($mtopup->declared_value)}}</span>

                    <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{ ($mtopup->completed_value/$mtopup->declared_value)*100 }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ ($mtopup->completed_value/$mtopup->declared_value)*100 }}%">
                            {{ ($mtopup->completed_value/$mtopup->declared_value)*100 }}%
                        </div>
                </td>
                <td>@if ($mtopup->mix == 1) <span class="badge bg-primary">yes</span> @else <span class="badge bg-danger">no</span> @endif</td>
                <td><button type="submit" name="submit" value="HUYVAXOA" class="btn btn-danger" data-toggle="tooltip" title="Đơn hàng không được hoàn tiền!!">Hủy và xóa đơn hàng</button></td>
            </tr>
            </tbody></table>
        <label for="admin_note">Admin Note:</label>
        <textarea name="admin_note" class="form-control">{{ $mtopup->admin_note }}</textarea>
    </div>
    <div class="modal-footer1" style="padding: 0 15px; padding-bottom: 50px;">
        <div class="float-left">
            <select name="completed_value" style="padding: 6px;">
                <option value="" >Số tiền nạp:</option>
                @foreach($lsAmount as $amount)
                    <option value="{{ $amount  }}" >{{ number_format($amount) }} đ</option>
                @endforeach
            </select>
            <button type="submit" name="submit" value="NAPTIEN" class="btn btn-primary" data-toggle="tooltip" title="Nạp tiền">Nạp tiền</button>
            <button type="submit" name="submit" value="SAISO" class="btn btn-warning" data-toggle="tooltip" title="Lưu đơn hàng và hoàn tiền!">Sai số</button>
            <button type="submit" name="submit" value="HUYVAHOANTIEN" class="btn btn-warning" data-toggle="tooltip" title="Xoá đơn hàng và hoàn tiền!" >Hủy & hoàn tiền</button>
        </div>
        <div class="float-right">
            <button type="submit" name="submit" value="HOANTHANHDONHANG" class="btn btn-success" data-toggle="tooltip" title="Hoàn thành đơn hàng">Hoàn thành đơn hàng</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="tooltip" title="Đóng cửa sổ!">Cancel</button>
        </div>
    </div>
{!! Form::close() !!}
