<?php

define("DEBUG_MODE", true);
define("DB_HOST", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE_NAME", "leads_manager");
define('FRONT_APP_PATH', 'http://localhost:3000/');
define('ACCOUNTS_TABLE_NAME', 'accounts');
define('PROJECTS_TABLE_NAME', 'projects');


/**
 * Validations fields
 */
define('CREATE_PROJECTS_FIELDS', [
    'account_id',
    'project_name',
    'page_url',
    'response_page',
    'error_page',
    'emails'
]);

define('UPDATE_PROJECTS_FIELDS',[
    'project_id',
    'account_id',
    'project_name',
    'page_url',
    'response_page',
    'error_page',
    'emails'
]);

define('DELETE_PROJECTS_FIELDS',[
    'project_id',
    'account_id'
]);

define('CREATE_ACCOUNT_FIELDS', [
    'first_name',
    'last_name',
    'email',
    'password'
]);

define('LOGIN_FIELDS', [
    'email',
    'password'
]);