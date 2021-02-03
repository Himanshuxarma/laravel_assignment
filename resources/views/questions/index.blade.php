@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 bg-light text-right">
            <div id="clockdiv"></div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Once you start the quiz, your timer will initiate.
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <a href="{{route('quiz')}}" class="btn btn-primary">Start Quiz</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection