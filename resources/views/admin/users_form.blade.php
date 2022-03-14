@extends('admin.app')
@section('title', 'User Edit')

@section('main')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Users</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit</h2>
                        <div class="clearfix"></div>
                    </div>




                    <div class="x_content">
                        @if ($error !== "")
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            {{ $error }}
                        </div>
                        @endif
                        <br>
                        <form class="form-horizontal form-label-left" action="{{ route('admin_users_edit', $form['id']) }}" method="post">
                            @csrf <!-- {{ csrf_field() }} -->
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Username</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="username" class="form-control" value="{{ $form['username'] }}" placeholder="Username">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Password</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="password" name="password" class="form-control" value="{{ $form['password'] }}" placeholder="Password">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Repeat password</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="password" name="password_again" class="form-control" value="{{ $form['password_again'] }}" placeholder="Repeat password">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="is_active">
                                        @if ($form['is_active'] === "0")
                                        <option value="1">Active</option>
                                        <option value="0" selected="selected">Inactive</option>
                                        @else
                                        <option value="1" selected="selected">Active</option>
                                        <option value="0">Inactive</option>
                                        @endif

                                    </select>
                                </div>
                            </div>







                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{ route('admin_users') }}" class="btn btn-success">Back</a>

                                </div>
                            </div>

                        </form>
                    </div>





                </div>
            </div>

        </div>
    </div>
</div>
<!-- /page content -->
@endsection
