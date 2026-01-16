<?php

$routes = [
    "/" => ["AuthController" , "loginForm"],
    "index" => ["AuthController" , "loginForm"],
    "login" => ["AuthController" , "login"],
    "register" => ["AuthController" , "register"],
    "coach/dashboard" => ["CoachController" , "dashboard"],
    "coach/disponibility" => ["CoachController" , "disponibility"],
    "coach/reservations" => ["ReservationController" , "reservations"],
    "coach/profil" => ["CoachController" , "profil"],
    "coach/getDisponibilitiesCoach" => ["DisponibiliteController" , "getdisponibilitiesCoach"],
    "coach/addDisponibilities" => ["DisponibiliteController" , "ajouteDisponibilite"],
    "coach/updateDisponibilities" => ["DisponibiliteController" , "modifierDisponibilite"],
    "coach/deleteDisponibilities" => ["DisponibiliteController" , "supprimerDisponibilite"],
    "coach/getReservations" => ["ReservationController" , "getReservations"],
    "coach/confirmReservation" => ["ReservationController" , "confirmReservation"],
    "coach/updateProfil" => ["CoachController" , "updateProfil"],
    "sportif/dashboard" => ["SportifController" , "dashboard"],
];

