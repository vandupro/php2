<?php

use Illuminate\Support\Facades\Auth;

const BASE_URL = 'http://localhost/php2/mvc/';
const  PUBLIC_URL = BASE_URL . 'public/';
define('IMAGE_UPLOAD', $_SERVER["DOCUMENT_ROOT"] . '/php2/mvc/public/');
const THEME_ASSET_URL = PUBLIC_URL . 'theme/';
const THEME_FONTEND_URL = PUBLIC_URL . 'frontend/';
const ADMIN_URL = BASE_URL . 'admin/';
const BACKEND_NAMESPACE = 'App\Controllers\Backend';

const MEMBER_ROLE = 1;
const ADMIN_ROLE = 200;
const AUTH = 'session_auth';
const CART = 'session_cart';
const MESSAGE  = 'session_message';
const ROLES = [
    ['id' => 0, 'name' => 'Member'],
    ['id' => 200, 'name' => 'Admin'],
    ['id' => 900, 'name' => 'Super Admin'],
];


?>