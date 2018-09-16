@extends('admin.master')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="col-xs-12 col-md-12 col-lg-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List Blogs / <a href="admin/Blog/addBlogs">Add new</a></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include('admin.layouts.alert')
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Info</th>
                            <th>Description</th>
                            <th>Author</th>
                            <th>Tags</th>
                            <th>Image Blogs</th>
                            <th>Categories</th>
                            <th class="text-center">Update</th>
                            <th class="text-center">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Blogs as $blogs)
                        <tr>
                            <td>{{ $blogs->id }}</td>
                            <td>
                                {{ $blogs->Title }}
                            </td>
                            <td>
                                {{ $blogs->Info }}
                            </td>
                            <td>
                                {{ $blogs->Description }}
                            </td>
                            <td>
                                {{ $blogs->Author }}
                            </td>
                            <td>
                                {{ $blogs->Tags }}
                            </td>
                            <td>
                                <img src="upload/Blogs/{{$blogs->Image}}" height="100px" width="100px" alt="">
                            </td>
                            <td>
                                {{ $blogs->idCategoryBlog }}
                            </td>
                            <td class="text-center"><a href="admin/Blog/updateBlog/{{$blogs->id}}" class="btn-warning padding510510">Update</a></td>
                            <td class="text-center"><a href="admin/Blog/deleteBlog/{{$blogs->id}}" class="btn-danger padding510510">Delete</a></td>
                        </tr>
                        @endforeach
                        </tfoot>
                    </table>
                    {!! $Blogs->render() !!}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

    </section>
    <!-- /.content -->
@endsection
