<?php
session_abort();
session_unset();

header('Location: test.php');
