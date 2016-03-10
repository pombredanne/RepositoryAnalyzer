<?php

use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\OutputInterface;

function progressBar(OutputInterface $output, $max) {
    $bar = new ProgressBar($output, $max);
    $bar->setBarCharacter('<info>=</info>');
    $bar->setProgressCharacter('|');

    return $bar;
}

function buildSearchQuery($lang, $year, $lastPush, $numStars) {
    return "language:$lang created:\"$year-01-01 .. $year-12-31\" pushed:>=$lastPush stars:>=$numStars";
}

function codeContains($code, $string, $regex = false, $comment = "//") {
    $codeWithoutComments = preg_replace("%$comment.+%", "", $code);

    if ($regex)
        return (bool) preg_match($string, $code);

    return str_contains($codeWithoutComments, $string);
}
