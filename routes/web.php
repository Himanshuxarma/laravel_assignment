<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/question', 'QuizController@index')->name('question');
Route::get('/quiz', 'QuizController@quiz')->name('quiz');
Route::get('/un_attempted', 'QuizController@unAttempted')->name('un-attempted');
Route::get('/mark_as_review', 'QuizController@markAsReview')->name('mark-as-review');
Route::get('/save_next', 'QuizController@saveNext')->name('save-next');
Route::get('/complete_quiz', 'QuizController@completeQuiz')->name('complete-quiz');
Route::get('/results', 'QuizController@results')->name('results');
