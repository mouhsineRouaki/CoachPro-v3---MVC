<?php

$routes = [
    "/" => ["AuthController" , "loginForm"],
    "index" => ["AuthController" , "loginForm"],
    "login" => ["AuthController" , "login"],
    "register" => ["AuthController" , "register"],
    "coach/dashboard" => ["CoachController" , "dashboard"],
    "coach/disponibility" => ["CoachController" , "disponibility"],
    "coach/reservations" => ["CoachController" , "reservations"],
    "coach/profil" => ["CoachController" , "profil"],
    "coach/getDisponibilitiesCoach" => ["CoachController" , "getdisponibilitiesCoach"],
    "coach/addDisponibilities" => ["CoachController" , "ajouteDisponibilite"],
];

