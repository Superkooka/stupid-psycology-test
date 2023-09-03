<?php

print "[INFO] Importing all quizz in quiz/.\n";
$quizz = array_map(fn ($filename) => require($filename), glob("quiz/*.php"));
print "[INFO] " . count($quizz) . " quizz found.\n";

if (is_dir("build/")) {
  print "[INFO] Cleaning build/ folder\n";
  $rmdir = exec("rm -rf build/"); // sry
}

mkdir("build/");

$quizzHtmlList = "";
foreach ($quizz as $quiz) {
  $quizzHtmlList .= sprintf(<<<HTML
<li class="my-4"><a href="%s.html" class="text-xl underline">%s</a></li>
HTML, $quiz["slug"], $quiz["name"]);
}

$homepage_template = file_get_contents("template/homepage.html");
$homepage_file = str_replace("##QUIZ_LIST##", $quizzHtmlList, $homepage_template);
file_put_contents("build/index.html", $homepage_file);


$question_template = file_get_contents("template/question.html");
foreach ($quizz as $quiz) {
  $question_file = str_replace("##QUIZ_NAME##", $quiz["name"], $question_template);
  $question_file = str_replace("##QUESTIONS_JS_OBJECTS##", implode(",", array_map(fn ($question) => sprintf("{name: '%s', weight: %d}", htmlentities($question["name"]), $question["weight"]), $quiz["questions"])), $question_file);
  file_put_contents(sprintf("build/%s.html", $quiz["slug"]), $question_file);
}
