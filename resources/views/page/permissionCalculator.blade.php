@extends('layouts.master')

@section('title')
    Permissions Calculator
@endsection

{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')
    {{--Place holder for page specific CSS file--}}
@endsection

@section('content')
    <!-- Begin page content -->
    <div class="container">
        <div class="page-header">
            <h2>Permissions Calculator</h2>
        </div>
        <form  action="/permission-calculator" method="POST">
            {{ csrf_field() }}
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        <th><h4><span class="label label-primary">Owner</span></h4></th>
                        <th><h4><span class="label label-primary">Group</span></h4></th>
                        <th><h4><span class="label label-primary">Other</span></h4></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th><h4 class="text-success">Calculated permission values:<h4>
                        </th>
                        <th>
                            <h4 class="text-success">
                                @if(session('svCalPerms'))
                                    {{unserialize(session('svCalPerms'))["ownerPermission"]}}
                                @endif
                            </h4>
                        </th>
                        <th>
                            <h4 class="text-success">
                                @if(session('svCalPerms'))
                                    {{unserialize(session('svCalPerms'))["groupPermission"]}}
                                @endif
                            </h4>
                        </th>
                        <th>
                            <h4 class="text-success">
                                @if(session('svCalPerms'))
                                    {{unserialize(session('svCalPerms'))["otherPermission"]}}
                                @endif
                            </h4>
                        </th>
                    </tr>
                    <tr>
                        <th><h4 class="text-success">Your command using octal notation: </h4></th>
                        <th colspan="3">
                            @if(session('svCalPerms'))
                                <pre>chmod {{unserialize(session('svCalPerms'))["ownerPermission"]}}{{unserialize(session('svCalPerms'))["groupPermission"]}}{{unserialize(session('svCalPerms'))["otherPermission"]}} myfile</pre>
                            @endif
                        </th>
                    <tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td><h4><span class="label label-primary">Read (4)</span></h4></td>
                        <td>
                            <div class="checkbox">
                                <label><input type="checkbox" name="permissionReadOwner" value=""></label>
                            </div>
                        </td>
                        <td>
                            <div class="checkbox">
                                <label><input type="checkbox" name="permissionReadGroup" value=""></label>
                            </div>
                        </td>
                        <td>
                            <div class="checkbox">
                                <label><input type="checkbox" name="permissionReadOther" value=""></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><h4><span class="label label-primary">Write (2)</span></h4></td>
                        <td>
                            <div class="checkbox">
                                <label><input type="checkbox" name="permissionWriteOwner" value=""></label>
                            </div>
                        </td>
                        <td>
                            <div class="checkbox">
                                <label><input type="checkbox" name="permissionWriteGroup" value=""></label>
                            </div>
                        </td>
                        <td>
                            <div class="checkbox">
                                <label><input type="checkbox" name="permissionWriteOther" value=""></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><h4><span class="label label-primary">Execute (1)</span></h4></td>
                        <td>
                            <div class="checkbox">
                                <label><input type="checkbox" name="permissionExecuteOwner" value=""></label>
                            </div>
                        </td>
                        <td>
                            <div class="checkbox">
                                <label><input type="checkbox" name="permissionExecuteGroup" value=""></label>
                            </div>
                        </td>
                        <td>
                            <div class="checkbox">
                                <label><input type="checkbox" name="permissionExecuteOther" value=""></label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-default">Calculate Permission</button>
        </form>
        <br><br>
    </div>
@endsection


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    {{--Place holder for page specific JS file--}}
@endsection
