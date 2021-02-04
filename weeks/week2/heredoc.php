<?php
$book = 'Handamaid\'s Table';
$author = 'Margaret Atwood';
$character = "June";
$actor = "Elizabeth Moss";

$content = <<<EOT
<p>My favorite book is $book, written by $autho , and is presently a miniseries on HULU. Hulu's viewing audience is extremely excited about the miniseries and looks forward to the 5th season of the <b>award winning "$book!"</b></p>

<p><i> $actor's </i> rendition as $character is right on! Once this content is corrected, it will display properly; my content is displayed in orange, and my variables are displayed in black !!!</p>
EOT;

echo $content;
