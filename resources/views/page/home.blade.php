@extends('layouts.master')

@section('title','Home')

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
        <div class="row">
            <div class="col-md-6">
                <h2>Lorem Ipsum Generator</h2>
                <p>Lorem Ipsum is simply dummy text to setup the layout of a website as a reader may get distracted by the readable content of a page when looking at its layout. You can use this tool to generate 1 to 99 paragarphs of Lorem Ipsum text.</p>
                <p><a class="btn btn-default" href="/lorem-ipsum" role="button">Lorem Ipsum Generator &raquo;</a></p>
            </div>
            <div class="col-md-6">
                <h2>Random Users Generator</h2>
                <p>This tool will give you 1 to 75 of randomly generated dummy user names along with the options to generate their date of birth, location and short profile blurb, that you can use as test data for any of your applications.</p>
                <p><a class="btn btn-default" href="/random-user" role="button">Random Users Generator &raquo;</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h2>Random Password Generator</h2>
                <p>This tool helps a user generate a xkcd style random password based on their preference. XKCD style password is considered easy to remember but hard to guess. For more information check <a href="http://xkcd.com/936/">XKCD Password Strength</a> page.</p>
                <p><a class="btn btn-default" href="/random-password" role="button">Random Password Generator &raquo;</a></p>
            </div>
            <div class="col-md-6">
                <h2>Permissions Calculator</h2>
                <p>This utility helps a user calculate the numeric (octal) value for a set of file or folder permissions in Linux servers to be used with the <strong>chmod</strong> command. To learn more about chmod command visit <a href="https://en.wikipedia.org/wiki/Chmod">chmod Wikipedia</a> page.</p>
                <p><a class="btn btn-default" href="/permission-calculator" role="button">Permissions Calculator &raquo;</a></p>
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
