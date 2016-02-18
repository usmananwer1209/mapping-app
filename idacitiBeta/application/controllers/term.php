<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

$folder = dirname(dirname(__FILE__));

require_once "abstract_controller.php";

class Term extends abstract_controller {

    public function __construct() {

        parent::__construct();

        $this->load->model('term_model');

        $this->load->model('term_rule_type_model', 'type');

        $this->load->model('term_rule_source_model', 'source'); 

        $this->load->model('term_rule_decision_model', 'decision');

        $this->load->model('term_rule_financial_model', 'financial');   

        $this->load->model('companies_model', 'company');                               

        $this->load->helper('array');

    }

    public function index() {


        $this->benchmark->mark('Home:index_start');

        $current = '/home/';
        
        $data = $this -> security($current);

        if ($data && !empty($data)) {

            $this->benchmark->mark('Home:index load_model_start');

            $this->benchmark->mark('Home:index load_model_end');
            log_message('debug', "load home model " . $this->benchmark->elapsed_time('Home:index load_model_start', 'Home:index load_model_end'));
     
            $data['sector_industry'] = $this->company->get_sector_industry();

            // echo "<pre>";

            // print_r($industry_sector);

            // exit;

            $url = 'http://data.idaciti.com:81/api/termRule/filter/json?token=gK-!dU&criteria=SecXbrl';

            $term_rules = $this->term_model->curl_responce($url);

            if(isset($term_rules) && count($term_rules) > 0)
            {    

                $term_rules = array_term_rules($term_rules);

                $data['term_rules_flat'] = array_sorting_asc($term_rules);

                $data['term_rules_decision'] = array_sorting_decision_asc($term_rules);

                $data['term_rules_fanancial'] = array_sorting_financial_asc($term_rules);                        

                $data['term_rules'] = 1;

            }
            else
            {

                $data['term_rules'] = 0;

            }    

            $this->load->view('general/header', $data);
            $this->load->view('term/term', $data);
            $this->load->view('general/footer');
        
        }else

            redirect('login');

        $this->benchmark->mark('Home:index_end');

        log_message('debug', "load home took " . $this->benchmark->elapsed_time('Home:index_start', 'Home:index_end'));
    }

