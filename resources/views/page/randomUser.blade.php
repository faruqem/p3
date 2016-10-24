@extends('layouts.master')

@section('title','Random Users Generator')

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
        <h2>Random Users Generator</h1><hr>
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" action="/random-user" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group row">
                          <label for="totalUser" class="col-sm-2 col-form-label">Total Users (1 to 75):</label>
                          <div class="col-sm-10">
                            <input class="form-control" type="text" name="totalUser" value="{{ old('totalUser') }}">
                          </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <label><input type="checkbox" name="includeDOB" value="{{ old('dob') }}"> Date of Birth</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <label><input type="checkbox" name="includeLocation" value="{{ old('location') }}"> Location</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <label><input type="checkbox" name="includeProfile" value="{{ old('profile') }}"> Profile</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Generate Users</button>
                        </div>
                    </div>
                    @if(count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="text-danger"><strong>{{ $error }}</strong></li>
                            @endforeach
                        </ul>
                    @endif
                    <hr>

                    @if(session('svUsers'))
                        <h4>Generated Users:</h4>
                        @foreach(unserialize(session('svUsers')) as $user)
                            <p><strong>{{$user[0]}}</strong>
                                @if(session('svIncludeDOB'))<br>{{$user[1]}}@endif
                                @if(session('svIncludeLocation'))<br>{{$user[2]}}@endif
                                @if(session('svIncludeProfile'))<br>{{$user[3]}}@endif
                            </p>
                            <br>
                        @endforeach
                        <br>
                    @endif
                </form>
            </div>
        </div>
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
