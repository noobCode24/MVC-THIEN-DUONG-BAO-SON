<?php
// print_r(explode("/",trim($_SERVER['REQUEST_URI'],"/")));
// echo'<pre>';
// print_r($_SERVER);
// echo'</pre>';
define('_HOST_PATH_', $_SERVER['REQUEST_SCHEME'] ."://". $_SERVER['HTTP_HOST'] . "/" .(explode("/",trim($_SERVER['REQUEST_URI'],"/")))[0]);