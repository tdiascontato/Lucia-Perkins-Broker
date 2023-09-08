<?php
session_start();
require 'config/database.php';
session_destroy();
header('location: ' . ROOT_URL);
die();
