<?php
//$appName = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$appName = "psql postgresql-asymmetrical-74036 --app erpproyecto";
$connStr = "host=ec2-54-243-185-99.compute-1.amazonaws.com port=5432 dbname=dcjbjufidqvphb user=lobxpiyeyxejzq password=cd75b62e495181141f92dece1d64f46ce79ac081479e86ae503060a70024ecb9 options='--application_name=$appName'";

//simple check
$conn = pg_connect($connStr);
$result = pg_query($conn, "select * from pg_stat_activity");
var_dump(pg_fetch_all($result));

?>
