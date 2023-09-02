<?php
header('Access-Control-Allow-Origin: *');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  die();
}

$fields = array(
 'firstname' => FILTER_SANITIZE_STRING,
 'lastname' => FILTER_SANITIZE_STRING,
 'email' => FILTER_SANITIZE_EMAIL,
 'type' => FILTER_SANITIZE_STRING,
 'amount' => FILTER_SANITIZE_STRING,
 'interval' => FILTER_SANITIZE_STRING,
 'iban' => FILTER_SANITIZE_STRING,
 'bic' => FILTER_VALIDATE_REGEXP,
 'consent' => FILTER_SANITIZE_STRING,
 'address' => FILTER_SANITIZE_STRING,
 'suffix' => FILTER_SANITIZE_STRING,
 'city' => FILTER_SANITIZE_STRING,
 'zip' => FILTER_SANITIZE_STRING,
 'country' => FILTER_SANITIZE_STRING,
 'mailconsent' => FILTER_SANITIZE_STRING,
 'message' => FILTER_SANITIZE_STRING
);

$options = array(
 'iban' => '/^AL\d{10}[0-9A-Z]{16}$|^AD\d{10}[0-9A-Z]{12}$|^AT\d{18}$|^BH\d{2}[A-Z]{4}[0-9A-Z]{14}$|^BE\d{14}$|^BA\d{18}$|^BG\d{2}[A-Z]{4}\d{6}[0-9A-Z]{8}$|^HR\d{19}$|^CY\d{10}[0-9A-Z]{16}$|^CZ\d{22}$|^DK\d{16}$|^FO\d{16}$|^GL\d{16}$|^DO\d{2}[0-9A-Z]{4}\d{20}$|^EE\d{18}$|^FI\d{16}$|^FR\d{12}[0-9A-Z]{11}\d{2}$|^GE\d{2}[A-Z]{2}\d{16}$|^DE\d{20}$|^GI\d{2}[A-Z]{4}[0-9A-Z]{15}$|^GR\d{9}[0-9A-Z]{16}$|^HU\d{26}$|^IS\d{24}$|^IE\d{2}[A-Z]{4}\d{14}$|^IL\d{21}$|^IT\d{2}[A-Z]\d{10}[0-9A-Z]{12}$|^[A-Z]{2}\d{5}[0-9A-Z]{13}$|^KW\d{2}[A-Z]{4}22!$|^LV\d{2}[A-Z]{4}[0-9A-Z]{13}$|^LB\d{6}[0-9A-Z]{20}$|^LI\d{7}[0-9A-Z]{12}$|^LT\d{18}$|^LU\d{5}[0-9A-Z]{13}$|^MK\d{5}[0-9A-Z]{10}\d{2}$|^MT\d{2}[A-Z]{4}\d{5}[0-9A-Z]{18}$|^MR13\d{23}$|^MU\d{2}[A-Z]{4}\d{19}[A-Z]{3}$|^MC\d{12}[0-9A-Z]{11}\d{2}$|^ME\d{20}$|^NL\d{2}[A-Z]{4}\d{10}$|^NO\d{13}$|^PL\d{10}[0-9A-Z]{,16}n$|^PT\d{23}$|^RO\d{2}[A-Z]{4}[0-9A-Z]{16}$|^SM\d{2}[A-Z]\d{10}[0-9A-Z]{12}$|^SA\d{4}[0-9A-Z]{18}$|^RS\d{20}$|^SK\d{22}$|^SI\d{17}$|^ES\d{22}$|^SE\d{22}$|^CH\d{7}[0-9A-Z]{12}$|^TN59\d{20}$|^TR\d{7}[0-9A-Z]{17}$|^AE\d{21}$|^GB\d{2}[A-Z]{4}\d{14}$/',
 'bic' => '/([a-zA-Z]{4})([a-zA-Z]{2})(([2-9a-zA-Z]{1})([0-9a-np-zA-NP-Z]{1}))((([0-9a-wy-zA-WY-Z]{1})([0-9a-zA-Z]{2}))|([xX]{3})|)/'
);

$inputs = array();
$errors = array();

foreach($fields as $field => $filter) {
    $value = filter_input(INPUT_POST, $field, $filter, isset($options[$field]) ? array('options' => array('regexp' => $options[$field])) : 0);
    if ($value === false || ((!$value || trim($value) === '') && $field !== 'suffix' && $field !== 'message')) {
        $errors[$field] = true;
    } else if ($field === 'iban') {
        $value = str_replace(' ', '', $value);
        $res = filter_var($value, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => $options['iban'])));
        if (!$res || trim($res) === '') {
            $errors[$field] = true;
        } else {
            $inputs[$field] = chunk_split($res, 4, ' ');
        }
    } else {
        $inputs[$field] = $value;
    }
}

if (count($errors) !== 0) {
    http_response_code(400);
    header('Content-Type: application/json; charset=utf-8');
    die(json_encode($errors));
}

$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/plain; charset=utf-8';
$headers[] = "To: mail@ech0.de";
$headers[] = "From: mail@ech0.de";
$header = implode('\r\n', $headers);

$message = implode('\r\n', array_map(function ($field, $value) {
  return $field . ':' . ($field === 'message' ? '\r\n\r\n' : ' ') . $value;
}, array_keys($inputs), array_values($inputs)));

mail('vorstand@temporaerhaus.de', 'Mitgliedsantrag via temporaerhaus.de', $message, $header);
?>
<h3>🥳 Vielen Dank für deine Unterstützung!</h3>
<p>
    Die Unterstützung von dir und anderen Fördermitgliedern hilft uns weiterhin unser Programm anzubieten und weiter auszubauen.
    Wir melden uns bei dir, sobald wir deinen Antrag bearbeitet haben.
</p>
