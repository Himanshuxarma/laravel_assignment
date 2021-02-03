<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Option;
use App\Models\UserQuizDetails;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the Quiz Start button.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('questions.index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function quiz(Request $request){
        $loggdUserId = auth()->user()->id;
        if($loggdUserId){
            if($request->session()->has('quizAttemptId')){
                $quizAttemptId = $request->session()->get('quizAttemptId');
            } else {
                //die('aaya idher');
                $quizAttempts = new \App\Models\QuizAttempt();  
                $quizAttempts->user_id = auth()->user()->id; 
                $quizAttempts->status = 1;   
                $quizAttempts->save();
                $quizAttemptId = $quizAttempts->id;
                $request->session()->put('quizAttemptId', $quizAttemptId);
            }
            if($request->session()->has('startTime')){
                $endTime = $request->session()->get('startTime');
            } else {
                $date = date('Y-m-d H:i:s');
                $endTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('D M d yy h:i:s');
                $request->session()->put('startTime', $endTime);
            }
            //echo $endTime; die; 
            $questionData = Question::all();
            $totalQuestions = count($questionData);
            $options = Option::all();
            $userQuizDatails = UserQuizDetails::where('user_id', $loggdUserId)->where('quiz_attempt_id', $quizAttemptId)->get();
            return view('quiz.index', compact('totalQuestions', 'questionData', 'options', 'endTime', 'quizAttemptId', 'userQuizDatails'));
        } else {
            Auth::logout();
        }
    }

    /**
     * function to mark the question unattempted.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function unAttempted(Request $request){
        //dd($request);
        if($request->input('quiz_attempt_id')){
            $quizAttemptId = $request->input('quiz_attempt_id');
            $questionId = $request->input('question_id');
            $userQuizDetailId = $request->input('user_quiz_detail_id');
            $userQuizDetails = UserQuizDetails::find($userQuizDetailId);
            if(empty($userQuizDetails)){
                $userQuizDetails = new UserQuizDetails();  
            }
            $userQuizDetails->user_id = auth()->user()->id; 
            $userQuizDetails->question_id = $questionId; 
            $userQuizDetails->quiz_attempt_id = $quizAttemptId;
            $userQuizDetails->status = 1;   
            $userQuizDetails->save();
            $lastUserQuizDetailId = $userQuizDetails->id;
            echo json_encode(['status'=>'success', 'lastId'=>$lastUserQuizDetailId]); exit;
        } else {
            echo json_encode(['status'=>'failed']);
        }
        exit;
    }

    /**
     * function to mark the question reviewed.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function markAsReview(Request $request){
        //dd($request);
        if($request->input('quiz_attempt_id')){
            $quizAttemptId = $request->input('quiz_attempt_id');
            $questionId = $request->input('question_id');
            $userQuizDetailId = $request->input('user_quiz_detail_id');
            $userQuizDetails = UserQuizDetails::find($userQuizDetailId);
            if(empty($userQuizDetails)){
                $userQuizDetails = new UserQuizDetails();  
            }
            $userQuizDetails->user_id = auth()->user()->id; 
            $userQuizDetails->question_id = $questionId; 
            $userQuizDetails->quiz_attempt_id = $quizAttemptId;
            $userQuizDetails->is_reviewed = 1;
            $userQuizDetails->status = 1;   
            $userQuizDetails->save();
            $lastUserQuizDetailId = $userQuizDetails->id;
            echo json_encode(['status'=>'success', 'lastId'=>$lastUserQuizDetailId]); exit;
        } else {
            echo json_encode(['status'=>'failed']);
        }
        exit;
    }

    /**
     * function to save the current attempted question's details and move control to the next question.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveNext(Request $request){
        //dd($request);
        if($request->input('quiz_attempt_id')){
            $quizAttemptId = $request->input('quiz_attempt_id');
            $questionId = $request->input('question_id');
            $optionId = $request->input('option_id');
            $userQuizDetailId = $request->input('user_quiz_detail_id');

            /* Check user's selected option is correct or not */
            $optionDetails = Option::where('question_id', $questionId)
                                ->where('id', $optionId)
                                ->where('is_correct', 1)
                                ->first();
            $userQuizDetails = UserQuizDetails::find($userQuizDetailId);
            if(empty($userQuizDetails)){
                $userQuizDetails = new UserQuizDetails();  
            }
            $userQuizDetails->user_id = auth()->user()->id; 
            $userQuizDetails->question_id = $questionId; 
            $userQuizDetails->quiz_attempt_id = $quizAttemptId;
            $userQuizDetails->is_attempted = 1;   
            $userQuizDetails->is_correct = !empty($optionDetails) ? 1 : 0;   
            $userQuizDetails->status = 1;
            $userQuizDetails->save();
            $lastUserQuizDetailId = $userQuizDetails->id;
            echo json_encode(['status'=>'success', 'lastId'=>$lastUserQuizDetailId]); exit;
        } else {
            echo json_encode(['status'=>'failed']);
        }
        exit;
    }

    /**
     * function to submit the quiz.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function completeQuiz(Request $request){
        if($request->input('quiz_attempt_id')){
            $quizAttemptId = $request->input('quiz_attempt_id');
            $totalQuestions = $request->input('total_question');
            return redirect()->route('results', ['quiz_id'=>base64_encode($quizAttemptId), 'questions'=>base64_encode($totalQuestions)]);            
        } else {
            Auth::logout();
        }
    }

    /**
     * function to check results of the quiz.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function results(Request $request){
        if($request->input('quiz_id')){
            $quizAttemptId = base64_decode($request->input('quiz_id'));
            $totalQuestions = base64_decode($request->input('questions'));
            $loggdUserId = auth()->user()->id;
            /* Check user's selected option is correct or not */
            $userQuizData = UserQuizDetails::where('quiz_attempt_id', $quizAttemptId)
                                ->where('user_id', $loggdUserId)
                                ->get();
            $questionReviewed = 0;
            $questionAttempted = 0;
            $correctAnswers = 0;
            $incorrectAnswers = 0;
            foreach($userQuizData as $quizDetails){
                if($quizDetails['is_attempted']==1){
                    $questionAttempted++;
                    if($quizDetails['is_correct']==1 ){
                        $correctAnswers++;
                    } else {
                        $incorrectAnswers++;
                    }
                }
                if($quizDetails['is_reviewed']==1){
                    $questionReviewed++;
                }
            }
            $reviewPerct = ($questionReviewed/$totalQuestions)*100;
            $attemptedPerct = ($questionAttempted/$totalQuestions)*100;
            $correctPerct = ($correctAnswers/$totalQuestions)*100;
            $incorrectPerct = ($incorrectAnswers/$totalQuestions)*100;
            return view('quiz.results', compact('questionReviewed', 'questionAttempted', 'correctAnswers', 'incorrectAnswers', 'reviewPerct', 'attemptedPerct', 'correctPerct', 'incorrectPerct'));       
        } else {
            Auth::logout();
        }
    }


}
