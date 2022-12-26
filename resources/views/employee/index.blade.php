@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
              Employees List
            </div>
            @if(session()->has('message'))
              <div class="alert alert-success" role="alert">
                {{ session()->get('message') }}
              </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <button class="btn btn-success btn-sm" data-title="add" data-toggle="modal" data-target="#add" >
                        <span class="fa fa-user-plus"></span>
                    </button>
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                            <th><input type="checkbox" id="checkall" /></th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                    <tbody>
                        @foreach ($emp as $row)
                            <tr>
                                <td><input type="checkbox" class="checkthis" /></td>
                                <td>{{ $row->first_name }}</td>
                                <td>{{ $row->last_name }}</td>
                                <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <button class="btn btn-primary btn-sm edit-modal" data-title="Edit"
                                                data-id={{$row->id}} data-fname={{$row->first_name}} data-lname={{$row->last_name}}
                                                data-toggle="modal"
                                                data-target="#edit" >
                                            <span class="fa fa-keyboard"></span>
                                        </button>
                                    </p>
                                </td>
                                <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Delete">
                                        <button class="btn btn-danger btn-sm delete-modal" data-title="Delete"
                                                data-id={{$row->id}}
                                                data-toggle="modal" data-target="#delete" >
                                            <span class="fa fa-trash"></span>
                                        </button>
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="clearfix"></div>
                <div class="pull-right">
                    {{ $emp->links('pagination::bootstrap-4') }}
                    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="{{route('emp.store')}}">
                                    @csrf
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="" aria-hidden="true"></span></button>
                                        <h4 class="modal-title custom_align" id="Heading">Add New Employee</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input class="form-control @error('first_name') is-invalid @enderror" type="text" id="first_name" name="first_name" placeholder="First Name">
                                            @error('first_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control @error('last_name') is-invalid @enderror" type="text" id="last_name" name="last_name" placeholder="Last Name">
                                            @error('last_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer ">
                                        <button type="submit" class="btn btn-success btn-sm" style="width: 100%;">
                                            CREATE
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="{{route('emp.update')}}">
                                    @csrf
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="" aria-hidden="true"></span></button>
                                        <h4 class="modal-title custom_align" id="Heading">Edit Employee</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input class="form-control " type="text" id="update_first_name" name="update_first_name" />
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control " type="text" id="update_last_name" name="update_last_name" />
                                        </div>
                                    </div>
                                    <input type="hidden" id="emp_id" name="emp_id" />
                                    <div class="modal-footer ">
                                        <button type="submit" class="btn btn-warning btn-sm" style="width: 100%;">
                                            <span class=""></span>Update
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script>
                        $('.edit-modal').click(function() {
                            let id = $(this).data('id');
                            let fname = $(this).data('fname');
                            let lname = $(this).data('lname');
                            $("#update_first_name").val(fname);
                            $("#update_last_name").val(lname);
                            $("#emp_id").val(id);
                        });
                    </script>
                    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="{{route('emp.destroy')}}">
                                @csrf
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                            <span class="fa fa-trash" aria-hidden="true"></span>
                                        </button>
                                        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-danger">
                                            <span class="fa fa-exclamation-circle"></span> Are you sure you want to delete this Record?
                                        </div>
                                    </div>
                                    <input type="hidden" id="delete_emp_id" name="delete_emp_id" />
                                    <div class="modal-footer ">
                                        <button type="submit" class="btn btn-success" >
                                            <span class=""></span>Yes
                                        </button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                            <span class="glyphicon glyphicon-remove"></span>No
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script>
                        $('.delete-modal').click(function() {
                            let id = $(this).data('id');
                            $("#delete_emp_id").val(id);
                        });
                    </script>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $("#mytable #checkall").click(function () {
                        if ($("#mytable #checkall").is(':checked')) {
                            $("#mytable input[type=checkbox]").each(function () {
                                $(this).prop("checked", true);
                            });

                        } else {
                            $("#mytable input[type=checkbox]").each(function () {
                                $(this).prop("checked", false);
                            });
                        }
                });

                $("[data-toggle=tooltip]").tooltip();
            });
        </script>
    </div>
@endsection