    public function term_Rule()
    {

        // Get source, type, decision category and financial category from database 

        $term_rule_source = $this->source->get_source();

        $term_rule_type = $this->type->get_type();

        $decision = $this->decision->get_decision();  
        
        $financial = $this->financial->get_financial();

        // Get specific term rule through APi

        $term_id = $this->input->post('term_id');

        $url = 'http://data.idaciti.com:81/api/termRule/expressions/json?token=gK-!dU&termId='.$term_id.'';

        $term_rule = $this->term_model->curl_responce($url);  

        $term_rule_expressions = $term_rule['expressions'];

        // Get coverage information for a specific term through API

        $url = 'http://data.idaciti.com:81/api/termRule/coverage/json?token=gK-!dU&termId='.$term_id.'';

        $term_rule_coverge = $this->term_model->curl_responce($url);         

        $totalEntityCount = $term_rule_coverge['totalEntityCount'];

        $mappedEntityCount = $term_rule_coverge['mappedEntityCount'];

        $unMappedEntityCount = $term_rule_coverge['unMappedEntityCount'];

        $coverageByRanks = $term_rule_coverge['coverageByRanks'];

        $coverageByRankArr = array();

        $coverageByRanksArr = array();        

        foreach($coverageByRanks as $c_b_r) {
    
            $coverageByRankArr['mappedEntityCount'] = $c_b_r['mappedEntityCount'];
            
            $coverageByRankArr['rank'] = $c_b_r['rank'];

            $coverageByRanksArr[] = $coverageByRankArr;       

        }

        $term_rule_coverge_div = array(
            
            'totalEntityCount' => $totalEntityCount,
            'mappedEntityCount' => $mappedEntityCount,
            'unMappedEntityCount' => $unMappedEntityCount,
            'coverageByRanks' => $coverageByRanksArr,
        
        );

        $term_rule_div =    "<div class='col-md-6 col-sm-12 row itacidi-new-right-panel-section-4'>
                            <form class='itacidi-custom-form'>
                                <div class='form-group'>
                                    <label for='' class='col-md-3 control-label'>Term Name:</label>
                                    <div class='col-md-9'>
                                        <input type='text' value='".$term_rule['name']."' class='form-control' name='term_name' placeholder='Term Name'>
                                    </div>  
                                </div>
                                <div class='form-group'>
                                    <label for='' class='col-md-3 control-label'>Term Code:</label>
                                    <div class='col-md-9'>
                                        <input type='text' value='".$term_rule['_id']."' class='form-control' name='term_code' placeholder='Term Code' readonly>
                                    </div>  
                                </div>
                                <div class='form-group'>
                                    <label for='' class='col-md-3 control-label'>Definition:</label>
                                    <div class='col-md-9'>
                                        <textarea class='form-control custom-textarea-1' rows='1' name='term_description' >".$term_rule['description']."</textarea>
                                    </div>  
                                </div>  
                                <div class='form-group custom-form-group'>
                                    <label for='' class='col-md-3 control-label'>Decision Category:</label>
                                    <div class='col-md-9'>
                                        <select class='form-control custom-form-control' name='decision_category'>";
                       
                                            foreach($decision as $dec)
                                            {    
                                                if($dec['name'] == $term_rule['decisionCategory_1'] && $dec['sub_category_name'] == $term_rule['decisionCategory_2'])
                                                {    
                                                    $term_rule_div .= "<option value='' selected='selected'>".$dec['name']."->".$dec['sub_category_name']."</option>";
                                                }
                                                else
                                                {
                                                    $term_rule_div .= "<option value='' >".$dec['name']."->".$dec['sub_category_name']."</option>";
                                                }    
                                            }
                       
                       $term_rule_div .=    "</select>
                                    </div>  
                                </div>  
                                <div class='form-group custom-form-group'>
                                    <label for='' class='col-md-3 control-label'>Financial Statement:</label>
                                    <div class='col-md-9'>
                                        <select class='form-control custom-form-control' name='financial_category'>";
                       
                                            foreach($financial as $dec)
                                            {    
                                                if($dec['name'] == $term_rule['financialCategory_1'] && $dec['sub_category_name'] == $term_rule['financialCategory_2'])
                                                {    
                                                    $term_rule_div .= "<option value='' selected='selected'>".$dec['name']."->".$dec['sub_category_name']."</option>";
                                                }
                                                else
                                                {
                                                    $term_rule_div .= "<option value='' >".$dec['name']."->".$dec['sub_category_name']."</option>";
                                                }    
                                            }
                       
                       $term_rule_div .=    "</select>
                                    </div>  
                                </div>  
                                <div class='form-group custom-form-group'>
                                    <label for='' class='col-md-3 control-label'>Period Type:</label>
                                    <div class='col-md-4'>
                                        <select class='form-control custom-form-control' name='period_type' >";

                                        if($term_rule['periodType'] == 'instant')
                                        {
                                            $term_rule_div .= "<option value='instant' selected='selected'>instant</option>
                                            <option value='duration'>duration</option>
                                            <option value='na'>na</option>";
                                        }
                                        else if($term_rule['periodType'] == 'duration')
                                        {
                                            $term_rule_div .= "<option value='instant'>instant</option>
                                            <option value='duration' selected='selected'>duration</option>
                                            <option value='na'>na</option>";
                                        } 
                                        else if($term_rule['periodType'] == 'na')
                                        {
                                            $term_rule_div .= "<option value='instant'>instant</option>
                                            <option value='duration'>duration</option>
                                            <option value='na' selected='selected'>na</option>";
                                        }    

                                        
                   $term_rule_div .=    "</select>
                                    </div>  
                                    <label for='' class='col-md-1 control-label' style='padding-top:2px;'>Type:</label>
                                    <div class='col-md-4'>
                                        <select class='form-control custom-form-control' name='term_name' >";
                                           
                                            foreach($term_rule_type as $t_r_t)
                                            {   
                                                if($term_rule['type'] == $t_r_t['name'])
                                                {                                            
                                                    $term_rule_div .= "<option value='".$t_r_t['id']."' selected='selected' >".$t_r_t['name']."</option>";
                                                }
                                                else
                                                {
                                                    $term_rule_div .= "<option value='".$t_r_t['id']."'  >".$t_r_t['name']."</option>";
                                                }    
                                            }    

               $term_rule_div .=        "</select>
                                    </div>  
                                </div>
                                <div class='form-group custom-form-group'>
                                    <label for='' class='col-md-3 control-label'>Source:</label>
                                    <div class='col-md-9'>
                                        <select class='form-control custom-form-control' name='term_source' >";
                                           
                                            foreach($term_rule_source as $t_r_s)
                                            {   
                                                if($term_rule['source'] == $t_r_s['name'])
                                                {                                            
                                                    $term_rule_div .= "<option value='".$t_r_s['id']."' selected='selected' >".$t_r_s['name']."</option>";
                                                }
                                                else
                                                {
                                                    $term_rule_div .= "<option value='".$t_r_s['id']."'  >".$t_r_s['name']."</option>";
                                                }    
                                            }   

               $term_rule_div .=        "</select>
                                    </div>  
                                </div>  
                                <div class='form-group custom-form-group'>
                                    <label for='' class='col-md-3  control-label'>Order:</label>
                                    <div class='col-md-5'>
                                        <input type='text' value='".$term_rule['order']."' class='form-control' name='term_order' placeholder='order'>
                                    </div>  
                                    <div class='col-md-4'>
                                        <div class='checkbox' style='padding-top:5px;'>";

                                        if($term_rule['visibleToUI'] == true)
                                        {
                                            $term_rule_div .=   "<input type='checkbox' id='custom-group1' name='visible_UI' value='true' checked >";
                                        }
                                        else
                                        {
                                            $term_rule_div .=   "<input type='checkbox' id='custom-group1' name='optionyes' value='group1'>";
                                        }    
                                            
                       $term_rule_div .=    "<label for='custom-group1' style='white-space:nowrap;'>Visiable to UI?</label>   
                                        </div>
                                    </div>  
                                </div>  
                            </form> 
                        </div>";    

$term_rule_expression_div =    "<div class='row table-section'>
                                <div class='table-responsive'>
                                    <table class='table table-bordered table-striped table-hover'> 
                                        <thead> 
                                            <tr> 
                                                <th>Rank</th> 
                                                <th>Type</th> 
                                                <th>Experssion</th> 
                                                <th></th> 
                                            </tr> 
                                        </thead> 
                                        <tbody>"; 

                                        foreach($term_rule_expressions as $t_r_e)
                                        {  

            $term_rule_expression_div .=    "<tr> 
                                                <td>".$t_r_e['rank']."</td>
                                                <td class='table-text'>".$t_r_e['termExpressionTypeCode'][0]."</td> 
                                                <td>".$t_r_e['expression']."</td>
                                                <td>
                                                    <a class='' href='' >
                                                        <i class='glyphicon glyphicon-pencil'></i>
                                                    </a>
                                                    <a class='' href='' >
                                                        <i class='glyphicon glyphicon-remove'></i>
                                                    </a>
                                                </td>
                                            </tr>"; 
                                        }    
    
        $term_rule_expression_div .=    "</tbody> 
                                    </table>        
                                </div>  
                            </div>";

        header('Content-Type: application/json');                      

        echo json_encode(array('term_rule_div' => $term_rule_div, 'term_rule_expression_div' => $term_rule_expression_div, 'term_rule_coverge_div' => $term_rule_coverge_div));                       

    }  

