<?php

interface Ai
{
    public function send(string $prompt);
}

class OpenAi implements Ai
{
    public function send(string $prompt): string
    {
        return 'This is from openai and your PROMPT: ' . $prompt;
    }
}

class Gemini implements Ai
{
    public function send(string $prompt): string
    {
        return 'This is from gemini and your PROMPT: ' . $prompt;
    }
}

class Llm
{
    public static function consume(string $type, string $msg): string
    {
        switch ($type) {
            case 'openai':
                $test = new OpenAi();
                break;
            case 'gemini':
                $test = new Gemini();
                break;
        }

        return $test->send($msg);
    }
}

// Test
$llm = new Llm();
echo $llm::consume('openai', 'Hello World!');
