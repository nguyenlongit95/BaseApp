@extends('admin.master')

@section('content')
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Products details</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.layouts.alert')
                <div class="row">
                    <div class="col-md-8 pull-left">
                        <form action="admin/Product/updateProduct/{{ $Product->id }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="box box-danger">
                                <div class="box-header">
                                    <h3 class="box-title">Update form data element</h3>
                                </div>
                                <div class="box-body">
                                    <!-- Date mm/dd/yyyy -->
                                    <div class="form-group">
                                        <label for="">Name of Product</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit fa-pen-alt"></i>
                                            </div>
                                            <input type="text" name="NameProduct" class="form-control" value="{{ $Product->NameProduct }}">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <!-- Date mm/dd/yyyy -->
                                    <div class="form-group">
                                        <label for="">Price</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit fa-pen-alt"></i>
                                            </div>
                                            <input type="text" name="Price" class="form-control" value="{{ $Product->Price }}">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <!-- Date mm/dd/yyyy -->
                                    <div class="form-group">
                                        <label for="">Sales(%)</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit fa-pen-alt"></i>
                                            </div>
                                            <input type="number" name="Sales" class="form-control" value="{{ $Product->Sales }}">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <!-- Date mm/dd/yyyy -->
                                    <div class="form-group">
                                        <label for="">Quantity</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit fa-pen-alt"></i>
                                            </div>
                                            <input type="number" name="Quantity" class="form-control" value="{{ $Product->Quantity }}">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <!-- phone mask -->
                                    <div class="form-group">
                                        <label>Info of category:</label>

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-align-left"></i>
                                            </div>
                                            <SELECT class="form-control" name="idCategories">
                                                @foreach($Category as $category)
                                                    <OPTION <?php if($category->id == $Product->idCategories){echo "selected";} else{} ?> value="{{ $category->id }}">{{ $category->NameCategory }}</OPTION>
                                                @endforeach
                                            </SELECT>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <!-- Date mm/dd/yyyy -->
                                    <div class="form-group">
                                        <label for="">Info of product</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit fa-pen-alt"></i>
                                            </div>
                                            <textarea class="form-control ckeditor" name="Info" id="info" cols="30" rows="5">{!! $Product->Info !!}</textarea>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <!-- Date mm/dd/yyyy -->
                                    <div class="form-group">
                                        <label for="">Descriptions</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit fa-pen-alt"></i>
                                            </div>
                                            <textarea class="form-control ckeditor" name="Description" id="info" cols="30" rows="10">{!! $Product->Description !!}</textarea>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <!-- IP mask -->
                                    <div class="form-group">
                                        <label>Submit data:</label>

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-paper-plane"></i>
                                            </div>
                                            <input type="submit" class="form-control" value="Submit">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </form>
                    </div>

                    <div class="col-md-4 pull-right">
                        <div class="box box-danger">
                            <div class="box-header">
                                <h3 class="box-title">Image and rattings star</h3>
                            </div>
                        <h5 class="box-title">Update Image</h5>
                        <form action="admin/Product/addImage/{{$Product->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="file" name="ImageProduct" value="Add Image" class="form-control">
                            <input type="submit" value="Add Image" class="form-control btn btn-primary">
                        </form>
                        <table id="example2" style="margin-top:15px;" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ImageProduct as $imageProduct)
                                <tr>
                                    <td class="text-center" style="padding-top:15%;">{{ $imageProduct->id }}</td>
                                    <td class="text-center">
                                        <img width="100px" height="100px" class="reposive-image" src="upload/Product/{{$imageProduct->ImageProduct}}" alt="{{ $Product->NameProduct }}">
                                    </td>
                                    <td style="padding-top:15%;" class="text-center"><a href="admin/Product/deleteImage/{{$imageProduct->id}}" class="btn-danger padding510510">Delete</a></td>
                                </tr>
                            @endforeach
                            </tfoot>
                        </table>
                        <h5>Mumber average this product: <span class="btn <?php if($StarProduct >= 3){ echo "btn-success";}else if($StarProduct<3){echo "btn-danger";} ?>"><?php $StarAVG = number_format($StarProduct); for($i=1; $i<=$StarAVG;$i++){ ?> <i class="fa fa-star"></i><?php } ?></span></h5>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Number star</th>
                                <th>Product evaluation</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($RattingProduct as $rattingProduct)
                                <tr>
                                    <td>{{ $rattingProduct->id }}</td>
                                    <td>
                                        <?php
                                        for($i=1; $i<=$rattingProduct->Ratting; $i++){
                                            ?><i class="fa fa-star"></i><?php
                                        }
                                        ?>
                                    </td>
                                    <td>{!! $rattingProduct->Info !!}</td>
                                </tr>
                            @endforeach
                            </tfoot>
                        </table>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore quibusdam odit culpa aspernatur ex voluptas soluta doloremque exercitationem deserunt dicta vel nemo, et enim fugit expedita ullam laudantium minus quam.
                        </p>

                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam eveniet maxime neque accusantium perferendis repudiandae magni sint amet tempora repellendus recusandae eligendi temporibus cupiditate atque, porro consectetur voluptas cum incidunt.
                        </p>

                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum ipsa repellat accusamus nemo fuga, neque asperiores consectetur tempora necessitatibus minima rem aspernatur. Beatae eius aliquam maxime distinctio id reprehenderit repudiandae.
                        </p>

                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus nemo ea maiores saepe quo minima, culpa sint incidunt perspiciatis omnis dolore accusamus adipisci quam architecto pariatur natus! Necessitatibus, quibusdam exercitationem!
                        </p>

                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta adipisci provident suscipit veritatis distinctio, aliquam qui, quod minima eveniet voluptates vero esse. Nam, officiis! Unde ipsum architecto culpa corrupti vitae!
                        </p>

                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta adipisci provident suscipit veritatis distinctio, aliquam qui, quod minima eveniet voluptates vero esse. Nam, officiis!
                        </p>
                    </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col (right) -->
        </div>
        <!-- /.row -->
        <!-- /.content -->
        </div>
    </section>
@endsection
