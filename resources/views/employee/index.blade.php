@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
              Company Information
            </div>
            <div class="alert alert-success" role="alert">
                This is a success alert—check it out!
              </div>
              <div class="alert alert-danger" role="alert">
                This is a danger alert—check it out!
              </div>
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
                    <tr>
                        <td><input type="checkbox" class="checkthis" /></td>
                        <td>Mohsin</td>
                        <td>Irshad</td>
                        <td>
                            <p data-placement="top" data-toggle="tooltip" title="Edit">
                                <button class="btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit" >
                                    <span class="fa fa-keyboard"></span>
                                </button>
                            </p>
                        </td>
                        <td>
                            <p data-placement="top" data-toggle="tooltip" title="Delete">
                                <button class="btn btn-danger btn-sm" data-title="Delete" data-toggle="modal" data-target="#delete" >
                                    <span class="fa fa-trash"></span>
                                </button>
                            </p>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="clearfix"></div>
                    <ul class="pagination pull-right">
                        <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                    </ul>

                    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="" aria-hidden="true"></span></button>
                                    <h4 class="modal-title custom_align" id="Heading">Add New Employee</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input class="form-control " type="text" id="first_name" name="first_name" placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control " type="text" id="last_name" name="last_name" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="modal-footer ">
                                    <button type="button" class="btn btn-success btn-sm" style="width: 100%;">
                                        <span class=""></span>ADD
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="" aria-hidden="true"></span></button>
                                    <h4 class="modal-title custom_align" id="Heading">Edit Employee</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input class="form-control " type="text" id="first_name" name="first_name">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control " type="text" id="last_name" name="last_name">
                                    </div>
                                </div>
                                <div class="modal-footer ">
                                    <button type="button" class="btn btn-warning btn-sm" style="width: 100%;">
                                        <span class=""></span>Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
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
                                <div class="modal-footer ">
                                    <button type="button" class="btn btn-success" >
                                        <span class=""></span> Yes
                                    </button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                        <span class="glyphicon glyphicon-remove"></span> No
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


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