<?php

require_once dirname(__FILE__) . "/lib/TwitterOAuth.php";

$config =  parse_ini_file('config.ini', true);
$payload = getPayload();

$query = array(
  "q" => $payload->query,
);

$connection = new TwitterOAuth( $config['twitter']['consumer_key'],
                                $config['twitter']['consumer_secret'],
                                $config['twitter']['oauth_token'],
                                $config['twitter']['oauth_secret']);

$content = $connection->get('account/verify_credentials');

$search_result = $connection->get('search/tweets', $query);

foreach ($search_result->statuses as $result) {
  echo $result->user->screen_name . ": " . $result->text . "\r";
}

$file = 'output.txt';
echo("Writing to file.... \r");
file_put_contents($file, $search_result->statuses[0]->text);

$from_file = file_get_contents($file);
echo("Text from file: \r");
print_r($from_file);
echo("\nWorker101 completed.");
