<?php

return array(
/** set your paypal credential **/
'client_id' =>'AXUoNi7l3QCLTsLFzmzdefVItuyjSYmahUN5EiX2EMlmwPHkDDMTC1WJ0tfvcbcHD2rKvM5PAT8lqUGh',
'secret' => 'EH22TuOPPijCbHVHAOIauqV6d0mn5QcZbth9Ui3tK1ubr2LrZyvQDctWt9rXaAdJcljsQOfr7oR3414f',
/**
* SDK configuration 
*/
'settings' => array(
/**
* Available option 'sandbox' or 'live'
*/
'mode' => 'sandbox',
/**
* Specify the max request time in seconds
*/
'http.ConnectionTimeOut' => 1000,
/**
* Whether want to log to a file
*/
'log.LogEnabled' => true,
/**
* Specify the file that want to write on
*/
'log.FileName' => storage_path() . '/logs/paypal.log',
/**
* Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
*
* Logging is most verbose in the 'FINE' level and decreases as you
* proceed towards ERROR
*/
'log.LogLevel' => 'FINE'
),
);