    public function sic_and_companies()
    {

        $sic = $this->company->get_sic($this->input->post('industry'));        

        $sic_options = "<option value=''>All</option>";

        foreach ($sic as $s) {

            $sic_options .= "<option value='".$s['sic_code']."->".$s['sic']."'>".$s['sic_code']."->".$s['sic']."</option>";

        }

        $industry_companies = $this->company->get_companies($this->input->post('industry')); 

        header('Content-Type: application/json');                      

        echo json_encode(array('sic' => $sic_options, 'industry_companies' => count($industry_companies)));                               

    }

    public function sic_companies()
    {

        $sic_companies = $this->company->get_companies_from_sic($this->input->post('sic')); 

        header('Content-Type: application/json');                      

        echo json_encode(array('sic_companies' => count($sic_companies)));                               

    }

    public function get_coverage()
    {

        function myUrlEncode($string) {

            $entities = array('+', '%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D', ',');
            $replacements = array('%20' ,'!', '*', "'", "(", ")", ";", ":", "@", "&amp;", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]", "%2C");
            return str_replace($entities, $replacements, urlencode($string));

        }        

        $term_id = trim($this->input->post('term_id')); 

        if(strpos($this->input->post('sector'), '&') == true)
        {

            $sector = trim(myUrlEncode('"'.$this->input->post('sector').'"'));
        }
        else
        {   

            $sector = trim(myUrlEncode($this->input->post('sector')));
        
        } 

        if(strpos($this->input->post('industry'), '&') == true)
        {

            $industry = trim(myUrlEncode('"'.$this->input->post('industry').'"'));
        }
        else
        {   

            $industry = trim(myUrlEncode($this->input->post('industry')));
        
        }    

        $sic_code = trim($this->input->post('sic_code'));                

        $url = 'http://data.idaciti.com:81/api/termRule/coverage/json?token=gK-!dU&termId='.$term_id.'&sector='.$sector.'&industry='.$industry.'&sicCode='.$sic_code;

        $term_rule_coverge = $this->term_model->curl_responce($url);         

        $totalEntityCount = $term_rule_coverge['totalEntityCount'];

        $mappedEntityCount = $term_rule_coverge['mappedEntityCount'];

        $unMappedEntityCount = $term_rule_coverge['unMappedEntityCount'];

        $coverageByRanks = $term_rule_coverge['coverageByRanks'];

        $coverageByRankArr = array();

        $coverageByRanksArr = array();        

        foreach($coverageByRanks as $c_b_r) {
    
            $coverageByRankArr['mappedEntityCount'] = $c_b_r['mappedEntityCount'];
            
            $coverageByRankArr['rank'] = $c_b_r['rank'];

            $coverageByRanksArr[] = $coverageByRankArr;       

        }

        $term_rule_coverge_div = array(
            
            'totalEntityCount' => $totalEntityCount,
            'mappedEntityCount' => $mappedEntityCount,
            'unMappedEntityCount' => $unMappedEntityCount,
            'coverageByRanks' => $coverageByRanksArr,
        
        );

        header('Content-Type: application/json');                      

        echo json_encode(array('term_rule_coverge_div' => $term_rule_coverge_div));                       

    }       

