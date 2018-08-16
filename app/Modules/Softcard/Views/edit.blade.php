@extends('master')

@section('css')
@endsection

@section('js')
@endsection

@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-md-12">
            <!-- general form elements -->

           @include('layouts.errors')

            
              <div class="card-header">
                <h3 class="card-title">Edit: {{ $softcard->name }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {!! Form::model($softcard, ['method' => 'PATCH','route' => ['softcard.update', $softcard->id],'enctype'=>'multipart/form-data']) !!}
                <div class="card-body row">
                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-body row">
                        <div class="form-group col-md-12">
                          <label for="name">Name:</label>
                          <input name="name" type="text" class="form-control" id="name" placeholder="Name" value="{{ $softcard->name or old('name') }}" >
                        </div>

                        <div class="form-group col-md-12">
                          <label for="url_key">Url Key:</label>
                          <input name="url_key" type="text" class="form-control" id="url_key" placeholder="Url Key" value="{{ $softcard->url_key or old('url_key') }}">
                        </div>

                        <div class="form-group col-md-12">
                          <label for="catalogs[]">Categories:</label>
                          <select class="form-control" multiple name="catalogs[]" style="min-height:150px;">
                            {!! $categories !!}
                          </select>
                        </div>

                        <div class="form-group col-md-12">
                          <label for="status" style="width: 100%">Enable:</label>
                          <input name="status" id="status" type="checkbox" value="1" data-toggle="toggle" style="display: none;" @if($softcard->status == 1) checked="checked" @endif>
                          <div class="Switch Round On" style="vertical-align:top;margin-left:10px;">
                              <div class="Toggle"></div>
                          </div>
                        </div>

                        <div class="form-group col-md-12">
                          <label for="short_description">Short Description:</label>
                          <textarea name="short_description" id="short_description" class="form-control" rows="5">{{ $softcard->short_description or old('short_description') }}</textarea>
                        </div>

                        <div class="form-group col-md-12">
                          <label for="description">Description:</label>
                          <textarea name="description" id="description" class="form-control" rows="10">{{ $softcard->description or old('description') }}</textarea>
                        </div>
                      </div>
                      <div class="form-group col-md-12">
                        <label for="images">Images:</label>
                        <button id="add-new-img" class="btn btn-success float-right btn-sm" type="button" title="Add New Option"><i class="fa fa-plus-circle"></i> Add Image</button>
                        <table id="img-table" class="table table-striped table-sm">
                         <tr class="thead-light">
                            <th scope="col">Image File</th>
                            <th scope="col">Image Label</th>
                            <th scope="col" class="text-center" style="width: 100px">Sort Order</th>
                            <th scope="col" class="text-center">Thumbnail</th>
                            <th scope="col" class="text-center">Enable</th>
                            <th scope="col" class="text-center" style="width:100px;"></th>
                          </tr>
                          <?php $numberImg = 1; ?>
                          @if(count($gallery))
                            @foreach($gallery as $key => $img)
                              <tr class="images-row">
                                <td>
                                  <input type="hidden" name="gallery_exists[{{ $numberImg }}]" value="{{ $img['id'] }}" />
                                  <img src="{{ asset('storage/app/'.$img['value']) }}" alt="{{ $img['label'] }}" class="img-thumbnail" width="200" height="100" />
                                </td>
                                <td>
                                  <input name="img_label[{{ $numberImg }}]" type="text" class="form-control " placeholder="Image Label" value="{{ $img['label'] }}" />
                                </td>
                                <td class="text-center">
                                  <input name="img_order[{{ $numberImg }}]" type="text" class="form-control" placeholder="Position" value="{{ $img['sort_order'] }}" />
                                </td>
                                <td class="text-center">
                                  <input name="is_thumb" type="radio" class="form-control" value="{{ $numberImg }}" @if($img['is_thumb']) checked="checked" @endif />
                                </td>
                                <td class="text-center">
                                  <input type="checkbox" name="img_status[{{ $numberImg }}]" value="1" @if($img['status']) checked="checked" @endif>
                                </td>
                                <td class="text-center">
                                  <button id="" class="remove-img btn btn-danger btn-sm" type="button" title="Remove Image"><i class="fa fa-times-circle"></i></button>
                                </td>
                              </tr>
                              <?php $numberImg++; ?>
                            @endforeach
                          @else
                            <tr class="images-row">
                              <td>
                                <input type="hidden" name="gallery_exists[{{ $numberImg }}]" value="0" />
                                <input type="file" name="images[{{ $numberImg }}]" class="form-control form-control-sm">
                              </td>
                              <td>
                                <input name="img_label[{{ $numberImg }}]" type="text" class="form-control " placeholder="Image Label">
                              </td>
                              <td class="text-center">
                                <input name="img_order[{{ $numberImg }}]" type="text" class="form-control" placeholder="Position">
                              </td>
                              <td class="text-center">
                                <input type="radio" name="is_thumb" value="0" checked>
                              </td>
                              <td class="text-center">
                                <input type="checkbox" name="img_status[{{ $numberImg }}]" value="1" checked>
                              </td>
                              <td class="text-center"></td>
                            </tr>
                          @endif
                        </table>
                        <div id="img-clone" class="hide">
                        </div>
                        <script type="text/javascript">
                          $(document).ready(function() {
                            countImage = {{ $numberImg++ }};
                            $("#add-new-img").click(function(){
                              $("#img-table tbody").append('<tr class="images-row"><td><input type="hidden" name="gallery_exists['+countImage+']" value="0" /><input type="file" name="images['+countImage+']" class="form-control form-control-sm"></td><td><input name="img_label['+countImage+']" type="text" class="form-control " placeholder="Image Label"></td><td class="text-center"><input name="img_order['+countImage+']" type="text" class="form-control" placeholder="Position"></td><td class="text-center"><input type="radio" name="is_thumb" value="'+countImage+'" ></td><td class="text-center"><input type="checkbox" name="img_status['+countImage+']" value="1" checked></td><td class="text-center"><button id="" class="remove-img btn btn-danger btn-sm" type="button" title="Remove Image"><i class="fa fa-times-circle"></i></button></td></tr>');
                              countImage++;
                            });
                            $("body").on("click",".remove-img",function(){ 
                              $(this).parents("tr.images-row").remove();
                            });
                          });
                        </script>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Mệnh giá</h3>
                        <button id="add-new-item" class="btn btn-warning float-right btn-sm" type="button" title="Add New Option"><i class="fa fa-plus-circle"></i> Thêm mệnh giá</button>
                      </div>
                      <div class="card-body row">
                        <div class="col-md-12">
                          <div id="items-wrapper" class="row">
                          @if(count($items))
                            @foreach($items as $key => $item)
                            <div class="edit-item col-md-6">
                              <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">{{ $item['name'] }}</h3>
                                    <button class="remove-option btn btn-danger float-right btn-sm" type="button" title="Xoá mệnh giá"><i class="fa fa-times-circle"></i> Xoá</button>
                                </div>
                                <div class="card-body row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="items[name]">Name:</label>
                                      <input type="hidden" name="items_exists[]" value="{{ $item['id'] }}" />
                                      <input name="items[name][]" type="text" class="form-control" placeholder="Name" value="{{ $item['name'] }}">
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="items[value]">Mệnh giá:</label>
                                      <div class="input-group">
                                        <input name="items[value][]" type="text" class="form-control" id="" placeholder="Mệnh giá" value="{{ $item['value'] }}">
                                        <div class="input-group-append"> <span class="input-group-text">VNĐ</span> </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="items[price]">Giá bán:</label>
                                      @if(count($currencies))
                                        @foreach ($currencies as $currency)
                                          <div class="input-group form-group">
                                            <input name="items[price][{{ $currency->id }}][]" type="text" class="form-control" id="" placeholder="Giá bán" @isset($item['prices'][$currency->id]) value="{{ $item['prices'][$currency->id]['price'] }}" @endif>
                                            <div class="input-group-append">
                                              <span class="input-group-text">{{ $currency->name }}</span>
                                            </div>
                                          </div>
                                        @endforeach
                                      @else
                                        <p class="alert alert-danger"><i class="icon fa fa-ban"></i>Bạn cần <a href="currencies/" target="__blank">tạo currencies</a> trước khi sử dụng chức năng này</p>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="items[sku]">SKU:</label>
                                      <input name="items[sku][]" type="text" class="form-control" id="" placeholder="SKU" value="{{ $item['sku'] }}">
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <select class="form-control" name="items[provider][]">
                                        <option value="0">Nguồn cấp</option>
                                        <option value="1">Kho Thẻ</option>
                                        <option value="3">VTC</option>
                                        <option value="2">VNPT</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="">Chiết khấu:</label>
                                      @if(count($groups_user))
                                        @foreach($groups_user as $group)
                                        <div class="form-group row">
                                          <div class="col-md-4 text-right">
                                            <label>{{ $group->name }}</label>
                                          </div>
                                          <div class="col-md-8 input-group">
                                            <input name="discount[value][{{ $group->id }}][]" type="text" class="form-control" id="" value="@if(isset($item['discount'][$group->id]['value'])) {{ $item['discount'][$group->id]['value'] }} @endif" />
                                            <div class="input-group-append"> <span class="input-group-text">(%)</span> </div>
                                          </div>
                                        </div>
                                        @endforeach
                                      @else
                                        <p class="alert alert-danger"><i class="icon fa fa-ban"></i>Bạn cần <a href="currencies/" target="__blank">tạo currencies</a> trước khi sử dụng chức năng này</p>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="items[order]">Thứ tự:</label>
                                      <input name="items[order][]" type="text" class="form-control" id="" placeholder="Thứ tự" value="{{ $item['sort_order'] }}">
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="items[status]" style="width: 100%">Enable:</label>
                                      <input name="items[status][]" type="checkbox" value="1" data-toggle="toggle" style="display: none;" @if($item['status']) checked="checked" @endif>
                                      <div class="Switch Round On" style="vertical-align:top;margin-left:10px;">
                                        <div class="Toggle"></div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            @endforeach
                          @endif
                          </div>
                          <?php
                            $discountHtml = '';
                            if(count($groups_user)):
                              foreach($groups_user as $group):
                                $discountHtml .= '<div class="form-group row"> <div class="col-md-4 text-right"> <label>'.$group->name.'</label> </div><div class="col-md-8 input-group"> <input name="discount[value]['.$group->id.'][]" type="text" class="form-control" id="" value="0"/> <div class="input-group-append"> <span class="input-group-text">(%)</span> </div></div></div>';
                              endforeach;
                            else:
                              $discountHtml = '<p class="alert alert-danger"><i class="icon fa fa-ban"></i>Bạn cần <a href="groups/" target="__blank">tạo group cho user</a> trước khi sử dụng chức năng này</p>';
                            endif;
                            $currenciesHTML = '<div class="col-md-12"><div class="form-group"><label for="items[price]">Giá bán:</label>';
                            if(count($currencies)):
                              foreach ($currencies as $currency):
                                $currenciesHTML .= '<div class="input-group form-group"><input name="items[price]['.$currency->id.'][]" type="text" class="form-control" id="" placeholder="Giá bán" value=""><div class="input-group-append"> <span class="input-group-text">'.$currency->name.'</span> </div></div>';
                              endforeach;
                            else:
                              $currenciesHTML .= '<p class="alert alert-danger"><i class="icon fa fa-ban"></i>Bạn cần <a href="currencies/" target="__blank">tạo currencies</a> trước khi sử dụng chức năng này</p>';
                            endif;
                            $currenciesHTML .= '</div></div>';
                          ?>
                          <script type="text/javascript">
                            discountHtml = '<?php echo $discountHtml ?>';
                            currenciesHTML = '<?php echo $currenciesHTML ?>';
                            $(document).ready(function() {
                              $("#add-new-item").click(function(){
                                $("#items-wrapper").append('<div class="edit-item col-md-6"> <div class="card card-info"> <div class="card-header"> <h3 class="card-title">Mệnh giá mới</h3> <button class="remove-option btn btn-danger float-right btn-sm" type="button" title="Xoá mệnh giá"><i class="fa fa-times-circle"></i> Xoá</button> </div><div class="card-body row"> <div class="col-md-12"> <div class="form-group"> <label for="items[name]">Name:</label> <input type="hidden" name="items_exists[]" value="0"/> <input name="items[name][]" type="text" class="form-control" id="" placeholder="Name" value=""> </div></div><div class="col-md-12"> <div class="form-group"> <label for="items[value]">Mệnh giá:</label> <div class="input-group"> <input name="items[value][]" type="text" class="form-control" id="" placeholder="Mệnh giá" value=""> <div class="input-group-append"> <span class="input-group-text">VND</span> </div></div></div></div>'+currenciesHTML+' <div class="col-md-12"> <div class="form-group"> <label for="items[sku]">SKU:</label> <input name="items[sku][]" type="text" class="form-control" id="" placeholder="SKU" value=""> </div></div><div class="col-md-12"> <div class="form-group"> <select class="form-control" name="items[provider][]"> <option value="0">Nguồn cấp</option> <option value="1">Kho Thẻ</option> <option value="3">VTC</option> <option value="2">VNPT</option> </select> </div></div><div class="col-md-12"> <div class="form-group"> <label for="sku">Chiết khấu:</label>'+discountHtml+'</div></div><div class="col-md-6"> <div class="form-group"> <label for="items[order]">Thứ tự:</label> <input name="items[order][]" type="text" class="form-control" id="" placeholder="Thứ tự"> </div></div><div class="col-md-12"> <div class="form-group"> <label for="items[status]" style="width: 100%">Enable:</label> <input name="items[status][]" type="checkbox" value="1" data-toggle="toggle" style="display: none;" checked="checked"> <div class="Switch Round On" style="vertical-align:top;margin-left:10px;"> <div class="Toggle"></div></div></div></div></div></div></div>');
                              });
                            });
                            $("body").on("click",".remove-option",function(){ 
                              $(this).parents(".edit-item").remove();
                            });
                          </script>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                {!! Form::close() !!}
            
            <!-- /.card -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
    <!-- /.card -->
    </div>
  <!-- /.col -->
  </div>
<!-- /.row -->
</section>
<!-- /.content -->
@endsection