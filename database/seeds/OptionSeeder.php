<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert(array(
		    array(
		       'question_id' => 1,
		       'option' => 'The model is likely to be technical to estimate',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 1,
		       'option' => 'The approach may not be valid if the composite error term is correlated with one or more of the explanatory variables',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 1,
		       'option' => 'The number of parameters to estimate may be large, resulting in a loss of degrees of freedom',
		       'is_correct' => 1,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 1,
		       'option' => 'The fixed effects approach can only capture cross-sectional heterogeneity and not temporal variation in the dependent variable',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 2,
		       'option' => 'Taking the average values of the variables',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 2,
		       'option' => 'Subtracting the mean of each entity away from each observation on that entity',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 2,
		       'option' => 'Estimating a panel data model using least squares dummy variables',
		       'is_correct' => 1,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 2,
		       'option' => 'Using both time dummies and cross-sectional dummies in a fixed effects panel ldap_mod_del(link_identifier, dn, entry)',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 3,
		       'option' => '(i) only',
		       'is_correct' => 1,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 3,
		       'option' => '(i) and (ii) only',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 3,
		       'option' => '(ii) only',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 3,
		       'option' => '(i), (ii), and (iii)',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 4,
		       'option' => 'A seemingly unrelated regression model',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 4,
		       'option' => 'The least squares dummy variables approach',
		       'is_correct' => 1,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 4,
		       'option' => 'The random effects model',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 4,
		       'option' => 'Heteroscedasticity and autocorrelation consistent',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 5,
		       'option' => 'The approach may not be valid if the composite error term is correlated with one or more of the explanatory variables',
		       'is_correct' => 1,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 5,
		       'option' => 'The number of parameters to estimate may be large, resulting in a loss of degrees of freedom',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 5,
		       'option' => 'The random effects approach can only capture cross-sectional heterogeneity and not temporal variation in the dependent variable.',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 5,
		       'option' => 'All of (a) to (c) are potential disadvantages of the random effects approach.',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 6,
		       'option' => 'For random effects models, the use of OLS would result in consistent but inefficient parameter estimation',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 6,
		       'option' => 'If the Hausman test is not satisfied, the random effects model is more appropriate.',
		       'is_correct' => 1,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 6,
		       'option' => 'Random effects estimation involves the construction of "quasi-demeaned" data',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 6,
		       'option' => 'Random effects estimation will not be appropriate if the composite error term is correlated with one or more of the explanatory variables in the model',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 7,
		       'option' => 'There is nothing in the model to ensure that the estimated probabilities lie between zero and one',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 7,
		       'option' => 'Even if the probabilities are truncated at zero and one, there will probably be many observations for which the probability is either exactly zero or exactly one',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 7,
		       'option' => 'The error terms will be heteroscedastic and not normally distributedx',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 7,
		       'option' => 'The model is much harder to estimate than a standard regression model with a continuous dependent variable',
		       'is_correct' => 1,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 8,
		       'option' => 'They use a different method of transforming the model so that the probabilities lie between zero and one',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 8,
		       'option' => 'The logit model can result in too many observations falling at exactly zero or exactly one',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 8,
		       'option' => 'For the logit model, the marginal effect of a change in one of the explanatory variables is simply the estimate of the parameter attached to that variable, whereas this is not the case for the probit model',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 8,
		       'option' => 'The probit model is based on a cumulative logistic function',
		       'is_correct' => 1,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 9,
		       'option' => 'A logit model',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 9,
		       'option' => 'A multinomial logit',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 9,
		       'option' => 'A tobit model',
		       'is_correct' => 1,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 9,
		       'option' => 'An ordered logit model',
		       'is_correct' => 1,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 10,
		       'option' => 'Censored',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 10,
		       'option' => 'Truncated',
		       'is_correct' => 0,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 10,
		       'option' => 'Multinomial variable',
		       'is_correct' => 1,
		       'status' => 1,
		    ),
		    array(
		       'question_id' => 10,
		       'option' => 'Discrete choice',
		       'is_correct' => 1,
		       'status' => 1,
		    ),
		));
    }
}
