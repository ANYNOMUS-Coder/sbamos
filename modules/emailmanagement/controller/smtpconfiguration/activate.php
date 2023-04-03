<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

$obj                    = new adminSmtpConfiguration;
$params                 = array();
$params['isActivated']  = 'N';
$obj -> updateSmtpConfiguration($params,'1');
$params['isActivated']  = 'Y';
$obj -> updateSmtpConfigurationBysmtpId($params,$editid);
$generalObj -> redirectToUrl($redirectToBack);