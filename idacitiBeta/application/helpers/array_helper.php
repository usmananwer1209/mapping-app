<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function array_term_rules($term_rules)
{

	$term_rules_new = array();

	foreach($term_rules as $t_r)
	{

		$t_r['decisionCategory'] = explode(":", $t_r['decisionCategory'])[1];

		$t_r['financialCategory'] = explode(":", $t_r['financialCategory'])[1];

		$term_rules_new[] = $t_r;	

	}

	return $term_rules_new;

} 

function array_sorting_asc($term_rules)
{

	function arr_sort_flat($a, $b)
	{
		if ($a['name']==$b['name']) return 0;
	   
	   	return ($a['name']<$b['name'])?-1:1;
	}

	usort($term_rules,"arr_sort_flat");

	return $term_rules;

}  

function array_sorting_decision_asc($term_rules)
{

	function arr_sort_decision($a, $b)
	{
		if ($a['decisionCategory']==$b['decisionCategory']) return 0;
	   
	   	return ($a['decisionCategory']<$b['decisionCategory'])?-1:1;
	}

	usort($term_rules,"arr_sort_decision");

	$term_rules_arr = array();

	$term_rules_new = array();

	$checkDecisionCategory = $term_rules[0]['decisionCategory'];	

	function arr_sort_name($a, $b)
	{
		if ($a['name']==$b['name']) return 0;
	   
	   	return ($a['name']<$b['name'])?-1:1;
	}

	foreach($term_rules as $t_r)
	{

		$decisionCategory = $t_r['decisionCategory'];

		if($checkDecisionCategory == $decisionCategory)	
		{

			$term_rules_arr[] = $t_r;	

		}
		else
		{

			$checkDecisionCategory = $t_r['decisionCategory'];

			usort($term_rules_arr,"arr_sort_name");

			$term_rules_new[] = $term_rules_arr;	

			$term_rules_arr = array();

			$term_rules_arr[] = $t_r;

		}	

	}	

	return $term_rules_new;

}  

function array_sorting_financial_asc($term_rules)
{

	function arr_sort_financial($a, $b)
	{
		if ($a['financialCategory']==$b['financialCategory']) return 0;
	   
	   	return ($a['financialCategory']<$b['financialCategory'])?-1:1;
	}

	usort($term_rules,"arr_sort_financial");

	$term_rules_arr = array();

	$term_rules_new = array();

	$checkDecisionCategory = $term_rules[0]['financialCategory'];	

	function arr_sort_name2($a, $b)
	{
		if ($a['name']==$b['name']) return 0;
	   
	   	return ($a['name']<$b['name'])?-1:1;
	}

	foreach($term_rules as $t_r)
	{

		$decisionCategory = $t_r['financialCategory'];

		if($checkDecisionCategory == $decisionCategory)	
		{

			$term_rules_arr[] = $t_r;	

		}
		else
		{

			$checkDecisionCategory = $t_r['financialCategory'];

			usort($term_rules_arr,"arr_sort_name");

			$term_rules_new[] = $term_rules_arr;	

			$term_rules_arr = array();

			$term_rules_arr[] = $t_r;

		}	

	}	

	return $term_rules_new;

}  