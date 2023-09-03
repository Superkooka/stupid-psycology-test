<?php

return [
  "slug" => "communism", 
  "name" => "Êtes vous Communiste?",

  "questions" => [
    ["name" => "Devrait on instauré une dictature prolétarienne?", "weight" => 2 ],
    ["name" => "Les classes ouvrières du monde entier ont plus de points communs entre elles qu'avec les classes non ouvrières de leur propre pays.", "weight" => 1],
  ],

  "results" => [
    "agree" => ["name" => "Communisme", "desc" => "Sale rouge"],
    "neutral" => ["name" => "Centriste", "desc" => "useless"],
    "disagree" => ["name" => "Capitaliste", "desc" => "Enculé de riche"],
  ]
];