    public function company_resolved()
    {

        function myUrlEncode($string) {

            $entities = array('+', '%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D', ',');
            $replacements = array('%20' ,'!', '*', "'", "(", ")", ";", ":", "@", "&amp;", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]", "%2C");
            return str_replace($entities, $replacements, urlencode($string));

        }        

        $term_id = trim($this->input->post('term_id')); 

        if(strpos($this->input->post('sector'), '&') == true)
        {

            $sector = trim(myUrlEncode('"'.$this->input->post('sector').'"'));
        }
        else
        {   

            $sector = trim(myUrlEncode($this->input->post('sector')));
        
        } 

        if(strpos($this->input->post('industry'), '&') == true)
        {

            $industry = trim(myUrlEncode('"'.$this->input->post('industry').'"'));
        }
        else
        {   

            $industry = trim(myUrlEncode($this->input->post('industry')));
        
        }    

        $sic_code = trim($this->input->post('sic_code'));                

        $url = 'http://data.idaciti.com:81/api/termRule/coverage/json?token=gK-!dU&termId='.$term_id;

        if($sector != '')
        {
            $url .= '&sector='.$sector.'&industry='.$industry;
        }

        if($sic_code != '')
        {
            $url .= '&sicCode='.$sic_code;            
        }     

        $term_rule_coverge = $this->term_model->curl_responce($url);         

        $coverageByRanks = $term_rule_coverge['coverageByRanks'];

        $coverageByRankArr = array();

        $coverageByRanksArr = array();        

        foreach($coverageByRanks as $c_b_r) {
    
            $coverageByRankArr['mappedEntityIDs'] = $c_b_r['mappedEntityIDs'];
            
            $coverageByRankArr['rank'] = $c_b_r['rank'];

            $coverageByRanksArr[] = $coverageByRankArr;       

        }

        $entityIds = array();

        $ranks = array();

        foreach($coverageByRanksArr as $c_b_r_a)
        {

            for($a = 0; $a < count($c_b_r_a['mappedEntityIDs']); $a++)
            {

                if($this->input->post('rank') != '' && $this->input->post('rank') != $c_b_r_a['rank'])
                {
                    break;
                }    

                if(in_array($c_b_r_a['mappedEntityIDs'][$a], $entityIds))
                {
                    $ranks[$c_b_r_a['mappedEntityIDs'][$a]] = $ranks[$c_b_r_a['mappedEntityIDs'][$a]].",".$c_b_r_a['rank'];
                }
                else   
                {  
                    $entityIds[$c_b_r_a['mappedEntityIDs'][$a]] = $c_b_r_a['mappedEntityIDs'][$a];

                    $ranks[$c_b_r_a['mappedEntityIDs'][$a]] = $c_b_r_a['rank'];
                }    
                    
            }    

        }    

        if(count($entityIds) > 0)
        {    
    
            $companies = $this->company->get_companies_by_entity_id($entityIds);
        }
        else
        {
            $companies = array();
        }    

        $companies_table = "    <thead> 
                                    <tr> 
                                        <th>CIK</th> 
                                        <th>Name</th> 
                                        <th>Rank</th> 
                                        <th></th> 
                                    </tr> 
                                </thead> 
                                <tbody> ";
        if(count($companies) > 0)
        {     
                                    
            foreach ($companies as $comp) {
            
                $companies_table .= "<tr> 
                        <td>".$comp['cik']."</td>
                        <td>".$comp['company_name']."</td> 
                        <td>".$ranks[str_pad($comp['entity_id'], 6, "0", STR_PAD_LEFT)]."</td> 
                        <td>    
                            <a href='".URL."term/termResult/".$term_id."/".str_pad($comp['entity_id'], 6, "0", STR_PAD_LEFT)."' >Views</a>
                        </td>
                    </tr>";

            }

        }
        else
        {

            $companies_table .= "<tr><td colspan='4'>No Record Found.</td></tr>";   

        }    

        $companies_table .= "<tbody>";        

        header('Content-Type: application/json');                      

        echo json_encode(array('companies_table' => $companies_table));                 

    } 

