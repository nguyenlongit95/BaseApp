@extends('admin.master')

@section('content')

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Blogs</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.layouts.alert')
                <form class="row">
                    <form action="admin/Blog/AddBlogs" method="POST" enctype="multipart/form-data">
                    <div class="col-md-9">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="box box-danger">
                                <div class="box-header">
                                    <h3 class="box-title">Add form data element</h3>
                                </div>
                                <div class="box-body">
                                    <!-- Date mm/dd/yyyy -->
                                    <div class="form-group">
                                        <label for="">Title this blog</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit fa-pen-alt"></i>
                                            </div>
                                            <input type="text" name="Title" class="form-control" placeholder="Title this blog">
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
                                            <textarea name="Info" class="form-control ckeditor" id="" cols="30" rows="10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores consequatur corporis, dignissimos dolorum eaque enim expedita facere, hic magnam necessitatibus numquam odit quidem similique sint, tempore. Deleniti itaque perspiciatis vero.</textarea>
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
                                            <textarea name="Description" class="form-control ckeditor" id="" cols="30" rows="10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores consequatur corporis, dignissimos dolorum eaque enim expedita facere, hic magnam necessitatibus numquam odit quidem similique sint, tempore. Deleniti itaque perspiciatis vero.</textarea>
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

                        <!-- phone mask -->
                        <div class="form-group">
                            <label>Author</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-align-left"></i>
                                </div>
                                <input type="text" name="Author" class="form-control" placeholder="Adminstator">
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
                                <input type="text" name="Tags" class="form-control" placeholder="Blog">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->

                        <!-- phone mask -->
                        <div class="form-group">
                            <label>Image blog</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-align-left"></i>
                                </div>
                                <input type="file" name="Image" class="form-control" value="DefaultImage.jpg">
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
                                <SELECT class="form-control" name="Parent_id">
                                    @foreach($CategoryBlogs as $categoryBlogs)
                                        <OPTION value="{{ $categoryBlogs->id }}">{{ $categoryBlogs->NameCategory }}</OPTION>
                                    @endforeach
                                </SELECT>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
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
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>

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
                </form>
                </div>
            </div>
            <!-- /.col (right) -->
        </div>
        <!-- /.row -->
        </tbody>

        <!-- /.content -->


@endsection
