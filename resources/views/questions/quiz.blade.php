@extends('layouts.app')
@section('stylesheet')
<style>
    @import('http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.0/css/bootstrap.min.css') 
    .funkyradio div {
      clear: both;
      overflow: hidden;
    }
    .fade {display: none}

    .funkyradio label {
      width: 100%;
      border-radius: 3px;
      border: 1px solid #D1D3D4;
      font-weight: normal;
    }

    .funkyradio input[type="radio"]:empty,
    .funkyradio input[type="checkbox"]:empty {
      display: none;
    }

    .funkyradio input[type="radio"]:empty ~ label,
    .funkyradio input[type="checkbox"]:empty ~ label {
      position: relative;
      line-height: 2.5em;
      text-indent: 3.25em;
      margin-top: 2em;
      cursor: pointer;
      -webkit-user-select: none;
         -moz-user-select: none;
          -ms-user-select: none;
              user-select: none;
    }

    .funkyradio input[type="radio"]:empty ~ label:before,
    .funkyradio input[type="checkbox"]:empty ~ label:before {
      position: absolute;
      display: block;
      top: 0;
      bottom: 0;
      left: 0;
      content: '';
      width: 2.5em;
      background: #D1D3D4;
      border-radius: 3px 0 0 3px;
    }

    .funkyradio input[type="radio"]:hover:not(:checked) ~ label,
    .funkyradio input[type="checkbox"]:hover:not(:checked) ~ label {
      color: #888;
    }

    .funkyradio input[type="radio"]:hover:not(:checked) ~ label:before,
    .funkyradio input[type="checkbox"]:hover:not(:checked) ~ label:before {
      content: '\2714';
      text-indent: .9em;
      color: #C2C2C2;
    }

    .funkyradio input[type="radio"]:checked ~ label,
    .funkyradio input[type="checkbox"]:checked ~ label {
      color: #777;
    }

    .funkyradio input[type="radio"]:checked ~ label:before,
    .funkyradio input[type="checkbox"]:checked ~ label:before {
      content: '\2714';
      text-indent: .9em;
      color: #333;
      background-color: #ccc;
    }

    .funkyradio input[type="radio"]:focus ~ label:before,
    .funkyradio input[type="checkbox"]:focus ~ label:before {
      box-shadow: 0 0 0 3px #999;
    }

    .funkyradio-default input[type="radio"]:checked ~ label:before,
    .funkyradio-default input[type="checkbox"]:checked ~ label:before {
      color: #333;
      background-color: #ccc;
    }

    .funkyradio-primary input[type="radio"]:checked ~ label:before,
    .funkyradio-primary input[type="checkbox"]:checked ~ label:before {
      color: #fff;
      background-color: #337ab7;
    }

    .funkyradio-success input[type="radio"]:checked ~ label:before,
    .funkyradio-success input[type="checkbox"]:checked ~ label:before {
      color: #fff;
      background-color: #5cb85c;
    }

    .funkyradio-danger input[type="radio"]:checked ~ label:before,
    .funkyradio-danger input[type="checkbox"]:checked ~ label:before {
      color: #fff;
      background-color: #d9534f;
    }

    .funkyradio-warning input[type="radio"]:checked ~ label:before,
    .funkyradio-warning input[type="checkbox"]:checked ~ label:before {
      color: #fff;
      background-color: #f0ad4e;
    }

    .funkyradio-info input[type="radio"]:checked ~ label:before,
    .funkyradio-info input[type="checkbox"]:checked ~ label:before {
      color: #fff;
      background-color: #5bc0de;
    }
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
                    Saglus : Muliple Choice Questions (Any Topic)
                </div>
                <form name="online_quiz" id="online_quiz" action="/complete_quiz" method="get">
                    <input type="hidden" name="quiz_attempt_id" value="{{$quizAttemptId}}" id="quiz_attempt_id">
                    <input type="hidden" name="total_question" value="{{$totalQuestions}}" id="total_questions">
                </form>
                <div class="card-body">
                    <div class="col-12">
                        <div class="tab-content" id="myTabContent">
                            <div class="panel panel-primary">
                                @foreach($questionData as $key=>$questions)
                                    <div class="question-tabs tab-pane @if($key == 0) show active @else fade @endif" id="mcq_{{$key}}" role="tabpanel" aria-labelledby="question_{{$key}}">
                                        <div class="panel-heading">
                                            <div class="row"> 
                                                Q. {{$questions->question}}
                                                <input type="hidden" name="question_id" value="{{$questions->id}}" id="questionId_{{$key}}">
                                                @php $userQuizDetailId = ''; @endphp
                                                @foreach($userQuizDatails as $i=>$userQuizQuestions)
                                                    @if($userQuizQuestions->question_id == $questions->id && $quizAttemptId == $userQuizQuestions->quiz_attempt_id)
                                                        @php $userQuizDetailId = $userQuizQuestions->id; @endphp
                                                    @endif
                                                @endforeach
                                                <input type="hidden" name="user_quiz_detail_id[{{$key}}]" value="{{$userQuizDetailId}}" id="user_quiz_detail_id_{{$key}}">
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                                @foreach($options as $i=>$optionContent)
                                                    @if($optionContent->question_id == $questions->id)
                                                    <div class="row">
                                                        <div class="funkyradio">
                                                            <div class="funkyradio-default">
                                                                <input type="radio" name="radio" id="radio_{{$i+1}}" onclick="attemptQuestion(this, '{{$key}}', '{{$questions->id}}', '{{$optionContent->id}}')"/>
                                                                <label for="radio_{{$i+1}}">{{$optionContent->option}}&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="col-12">
                        <div class="btn-block" style="text-align: center;">
                            <a href="javascript:void(0);" onclick="backQuestion(this)" class="btn btn-warning backButton disabled" id="backButton" data-current-question='0'>Back</a>
                            <a href="javascript:void(0);" onclick="markAsReview(this)" class="btn btn-primary markAsReviewButton" id="markAsReview" data-current-question='1'>Mark For Review</a>
                            <a href="javascript:void(0);" onclick="saveNext(this)" class="btn btn-success disabled" id="saveNextButton" data-question-id='' data-option-id='' data-current-question='1'>Save & Next</a>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <div class="col-12">
                        <ul class="nav nav-pills justify-content-center" id="myTab" role="tablist">
                            @foreach($questionData as $key=>$questions)
                                @php 
                                    $attemptedQuestionClass = '';
                                    $titleTooltip = 'UnSeen';  
                                @endphp
                                @foreach($userQuizDatails as $i=>$userQuizQuestions)
                                    @if($userQuizQuestions->question_id == $questions->id && $userQuizQuestions->is_reviewed==0 && $userQuizQuestions->is_attempted==1)
                                        @php 
                                            $attemptedQuestionClass = 'btn-success';
                                            $titleTooltip = 'Attempted';
                                        @endphp
                                    @endif
                                    @if($userQuizQuestions->question_id == $questions->id && $userQuizQuestions->is_reviewed==1 && $userQuizQuestions->is_attempted==0)
                                        @php 
                                            $attemptedQuestionClass = 'btn-primary'; 
                                            $titleTooltip = 'Reviewed';
                                        @endphp
                                    @endif
                                    @if($userQuizQuestions->question_id == $questions->id && $userQuizQuestions->is_reviewed==0 && $userQuizQuestions->is_attempted==0)
                                        @php 
                                            $attemptedQuestionClass = 'btn-danger';
                                            $titleTooltip = 'Unattempted';
                                        @endphp
                                    @endif
                                @endforeach
                                    <li class="nav-item">
                                        <a title="{{$titleTooltip}}" class="nav-link @if($key == 0) active @endif btn @if($attemptedQuestionClass) {{$attemptedQuestionClass}} @else btn-secondary @endif" id="question_number_{{$key}}" data-toggle="tab" href="#mcq_{{$key}}" role="tab" aria-controls="question_number_{{$key}}" aria-selected="true" onclick="selectQuestion('{{$key}}', '{{$questions->id}}')">{{$key+1}}</a>
                                    </li>&nbsp;&nbsp;
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    //selectQuestion(0,)
    function selectQuestion(questionKey, questionId){
        jQuery(".question-tabs").each(function(){
            jQuery(this).css('display', 'none');
            jQuery(this).removeClass('active show');
            jQuery(this).addClass('fade');
        });
        jQuery("#mcq_"+questionKey).css('display', 'block');
        jQuery('#mcq_'+questionKey).addClass('active').removeClass('fade');
        jQuery("#backButton").attr('data-current-question', questionKey);
        if(questionKey!=0){
            jQuery("#backButton").removeClass('disabled');
        } else {
            jQuery("#backButton").addClass('disabled');
        }
        jQuery('#markAsReview').attr('data-current-question', parseInt(questionKey)+parseInt(1));
        jQuery('#saveNextButton').attr('data-current-question', parseInt(questionKey));
        jQuery("#saveNextButton").addClass('disabled');

        var quizAttemptId = jQuery("#quiz_attempt_id").val();
        var userQuizDetailId = jQuery("#user_quiz_detail_id_"+questionKey).val();

        jQuery.ajax({
            url: "/un_attempted",
            type: 'GET',
            dataType: "json",
            data: {'question_id': questionId, 'quiz_attempt_id': quizAttemptId, 'user_quiz_detail_id': userQuizDetailId},
            success: function(data) {
                //console.log(data); return false;
                if(data.status == 'success'){
                    jQuery("#question_number_"+questionKey).removeClass('btn-secondary');
                    jQuery("#question_number_"+questionKey).addClass('btn-danger');
                    jQuery("#user_quiz_detail_id_"+questionKey).val(data.lastId);
                }                
            },
            error: function(e) {
                //called when there is an error
                console.log(e.message);
            }
        });
    }

    function backQuestion(obj){
        var questionKey = jQuery(".backButton").attr('data-current-question');
        //jQuery('#markAsReview').attr('data-current-question', parseInt(questionKey)+parseInt(1));
        if(questionKey==0){
            jQuery(obj).addClass('disabled');
        } else {
            var newQuestionKey = questionKey - 1;
            if(newQuestionKey==0){
                jQuery(obj).addClass('disabled');
            } else { 
                jQuery(obj).removeClass('disabled');
            }
            jQuery('.nav-item').each(function(){
                jQuery(this).removeClass('active');
                jQuery(this).children().removeClass('active');
            });
            jQuery('#question_number_'+newQuestionKey).addClass('active');
            jQuery(obj).attr('data-current-question', newQuestionKey);
            selectQuestion(newQuestionKey);
        }
    }

    function markAsReview(obj){
        var questionKey = jQuery(obj).attr('data-current-question');
        questionKey = questionKey - 1;
        var quizAttemptId = jQuery("#quiz_attempt_id").val();
        var userQuizDetailId = jQuery("#user_quiz_detail_id_"+questionKey).val();
        var questionId = jQuery("#questionId_"+questionKey).val();
        //alert(userQuizDetailId);
        jQuery.ajax({
            url: "/mark_as_review",
            type: 'GET',
            dataType: "json",
            data: {'quiz_attempt_id': quizAttemptId, 'question_id': questionId, 'user_quiz_detail_id': userQuizDetailId},
            success: function(data) {
                if(data.status == 'success'){
                    alert('hiii');
                    jQuery("#question_number_"+questionKey).removeClass('btn-secondary');
                    jQuery("#question_number_"+questionKey).removeClass('btn-danger');
                    jQuery("#question_number_"+questionKey).addClass('btn-primary');
                    jQuery("#user_quiz_detail_id_"+questionKey).val(data.lastId);
                }                
            },
            error: function(e) {
                //called when there is an error
                console.log(e.message);
            }
        });
    }

    function attemptQuestion(obj, questionKey, questionId, optionId){
        jQuery("#saveNextButton").removeClass("disabled");
        jQuery("#saveNextButton").attr("data-question-id", questionId);
        jQuery("#saveNextButton").attr("data-option-id", optionId);
        //jQuery("#saveNextButton").attr("data-current-question", questionKey);
    }

    function saveNext(obj){
        var questionId = jQuery(obj).attr('data-question-id');
        var optionId = jQuery(obj).attr('data-option-id');
        var quizAttemptId = jQuery("#quiz_attempt_id").val();
        var questionKey = jQuery(obj).attr('data-current-question');
        var userQuizDetailId = jQuery("#user_quiz_detail_id_"+questionKey).val();

        jQuery.ajax({
            url: "/save_next",
            type: 'GET',
            dataType: "json",
            data: {'question_id': questionId, 'option_id': optionId, 'quiz_attempt_id': quizAttemptId, 'user_quiz_detail_id': userQuizDetailId},
            success: function(data) {
                //console.log(data); return false;
                if(data.status == 'success'){
                    jQuery("#question_number_"+questionKey).removeClass('btn-secondary');
                    jQuery("#question_number_"+questionKey).removeClass('btn-danger');
                    jQuery("#question_number_"+questionKey).addClass('btn-success');
                    jQuery("#user_quiz_detail_id_"+questionKey).val(data.lastId);
                }                
            },
            error: function(e) {
                //called when there is an error
                console.log(e.message);
            }
        });
    }


    // 10 minutes from now
    var time_in_minutes = 3;
    var current_time = Date.parse('{{$endTime}}');
    var deadline = new Date(current_time + time_in_minutes*60*1000);
    function time_remaining(endtime){
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor( (t/1000) % 60 );
        var minutes = Math.floor( (t/1000/60) % 60 );
        var hours = Math.floor( (t/(1000*60*60)) % 24 );
        var days = Math.floor( t/(1000*60*60*24) );
        if(t==0){
            //submitQuiz();
        }
        return {'total':t, 'days':days, 'hours':hours, 'minutes':minutes, 'seconds':seconds};
    }
    function run_clock(id,endtime){
        var clock = document.getElementById(id);
        function update_clock(){
            var t = time_remaining(endtime);
            clock.innerHTML = '<button disabled="disabled" class="btn btn-primary">'+t.minutes+' : '+t.seconds+'</button>';
            if(t.total<=0){ clearInterval(timeinterval); }
        }
        update_clock(); // run function once at first to avoid delay
        var timeinterval = setInterval(update_clock,1000);
    }
    run_clock('clockdiv',deadline);

    submitQuiz();
    function submitQuiz(){
        jQuery('#online_quiz').submit();
        /*var totalQuestions = jQuery("#total_questions").val();
        var quizAttemptId = jQuery("#quiz_attempt_id").val();
        jQuery.ajax({
            url: "/complete_quiz",
            type: 'GET',
            dataType: "json",
            data: {'total_question': totalQuestions, 'quiz_attempt_id': quizAttemptId},
            success: function(data) {
                //console.log(data); return false;
                if(data.status == 'success'){
                    jQuery("#question_number_"+questionKey).removeClass('btn-secondary');
                    jQuery("#question_number_"+questionKey).addClass('btn-danger');
                    jQuery("#user_quiz_detail_id_"+questionKey).val(data.lastId);
                }                
            },
            error: function(e) {
                //called when there is an error
                console.log(e.message);
            }
        });*/
    }
</script>
@endsection