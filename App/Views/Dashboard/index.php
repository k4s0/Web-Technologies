<?php
if ($code == 0) {
    echo '
        <h1>Welcome to your client Dashboard</h1>
        <a href="/Home/Index">go to main page</a>
    ';
}else{
    echo '
        <h1>Welcome to your producer Dashboard</h1>
        <a href="/Home/Index">go to main page</a>
    ';
}