    public function company_unresolved()
    {

        function myUrlEncode($string) {

            $entities = array('+', '%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D', ',');
            $replacements = array('%20' ,'!', '*', "'", "(", ")", ";", ":", "@", "&amp;", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]", "%2C");
            return str_replace($entities, $replacements, urlencode($string));

        }        

        $term_id = trim($this->input->post('term_id')); 

        if(strpos($this->input->post('sector'), '&') == true)
        {

            $sector = trim(myUrlEncode('"'.$this->input->post('sector').'"'));
        }
        else
        {   

            $sector = trim(myUrlEncode($this->input->post('sector')));
        
        } 

        if(strpos($this->input->post('industry'), '&') == true)
        {

            $industry = trim(myUrlEncode('"'.$this->input->post('industry').'"'));
        }
        else
        {   

            $industry = trim(myUrlEncode($this->input->post('industry')));
        
        }    

        $sic_code = trim($this->input->post('sic_code'));                

        $url = 'http://data.idaciti.com:81/api/termRule/coverage/json?token=gK-!dU&termId='.$term_id.'&sector='.$sector.'&industry='.$industry.'&sicCode='.$sic_code;

        $term_rule_coverge = $this->term_model->curl_responce($url);         

        $unMappedEntityIDs = $term_rule_coverge['unMappedEntityIDs'];  

        if(count($unMappedEntityIDs) > 0)
        {    
    
            $companies = $this->company->get_companies_by_entity_id($unMappedEntityIDs);
        }
        else
        {
            $companies = array();
        } 

        $companies_table = "    <thead> 
                                    <tr> 
                                        <th>CIK</th> 
                                        <th>Name</th> 
                                        <th></th> 
                                        <th></th> 
                                    </tr> 
                                </thead> 
                                <tbody> ";

        if(count($companies) > 0)
        {                             
                foreach ($companies as $comp) {
                    
                $companies_table .= "<tr> 
                        <td>".$comp['cik']."</td>
                        <td>".$comp['company_name']."</td> 
                        <td>    
                            <a class='' href='http://www.sec.gov/cgi-bin/browse-edgar?action=getcompany&CIK=".$comp['cik']."&type=10' >Research</a>
                        </td>
                        <td>    
                            <a class='' href='' >Process</a>
                        </td>
                    </tr>";

                }
        }
        else
        {

            $companies_table .= "<tr><td colspan='4'>No Record Found.</td></tr>";   

        }             

        $companies_table .= "<tbody>";

        header('Content-Type: application/json');                      

        echo json_encode(array('companies_table' => $companies_table));                 

    } 

