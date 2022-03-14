@extends('admin.app')
@section('title', 'Users')

@section('main')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_right">
                <h3>Users</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List

                        </h2>

                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                <tr class="headings">
                                    <th class="column-title">Username</th>
                                    <th class="column-title" style="width:150px;">Active</th>
                                    <th class="column-title" style="width:150px;">Edit</th>
                                    <th class="column-title no-link last" style="width:150px;">Delete</th>
                                </tr>
                                </thead>

                                <tbody>
                                    @foreach ($list as $item)
                                        <tr class="@if ($loop->even) even @else odd @endif even pointer">
                                            <td class=" ">{{ $item->username }}</td>
                                            <td class=" ">@if ($item->is_active === '1') Yes @else No @endif</td>
                                            <td class=" "><a href="{{ route('admin_users_form',$item->id) }}">Edit</a>
                                            <td class=" last"><a href="{{ route('admin_users_delete',$item->id) }}" onclick="return confirm('Are you sure?');">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /page content -->
@endsection
