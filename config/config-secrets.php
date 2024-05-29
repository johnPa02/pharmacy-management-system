<?php
define('DB_HOST', trim(file_get_contents('/run/secrets/db_host')));
define('DB_NAME', trim(file_get_contents('/run/secrets/db_name')));
define('DB_USER', trim(file_get_contents('/run/secrets/db_user')));
define('DB_PASSWORD', trim(file_get_contents('/run/secrets/db_password')));
define('BASE_PATH', realpath(dirname(__FILE__) . '/..'));