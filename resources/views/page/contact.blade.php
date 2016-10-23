@extends('layouts.master')

@section('title')
    Contact Page
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
        <h1>Contact Me</h1>
      </div>
        <form class="form-horizontal" method="POST" action="/contact">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Your Name: </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old("name") }}">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Your Email: </label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="{{ old("email") }}">
                </div>
            </div>
            <div class="form-group">
                <label for="message" class="col-sm-2 control-label">Your Message: </label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="4" name="message" value="{{ old('message') }}"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <input id="submit" name="submit" type="submit" value="Send Message" class="btn btn-default">
                </div>
            </div>
            @if(count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            @if(session('svConfMessage'))
                <h4 class="text-primary">{{session('svConfMessage')}}</h4>
            @endif
        </form>
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
