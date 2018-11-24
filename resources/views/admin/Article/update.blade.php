@extends('admin.master')

@section('content')

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Article update</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.layouts.alert')
                <div class="row">
                    <form action="admin/Article/updateArticle/{{ $Article->id }}" method="POST" enctype="multipart/form-data">
                        <div class="col-md-9">
                            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                            <div class="box box-danger">
                                <div class="box-header">
                                    <h3 class="box-title">Update form data element</h3>
                                </div>
                                <div class="box-body">
                                    <!-- Date mm/dd/yyyy -->
                                    <div class="form-group">
                                        <label for="">Title of article</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit fa-pen-alt"></i>
                                            </div>
                                            <input type="text" id="TitleArticle" name="Title" class="form-control" value="{{ $Article->Title }}">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <!-- phone mask -->
                                    <div class="form-group">
                                        <label>Information of article</label>

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-align-left"></i>
                                            </div>
                                            <textarea class="ckeditor" name="Info" id="" cols="30" rows="10">{{ $Article->Info }}</textarea>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <!-- phone mask -->
                                    <div class="form-group">
                                        <label>Description of article</label>

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-align-left"></i>
                                            </div>
                                            <textarea class="form-control ckeditor" name="Details" id="Details" cols="30" rows="30">{{ $Article->Details }}</textarea>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->

                        </div>

                        <div class="col-md-3">
                            <div class="box box-danger">
                                <div class="box-header">
                                    <h3 class="box-title">SEO Infomation spiner</h3>
                                </div>
                                <!-- Date mm/dd/yyyy -->
                                <div class="form-group">
                                    <label for="">Slug in article</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit fa-pen-alt"></i>
                                        </div>
                                        <input type="text" id="Slug" name="Slug" class="form-control" value="{{ $Article->Slug }}">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                                <!-- phone mask -->
                                <div class="form-group">
                                    <label>Author of article</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input type="text" name="Author" class="form-control" value="{{ $Article->Author }}">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->

                                <!-- phone mask -->
                                <div class="form-group">
                                    <label>Linked this article</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-compress"></i>
                                        </div>
                                        <input type="text" name="Linked" class="form-control" value="{{ $Article->Linked }}">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->

                                <!-- phone mask -->
                                <div class="form-group">
                                    <label>Status of article</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                        Public: <input <?php if($Article->Status == 1){ echo "checked"; } ?> type="radio" name="Status" value="1">
                                        Private: <input <?php if($Article->Status == 0){ echo "checked"; } ?> checked type="radio" name="Status" value="0">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->

                                <!-- phone mask -->
                                <div class="form-group">
                                    <label>Representative of the article</label>
                                    <img src="upload/Articles/{{ $Article->Images }}" height="250px" width="100%" alt="{{ $Article->Title }}">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-image"></i>
                                        </div>
                                        <input type="file" name="Images" class="form-control" value="{{ $Article->Images }}">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                                <p>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore quibusdam odit culpa aspernatur ex voluptas soluta doloremque exercitationem deserunt dicta vel nemo.
                                </p>
                                <div class="form-group">
                                    <label>Submit data:</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-paper-plane"></i>
                                        </div>
                                        <input type="submit" class="form-control btn-primary" value="Submit">
                                    </div>
                                    <!-- /.input group -->
                                </div>

                            </div>
                        </div>
                </div>
                </form>
            </div>
            <!-- /.col (right) -->
            <!-- /.form group -->
        </div>
        <!-- /.row -->
        </tbody>

        <!-- /.content -->
@endsection
