<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

{!! Form::model($card, ['method' => 'POST','route' => ['ajax.charging.actions', $card->id]]) !!}
    <div class="modal-header">
        <h5 class="modal-title" id="CharginModalTitle">Charging</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div id="modalContent" class="modal-body">
        <table class="table table-striped">
            <tbody><tr>
                <th>Telco</th>
                <th>Code</th>
                <th>Serial</th>
                <th>Declared</th>
                <th>Fees</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>{{ $card->telco }}</td>
                <td>{{ $card->code }}</td>
                <td>{{ $card->serial }}</td>
                <td>{{ number_format($card->declared_value) }} đ</td>
                <td>{{ $card->fees }} %</td>
                <td>{{ number_format($card->amount) }} đ</td>
                <td><button type="submit" name="submit" value="XOATHE" class="btn btn-danger">Xoá thẻ</button></td>
            </tr>
            </tbody></table>
        <label for="admin_note">Admin Note:</label>
        <textarea name="admin_note" class="form-control">{{ $card->admin_note }}</textarea>

    </div>
    <div class="modal-footer1" style="padding: 0 15px; padding-bottom: 50px;">

        <div class="float-left">
            <select name="real" style="padding: 6px;">

                <option value="" >Chọn giá thực tế</option>
                @foreach($lsAmount as $amount)
                    <option value="{{ $amount  }}" >{{ number_format($amount) }} đ</option>
                @endforeach
            </select>
            <button type="submit" name="submit" value="SAIMENHGIA" class="btn btn-primary" data-toggle="tooltip" title="Thẻ sai mệnh giá sẻ bị phạt, tiền sẽ tự động cộng vào tài khoản người đăng thẻ">Thẻ Sai mệnh giá</button>
            <button type="submit" name="submit" value="KHONGDUNGDUOC" class="btn btn-warning">Thẻ không dùng được</button>
            <button type="submit" name="submit" value="DASUDUNG" class="btn btn-warning">Thẻ đã sử dụng </button>

        </div>
        <div class="float-right">
            <button type="submit" name="submit" value="THEDUNG" class="btn btn-success" data-toggle="tooltip" title="Tiền sẽ tự động cộng vào tài khoản đăng thẻ">Thẻ Đúng</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>

    </div>
{!! Form::close() !!}
