@extends('layouts.app')
@section('stylesheet')
<style>
.thumbnail{border-radius: 5px;margin:5%;color:#FFF;min-height: 200px; max-width: 100%}
</style>
@endsection
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
                    Results
                </div>
                <div class="card-body">
                    <div class="container">
                        @php
                            $accuracy = ($correctAnswers/$questionAttempted)*100;
                            $correctAnswerMarks = $correctAnswers * 3;
                            $incorrectAnswerMarks = $incorrectAnswers * 1;
                            $marksObtained = $correctAnswerMarks - $incorrectAnswerMarks;
                            $preparedness = ($correctAnswers - $incorrectAnswers/$questionAttempted)*100;
                        @endphp
                        <div class="col-12">
                            <p><b>Question Reviewed : </b> {{$questionReviewed}}</p>
                            <p><b>Question Attempted : </b> {{$questionAttempted}}</p>
                            <p><b>Correct Answers : </b> {{$correctAnswers}}</p>    
                            <p><b>Incorrect Answers : </b> {{$incorrectAnswers}}</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="thumbnail" style="background-color: #48b528; border: 1px solid #48b528;">
                                        <div class="inner-content" style="text-align:center; padding: 20%; ">
                                            <h2><b>{{$marksObtained}}</b></h2>
                                            <div class="caption">
                                                <h3>Marks Obtained</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="thumbnail" style="background-color: #ff5b5a; border: 1px solid #ff5b5a;">
                                        <div class="inner-content" style="text-align:center; padding: 20%; ">
                                            <h2><b>{{number_format($accuracy,2)}}%</b></h2>
                                            <div class="caption">
                                                <h3>Accuracy</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="thumbnail" style="background-color: #46c4ff; border: 1px solid #46c4ff;">
                                        <div class="inner-content" style="text-align:center; padding: 20%; ">
                                            <h2><b>20</b></h2>
                                            <div class="caption">
                                                <h3>Time spent per question attempted (in seconds)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="thumbnail" style="background-color: #ffa022; border: 1px solid #ffa022;">
                                        <div class="inner-content" style="text-align:center; padding: 20%; ">
                                            <h2><b>{{number_format($preparedness,2)}}%</b></h2>
                                            <div class="caption">
                                                <h3>Preparedness</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="col-12">
                            <h3 style="text-align: center;">Share Results</h3>
                            <hr>
                            <div class="btn-block" style="text-align: center;">
                                <a href="javascript:void(0);" class="btn btn-primary">Share On Facebook</a>
                                <a href="javascript:void(0);" class="btn btn-success">Share On Whatsapp</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    
</script>
@endsection