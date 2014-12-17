<?php
/*
echo "Gender: ",$_POST["gender"],"<br/>\n";
foreach ($_POST as $key => $value) {
echo "$key=$value<br/>\n";
}
*/
foreach ($_POST as $key => $value) {
if (count($_POST[$key]) > 1) {
for ($i=0; $i<count($_POST[$key]); $i++) {
echo "$key=",$_POST[$key][$i],"<br/>\n";
}
} else {
echo "$key=$value<br/>\n";
}
}
?>