    // public function resolved_entity_id()
    // {

    //     $entity_id = $this->input->post('entity_id');

    //     $term_id = $this->input->post('term_id');

    //     $url = 'http://data.idaciti.com:81/api/termResult/includeMissing/json?token=oepsy3b6&entity='.$entity_id.'&term='.$term_id.'&includeAnnual=true&includeQuarterly=true';

    //     $term_rule_coverge = $this->term_model->curl_responce($url); 

    //     echo "<pre>";

    //     print_r($term_rule_coverge);

    //     exit;

    // } 

    public function termResult($term_id, $entity_id) {


        $this->benchmark->mark('Home:index_start');

        $current = '/home/';
        
        $data = $this -> security($current);

        if ($data && !empty($data)) {

            $this->benchmark->mark('Home:index load_model_start');

            $this->benchmark->mark('Home:index load_model_end');
            log_message('debug', "load home model " . $this->benchmark->elapsed_time('Home:index load_model_start', 'Home:index load_model_end'));

            $url = 'http://data.idaciti.com:81/api/termResult/includeMissing/json?token=oepsy3b6&entity='.$entity_id.'&term='.$term_id.'&includeAnnual=true&includeQuarterly=true';

            $view_term_rule = $this->term_model->curl_responce($url); 

            $annual_name = ''; 

            $annual_amount = '';

            $quarter_name = '';

            $quarter_amount = '';

            $value = array();

            foreach($view_term_rule as $v_t_r)
            {  

                $value[] = $v_t_r['FY'];
            
                if($v_t_r['resolvedExpression'] != '' && $v_t_r['value'] != '')
                {
                        
                    if($v_t_r['FQ'] == 'FY')
                    {
                        $annual_name .= "'".$v_t_r['FY'].$v_t_r['FQ']."',";

                        $annual_amount .= $v_t_r['value'].",";
                    }   
                    else
                    {
                        $quarter_name .= "'".$v_t_r['FY'].$v_t_r['FQ']."',";

                        $quarter_amount .= $v_t_r['value'].",";
                    }   
                }

            } 

            $data['view_term_rule'] = $view_term_rule;;           

            $data['annual_name'] = $annual_name;

            $data['annual_amount'] = $annual_amount; 
            
            $data['quarter_name'] = $quarter_name;

            $data['quarter_amount'] = $quarter_amount; 

            $data['min_value'] = min($value); 

            $data['max_value'] = max($value);

            $data['view_term_rule_check'] = 'view_term_rule_check';                                                

            $this->load->view('general/header', $data);
            $this->load->view('term/view_term_result', $data);
            $this->load->view('general/footer');
        
        }else

            redirect('login');

        $this->benchmark->mark('Home:index_end');

        log_message('debug', "load home took " . $this->benchmark->elapsed_time('Home:index_start', 'Home:index_end'));
    }       

    // public function get_decision_financial_cat() {

    //     $url = 'http://data.idaciti.com:81/api/termRule/filter/json?token=gK-!dU&criteria=SecXbrl';

    //     $term_rules = $this->term_model->curl_responce($url);

    //     if(isset($term_rules) && count($term_rules) > 0)
    //     {    

    //         $term_rules_decision = array_sorting_decision_asc($term_rules);

    //         $term_rules_financial = array_sorting_financial_asc($term_rules);

    //         $check = $this->decision->create_decision($term_rules_decision);

    //         $check2 = $this->financial->create_financial($term_rules_financial);

    //         echo $check."---".$check2;

    //     }

    // }            

}