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
                            <label class="control-label col-sm-2" for="tot-words">Total words:</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="tot-words" name="tot-words">
                                    <option value = "2" <?php if(isset($_GET['tot-words']) && htmlentities($_GET['tot-words']) == '2') echo "selected";?>>2</option>
                                    <option value = "3" <?php if(isset($_GET['tot-words']) && htmlentities($_GET['tot-words']) == '3') echo "selected";?>>3</option>
                                    <option value = "4" <?php if(isset($_GET['tot-words']) && htmlentities($_GET['tot-words']) == '4') echo "selected";?>>4</option>
                                    <option value = "5" <?php if(isset($_GET['tot-words']) && htmlentities($_GET['tot-words']) == '5') echo "selected";?>>5</option>
                                    <option value = "6" <?php if(isset($_GET['tot-words']) && htmlentities($_GET['tot-words']) == '6') echo "selected";?>>6</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="tot-sp-chars">Total symbols (from !, @, #, $, %, ^, &, *):</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="tot-sp-chars" name="tot-sp-chars">
                                    <option value="0" <?php if(isset($_GET['tot-sp-chars']) && htmlentities($_GET['tot-sp-chars']) == '0') echo "selected";?>>0</option>
                                    <option value="1" <?php if(isset($_GET['tot-sp-chars']) && htmlentities($_GET['tot-sp-chars']) == '1') echo "selected";?>>1</option>
                                    <option value="2" <?php if(isset($_GET['tot-sp-chars']) && htmlentities($_GET['tot-sp-chars']) == '2') echo "selected";?>>2</option>
                                    <option value="3" <?php if(isset($_GET['tot-sp-chars']) && htmlentities($_GET['tot-sp-chars']) == '3') echo "selected";?>>3</option>
                                    <option value="4" <?php if(isset($_GET['tot-sp-chars']) && htmlentities($_GET['tot-sp-chars']) == '4') echo "selected";?>>4</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="tot-numbers">Total numbers:</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="tot-numbers" name="tot-numbers">
                                    <option value="0" <?php if(isset($_GET['tot-numbers']) && htmlentities($_GET['tot-numbers']) == '0') echo "selected";?>>0</option>
                                    <option value="1" <?php if(isset($_GET['tot-numbers']) && htmlentities($_GET['tot-numbers']) == '1') echo "selected";?>>1</option>
                                    <option value="2" <?php if(isset($_GET['tot-numbers']) && htmlentities($_GET['tot-numbers']) == '2') echo "selected";?>>2</option>
                                    <option value="3" <?php if(isset($_GET['tot-numbers']) && htmlentities($_GET['tot-numbers']) == '3') echo "selected";?>>3</option>
                                    <option value="4" <?php if(isset($_GET['tot-numbers']) && htmlentities($_GET['tot-numbers']) == '4') echo "selected";?>>4</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="use-separator">Separator:</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="use-separator" name="use-separator">
                                    <option value="-" <?php if(isset($_GET['use-separator']) && htmlentities($_GET['use-separator']) == '-') echo "selected";?>>-</option>
                                    <option value="!" <?php if(isset($_GET['use-separator']) && htmlentities($_GET['use-separator']) == '!') echo "selected";?>>!</option>
                                    <option value="@" <?php if(isset($_GET['use-separator']) && htmlentities($_GET['use-separator']) == '@') echo "selected";?>>@</option>
                                    <option value="#" <?php if(isset($_GET['use-separator']) && htmlentities($_GET['use-separator']) == '#') echo "selected";?>>#</option>
                                    <option value="$" <?php if(isset($_GET['use-separator']) && htmlentities($_GET['use-separator']) == '$') echo "selected";?>>$</option>
                                    <option value="%" <?php if(isset($_GET['use-separator']) && htmlentities($_GET['use-separator']) == '%') echo "selected";?>>%</option>
                                    <option value="^" <?php if(isset($_GET['use-separator']) && htmlentities($_GET['use-separator']) == '^') echo "selected";?>>^</option>
                                    <option value="&" <?php if(isset($_GET['use-separator']) && htmlentities($_GET['use-separator']) == '&') echo "selected";?>>&</option>
                                    <option value="*" <?php if(isset($_GET['use-separator']) && htmlentities($_GET['use-separator']) == '*') echo "selected";?>>*</option>
                                    <option value="space" <?php if(isset($_GET['use-separator']) && $_GET['use-separator'] == 'space') echo "selected";?>>Space</option>
                                    <option value="none" <?php if(isset($_GET['use-separator']) && $_GET['use-separator'] == 'none') echo "selected";?>>No Separator</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="word-case">Word Case:</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="word-case" name="word-case">
                                    <option value="upper" <?php if(isset($_GET['word-case']) && htmlentities($_GET['word-case']) == 'upper') echo "selected";?>>UPPER</option>
                                    <option value="lower" <?php if(isset($_GET['word-case']) && htmlentities($_GET['word-case']) == 'lower') echo "selected";?>>lower</option>
                                    <option value="camel" <?php if(isset($_GET['word-case']) && htmlentities($_GET['word-case']) == 'camel') echo "selected";?>>Camel</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <label><input type="checkbox" name="save-preference" value="save" id="save-preference" <?php if(isset($_GET['save-preference']) && htmlentities($_GET['save-preference']) == 'save') echo "checked";?>>Save my preference!</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Generate Password</button>
                            </div>
                        </div><hr>
                        @if(session('password'))
                                <h4><strong>Your Password: </strong>{{session('password')}}</h4>
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
