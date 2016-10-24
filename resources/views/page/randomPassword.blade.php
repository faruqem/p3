@extends('layouts.master')

@section('title')
Password Generator
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
        <h2>Random Password Generator</h1><hr>
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" action="/random-password" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="tot-words">Total Words:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="tot-words" name="tot-words">
                                <option value = "2">2</option>
                                <option value = "3">3</option>
                                <option value = "4">4</option>
                                <option value = "5">5</option>
                                <option value = "6">6</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="tot-sp-chars">Total Sp. Chars. (from !, @, #, $, %, ^, &, *):</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="tot-sp-chars" name="tot-sp-chars">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="tot-numbers">Total Numbers:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="tot-numbers" name="tot-numbers">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="use-separator">Separator:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="use-separator" name="use-separator">
                                <option value="-">-</option>
                                <option value="!">!</option>
                                <option value="@">@</option>
                                <option value="#">#</option>
                                <option value="$">$</option>
                                <option value="%">%</option>
                                <option value="^">^</option>
                                <option value="&">&</option>
                                <option value="*">*</option>
                                <option value="space">Space</option>
                                <option value="none">No Separator</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="word-case">Word Case:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="word-case" name="word-case">
                                <option value="camel">Camel</option>
                                <option value="upper">UPPER</option>
                                <option value="lower">lower</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <label><input type="checkbox" name="save-preference" value="save" id="save-preference"> Save my preference!</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Generate Password</button>
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
                    @if(session('password'))
                            <h4><strong>Your Password: </strong><span class="lead">{{session('password')}}</span></h4>
                        <br>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection

{{--
    This 'body' section will be yielded right before the closing </body> tag.
    Use it to add specific things that *this* View needs at the end of the body,
    such as a page specific JavaScript files.
--}}
@section('body')
{{--Place holder for page specific JS file--}}
@endsection
