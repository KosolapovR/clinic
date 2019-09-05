<?php

echo "Аjax отработал";
if (isset($_REQUEST)) {
            debugger ($_REQUEST);
            echo ($_SERVER['QUERY_STRING']);
        }