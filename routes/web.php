<?php

$routes = [
    "/" => ["AuthController" , "loginForm"],
    "index" => ["AuthController" , "loginForm"],
    "login" => ["AuthController" , "login"],
    "register" => ["AuthController" , "register"],
    "coach/dashboard" => ["CoachController" , "dashboard"],
    "sportif/dashboard" => ["SportifController" , "dashboard"],
];

