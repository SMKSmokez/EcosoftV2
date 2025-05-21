<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include anything else that should run early (e.g. language selection, config, autoloading)
require_once '../Pages/Parts/lang.php';
