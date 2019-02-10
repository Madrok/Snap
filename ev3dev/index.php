<?php
$port = $_GET['portName'];
$property = $_GET['property'];
$value = $_GET['value'];
file_put_contents("/tmp/phplog", "port:".$port." prop:".$property." value:".$value."\n", FILE_APPEND);

switch($port) {
	case "A": $port = "outA"; break;
	case "B": $port = "outB"; break;
	case "C": $port = "outC"; break;
	case "D": $port = "outD"; break;
	default: return;
}

switch($property) {
case "command":
	file_put_contents("/sys/class/tacho-motor/motor0/command", $value); /*, LOCK_EX */
	break;
case "speed_sp":
	file_put_contents("/sys/class/tacho-motor/motor0/speed_sp", $value); /*, LOCK_EX */
	break;
default:
}

?>
