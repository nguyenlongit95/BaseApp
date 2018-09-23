@extends('admin.master')

@section('content')
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Categories</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.layouts.alert')
                <div class="row">
                    <div class="col-md-6">
                        <form action="admin/Blog/updateBlogs/{{ $Blog->id }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="box box-danger">
                                <div class="box-header">
                                    <h3 class="box-title">Update form data element</h3>
                                </div>
                                <div class="box-body">
                                    <!-- Date mm/dd/yyyy -->
                                    <div class="form-group">
                                        <label for="">Title this blog</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit fa-pen-alt"></i>
                                            </div>
                                            <input type="text" name="Title" class="form-control" value="{{ $Blog->Title }}">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <!-- phone mask -->
                                    <div class="form-group">
                                        <label>Info blog</label>

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-align-left"></i>
                                            </div>
                                            <textarea name="Info" class="form-control ckeditor" id="" cols="30" rows="5">{{ $Blog->Info }}</textarea>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <!-- phone mask -->
                                    <div class="form-group">
                                        <label>Description</label>

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-align-left"></i>
                                            </div>
                                            <textarea name="Description" class="form-control ckeditor" id="" cols="30" rows="10">{{ $Blog->Description }}</textarea>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <!-- phone mask -->
                                    <div class="form-group">
                                        <label>Author</label>

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-align-left"></i>
                                            </div>
                                            <input type="text" name="Author" class="form-control" value="{{ $Blog->Author }}">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <!-- phone mask -->
                                    <div class="form-group">
                                        <label>Tags</label>

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-align-left"></i>
                                            </div>
                                            <input type="text" name="Tags" class="form-control" value="{{ $Blog->Tags }}">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <!-- phone mask -->
                                    <div class="form-group">
                                        <label>Blog categories</label>

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-compress"></i>
                                            </div>
                                            <SELECT class="form-control" name="idCategoryBlog">
                                                @foreach($CategoryBlog as $categoryBlogs)
                                                    <OPTION <?php if($categoryBlogs->id == $Blog->idCategoryBlog){echo "SELECTED";}else{} ?> value="{{ $categoryBlogs->id }}">{{ $categoryBlogs->NameCategory }}</OPTION>
                                                @endforeach
                                            </SELECT>
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

                    <div class="col-md-6">
                        <img src="upload/Blogs/{{ $Blog->Image }}" style="max-width: 100%; max-height: 300px; padding-bottom:20px;" alt="">
                        <form class="form-group" action="admin/Blog/changeImageBlogs/{{$Blog->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input class="form-control" type="file" name="Image">
                            <input class="form-control btn btn-primary" type="submit" value="Submit Image">
                        </form>
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
