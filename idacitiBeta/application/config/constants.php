<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

define('PAGE_CONTET_COUNT',24);
define('PRIVATE_COMPANY_INDICATOR','C');


if (defined('ENVIRONMENT'))
{
    switch (ENVIRONMENT)
    {
        case 'production':
            define('REST_API_URL','http://data.idaciti.com/api/');
            break;

        default:
            define('REST_API_URL','http://data.idaciti.com:81/api/');
    }
}

define('API_TOKEN', 'gK-!dU');
//'oepsy3b6';

define('REST_API_TERM_RULES', REST_API_URL.'termRule/filter/json?token={0}&criteria=SecXbrl');

define('REST_API_TERM_RULE', REST_API_URL.'termRule/expressions/json?token={0}&termId={1}');

define('REST_API_TERM_RULE_COVERAGE', REST_API_URL.'termRule/coverage/json?token={0}&termId={1}');

define('REST_API_TERM_RULE_COVERAGE_SECTOR_INDUSTRY', REST_API_URL.'termRule/coverage/json?token={0}&termId={1}&sector={2}&industry={3}&sicCode={4}');

define('REST_API_VIEW_TERM_RULE', REST_API_URL.'termResult/includeMissing/json?token={0}&entity={1}&term={2}&includeAnnual=true&includeQuarterly=true');


define('URL','http://'.$_SERVER['HTTP_HOST'].'/idacitiBeta/');

/* End of file constants.php */
/* Location: ./application/config/constants.php */
