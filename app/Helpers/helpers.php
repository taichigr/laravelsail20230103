<?php

if (!function_exists('format_article_body')) {

    function format_article_body(string $body): string
    {
        $text = $body;
        if(mb_strlen($body) >= 100) {
            $text = mb_substr(nl2br($text), 0, 100);
        }
        return $text;
    }
  }