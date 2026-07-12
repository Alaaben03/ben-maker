<?php
/**
 * Include at the top of every protected admin page.
 * Redirects to login if not authenticated.
 */
require_once __DIR__ . '/../includes/functions.php';
require_login();
