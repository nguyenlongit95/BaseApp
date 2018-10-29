@extends('admin.master')

@section('content')
    <!-- Main content -->
    <section class="content">

        <div class="col-xs-6 col-md-6 col-lg-6 pull-left">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List Info</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include('admin.layouts.alert')
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Page Name</th>
                            <th>Info</th>
                            <th>Value</th>
                            <th class="text-center">Update</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($InfoOfPage as $infoOfPage)
                        <form action="admin/InfoAndLinked/updateInfoOfPage">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <tr>
                                <td>{{ $infoOfPage->id }}</td>
                                <td>
                                    <input class="form-control" type="text" name="PageName" value="{{ $infoOfPage->PageName }}">
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="Info" value="{{ $infoOfPage->Info }}">
                                </td>
                                <td>
                                    <textarea class="form-control" name="Value" id="Value" cols="30" rows="10">{{ $infoOfPage->Value }}</textarea>
                                </td>
                                <td>
                                    <input type="submit" class="form-control" value="Update">
                                </td>
                            </tr>
                        </form>
                        @endforeach
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-xs-6 col-md-6 col-lg-6 pull-left">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List Linked</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include('admin.layouts.alert')
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Linked</th>
                            <th>Value</th>
                            <th class="text-center">Update</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Linked as $linked)
                            <form action="admin/InfoAndLinked/updateLinked">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <tr>
                                    <td>{{ $linked->id }}</td>
                                    <td>
                                        <input class="form-control" type="text" name="Linked" value="{{ $linked->Linked }}">
                                    </td>
                                    <td>
                                        <textarea class="form-control" name="Value" id="Value" cols="30" rows="10">{{ $linked->Value }}</textarea>
                                    </td>
                                    <td>
                                        <input type="submit" class="form-control" value="Update">
                                    </td>
                                </tr>
                            </form>
                        @endforeach
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

    </section>
    <!-- /.content -->
@endsection
