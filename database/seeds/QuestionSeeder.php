<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('questions')->insert(array(
    	    array(
		       'question' => 'Which of the following is a disadvantage of the fixed effects approach to estimating a panel model?',
		       'status' => 1,
		    ),
		    array(
		       'question' => 'The "within transform" involves',
		       'status' => 1,
		    ),
		    array(
		       'question' => 'Which of the following are advantages of the use of panel data over pure cross-sectional or pure time-series modelling?
			       	(i) The use of panel data can increase the number of degrees of freedom and therefore the power of tests

					(ii) The use of panel data allows the average value of the dependent variable to vary either cross-sectionally or over time or both

					(iii) The use of panel data enables the researcher allows the estimated relationship between the independent and dependent variables to vary either cross-sectionally or over time or both',
		       'status' => 1,
		    ),
		    array(
		       'question' => 'The fixed effects panel model is also sometimes known as',
		       'status' => 1,
		    ),
		    array(
		       'question' => 'Which of the following is a disadvantage of the random effects approach to estimating a panel model?',
		       'status' => 1,
		    ),
		    array(
		       'question' => 'In order to determine whether to use a fixed effects or random effects model, a researcher conducts a Hausman test. Which of the following statements is false?',
		       'status' => 1,
		    ),
		    array(
		       'question' => 'Which of the following statements is false concerning the linear probability model?',
		       'status' => 1,
		    ),
		    array(
		       'question' => 'Which of the following is correct concerning logit and probit models?',
		       'status' => 1,
		    ),
		    array(
		       'question' => 'Suppose that we wished to evaluate the factors that affected the probability that an investor would choose an equity fund rather than a bond fund or a cash investment. Which class of model would be most appropriate?',
		       'status' => 1,
		    ),
		    array(
		       'question' => 'A dependent variable whose values are not observable outside a certain range but where the corresponding values of the independent variables are still available would be most accurately described as what kind of variable?',
		       'status' => 1,
		    ),
		));
    }
}
