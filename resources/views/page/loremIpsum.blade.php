@extends('layouts.master')

@section('title','Lorem Ipsum Generator')

{{--
    This `head` section will be yielded right before the closing </head> tag.
    Use it to add specific things that *this* View needs in the head,
    such as a page specific stylesheets.
--}}
@section('head')
    {{--Place holder for page specific CSS file--}}
@endsection

@section('content')
    <!--Begin page content-->
    <div class="container">
        <div class="page-header">
            <h2>Lorem Ipsum Generator</h2>
        </div>

        <form method='POST' action='/lorem-ipsum'>
            {{ csrf_field() }}
            Total Paragraph (1 to 99): <input type='text' name='totalPara' value='{{ old("totalPara") }}'>
            <input type='submit' value='Generate Lorem Ipsum' class="btn btn-default">
            @if(count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </form>
        <br><br>
        @if(session('paragraphs'))
            <h4>Generated Lorem Ipsum Text:</h4>
            @foreach(unserialize(session('paragraphs')) as $para)
                <p>{{$para}}</p>
            @endforeach
            <br>
        @endif
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
