<?php

declare(strict_types=1);

$jokes = [
    ['setup' => 'Why do programmers prefer dark mode?', 'punchline' => 'Because light attracts bugs.'],
    ['setup' => 'How many programmers does it take to change a light bulb?', 'punchline' => "None. That's a hardware problem."],
    ['setup' => 'Why do Java developers wear glasses?', 'punchline' => "Because they don't C#."],
    ['setup' => 'Why did the developer go broke?', 'punchline' => 'Because they used up all their cache.'],
    ['setup' => "What's a programmer's favourite place to hang out?", 'punchline' => 'Foo Bar.'],
    ['setup' => 'Why was the JavaScript developer sad?', 'punchline' => "Because they didn't Node how to Express themselves."],
    ['setup' => 'A SQL query walks into a bar, goes up to two tables and asks...', 'punchline' => '"Can I join you?"'],
    ['setup' => 'Why do programmers always mix up Halloween and Christmas?', 'punchline' => 'Because Oct 31 == Dec 25.'],
    ['setup' => 'There are only 10 kinds of people in this world.', 'punchline' => "Those who understand binary and those who don't."],
    ['setup' => 'What did the PHP developer say when their code finally worked?', 'punchline' => '"Well, that was unexpected T_PAAMAYIM_NEKUDOTAYIM."'],
];

function escape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

$hostname = gethostname() ?: 'unknown';

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Programming Jokes</title>
  <style>
    :root {
      --background: #faf8f5;
      --card: #ffffff;
      --text: #1f1f1f;
      --muted: #6b6b6b;
      --accent: #d9622b;
      --border: #e7e2da;
    }
    @media (prefers-color-scheme: dark) {
      :root {
        --background: #161514;
        --card: #211f1d;
        --text: #f1eee9;
        --muted: #a39d94;
        --accent: #f0864f;
        --border: #34302c;
      }
    }
    * { box-sizing: border-box; }
    body {
      margin: 0;
      padding: 48px 16px;
      background: var(--background);
      color: var(--text);
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
      line-height: 1.5;
    }
    main { max-width: 640px; margin: 0 auto; }
    h1 { font-size: 2rem; margin: 0 0 8px; }
    p.intro { color: var(--muted); margin: 0 0 32px; }
    ol { list-style: none; padding: 0; margin: 0; counter-reset: joke; }
    li {
      counter-increment: joke;
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 20px 20px 20px 64px;
      margin-bottom: 16px;
      position: relative;
    }
    li::before {
      content: counter(joke);
      position: absolute;
      left: 20px;
      top: 20px;
      width: 28px;
      height: 28px;
      border-radius: 50%;
      background: var(--accent);
      color: #fff;
      font-weight: 600;
      display: grid;
      place-items: center;
      font-size: 0.9rem;
    }
    .setup { margin: 0 0 8px; font-weight: 600; }
    details summary {
      cursor: pointer;
      color: var(--accent);
      font-size: 0.95rem;
    }
    details p { margin: 8px 0 0; }
    footer { color: var(--muted); font-size: 0.85rem; margin-top: 32px; }
  </style>
</head>
<body>
  <main>
    <h1>Programming Jokes</h1>
    <p class="intro">Click to reveal each punchline.</p>
    <ol>
<?php foreach ($jokes as $joke): ?>
      <li>
        <p class="setup"><?= escape($joke['setup']) ?></p>
        <details><summary>Reveal</summary><p><?= escape($joke['punchline']) ?></p></details>
      </li>
<?php endforeach; ?>
    </ol>
    <footer>Served by PHP <?= escape(PHP_VERSION) ?> from container <?= escape($hostname) ?></footer>
  </main>
</body>
</html>
