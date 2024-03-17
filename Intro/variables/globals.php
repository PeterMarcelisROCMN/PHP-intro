<?php

$something = 'ss';


function echoText()
{
    global $something; // means it will refer to the global variable, instead of a local one.
    echo $something;
}

echoText();