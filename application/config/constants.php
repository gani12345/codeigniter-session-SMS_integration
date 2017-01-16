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
define('PAYU_IN_MODE', 'PRODUCTION');
define('USERNAME','ccavijaypura@gmail.com');
//username for transactionalsms
define('SMSLIBUSERNAME','cca.vijayapura@gmail.com');
define('PASSWORD','chanakya1234');
//password for transactionalsms
define('PASSWORD','chanakya123');
define('SENDER','TXTLCL');
//sender name for transactionalsms
define('SMSLIBSENDER','CCAVIJ');
define('HOST','http://api.textlocal.in/send/?');
define("USERHASH","a7e38699d55466375b6957a94c5c1b0e28133815");
//Hash for transactionalsms
define("SMSLIBHASH","51b26ec40fa54ad23e743fee99afe15bb6dabaae");
define('SUCESSCODE','200');
define('DB_DATABASE','ganesh');
define('DB_USERNAME','root');
define('DB_PASSWORD','pass');
/*define('USERNAME','northernsoft');
define('PASSWORD','northern1234');
define('SENDERNAME','Northernsoft');
define('HOST','http://smslane.com/vendorsms/pushsms.aspx?');
define('SUCESSCODE','200');*/

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


/* End of file constants.php */
/* Location: ./application/config/constants.php */