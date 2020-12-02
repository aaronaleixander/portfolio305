<?php

function validName($name){
    return !empty($name);
}

function validEmail($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return false;
    }
    return true;
}

function validMailingType($mailType){
    return $mailType == "Text" OR $mailType == "HTML";
}

function validPhoneNumber($phoneNum){
    $isPhoneNum = false;
    // only numbers
    $onlyNums = preg_replace("/[^0-9]/",'', $phoneNum);

    //eliminate leading 1 if its there
    if (strlen($onlyNums) == 11) {
        $onlyNums = preg_replace("/^1/",'', $onlyNums);
    }

    if(strlen($onlyNums) == 10){
        $isPhoneNum = true;
    }
    return $isPhoneNum;
}

function validURL($url){
    $regExURL = '((https?:\/\/)?((www|\w\w)\.)?linkedin\.com\/)((([\w]{2,3})?)|([^\/]+\/(([\w|\d-&#?=])+\/?){1,}))$';

    if($url != $regExURL){
        return false;
    }
    return true;
}
