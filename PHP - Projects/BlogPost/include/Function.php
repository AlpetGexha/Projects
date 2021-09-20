<?php

function gethashtags($text)
{
    //Match the hashtags
    preg_match_all('/(^|[^a-z0-9_])#([a-z0-9_]+)/i', $text, $matchedHashtags);
    $hashtag = '';
    // For each hashtag, strip all characters but alpha numeric
    if (!empty($matchedHashtags[0])) {
        foreach ($matchedHashtags[0] as $match) {
            $hashtag .= preg_replace("/[^a-z0-9]+/i", "", $match) . ',';
        }
    }
    //to remove last comma in a string
    return rtrim($hashtag, ',');
}
$description = "Mahesh babu new movie #sarileruNeekuEvaru is coming soon, hope it will break #bharathAneNenu movie records";

echo gethashtags($description);

//Convert  to clickable links
function convert_clickable_links($message)
{
    $parsedMessage = preg_replace(array('/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:\'".,<>?«»“”‘’]))/', '/(^|[^a-z0-9_])@([a-z0-9_]+)/i', '/(^|[^a-z0-9_])#([a-z0-9_]+)/i'), array('<a href="$1" target="_blank">$1</a>', '$1<a href="">@$2</a>', '$1<a href="index.php?hashtag=$2">#$2</a>'), $message);
    return $parsedMessage;
}
$description = convert_clickable_links($description);
echo $description;
?>