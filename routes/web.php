<?php

$routes = [
    "/" => ["AuthController" , "loginForm"],
    "login" => ["AuthController" , "login"],
    "coach/dashboard" => ["CoachController" , "dashboard"],
    "sportif/dashboard" => [],
];

