<?php
include 'member-application.secrets.php';

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
 'slackuser' => FILTER_SANITIZE_STRING,
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

$optional = array('slackuser', 'suffix', 'message');

$options = array(
 'iban' => '/^AL\d{10}[0-9A-Z]{16}$|^AD\d{10}[0-9A-Z]{12}$|^AT\d{18}$|^BH\d{2}[A-Z]{4}[0-9A-Z]{14}$|^BE\d{14}$|^BA\d{18}$|^BG\d{2}[A-Z]{4}\d{6}[0-9A-Z]{8}$|^HR\d{19}$|^CY\d{10}[0-9A-Z]{16}$|^CZ\d{22}$|^DK\d{16}$|^FO\d{16}$|^GL\d{16}$|^DO\d{2}[0-9A-Z]{4}\d{20}$|^EE\d{18}$|^FI\d{16}$|^FR\d{12}[0-9A-Z]{11}\d{2}$|^GE\d{2}[A-Z]{2}\d{16}$|^DE\d{20}$|^GI\d{2}[A-Z]{4}[0-9A-Z]{15}$|^GR\d{9}[0-9A-Z]{16}$|^HU\d{26}$|^IS\d{24}$|^IE\d{2}[A-Z]{4}\d{14}$|^IL\d{21}$|^IT\d{2}[A-Z]\d{10}[0-9A-Z]{12}$|^[A-Z]{2}\d{5}[0-9A-Z]{13}$|^KW\d{2}[A-Z]{4}22!$|^LV\d{2}[A-Z]{4}[0-9A-Z]{13}$|^LB\d{6}[0-9A-Z]{20}$|^LI\d{7}[0-9A-Z]{12}$|^LT\d{18}$|^LU\d{5}[0-9A-Z]{13}$|^MK\d{5}[0-9A-Z]{10}\d{2}$|^MT\d{2}[A-Z]{4}\d{5}[0-9A-Z]{18}$|^MR13\d{23}$|^MU\d{2}[A-Z]{4}\d{19}[A-Z]{3}$|^MC\d{12}[0-9A-Z]{11}\d{2}$|^ME\d{20}$|^NL\d{2}[A-Z]{4}\d{10}$|^NO\d{13}$|^PL\d{10}[0-9A-Z]{,16}n$|^PT\d{23}$|^RO\d{2}[A-Z]{4}[0-9A-Z]{16}$|^SM\d{2}[A-Z]\d{10}[0-9A-Z]{12}$|^SA\d{4}[0-9A-Z]{18}$|^RS\d{20}$|^SK\d{22}$|^SI\d{17}$|^ES\d{22}$|^SE\d{22}$|^CH\d{7}[0-9A-Z]{12}$|^TN59\d{20}$|^TR\d{7}[0-9A-Z]{17}$|^AE\d{21}$|^GB\d{2}[A-Z]{4}\d{14}$/',
 'bic' => '/([a-zA-Z]{4})([a-zA-Z]{2})(([2-9a-zA-Z]{1})([0-9a-np-zA-NP-Z]{1}))((([0-9a-wy-zA-WY-Z]{1})([0-9a-zA-Z]{2}))|([xX]{3})|)/'
);

$inputs = array();
$errors = array();

foreach($fields as $field => $filter) {
    $value = filter_input(INPUT_POST, $field, $filter, isset($options[$field]) ? array('options' => array('regexp' => $options[$field])) : 0);
    if ($value === false || ((!$value || trim($value) === '') && !in_array($field, $optional)) {
        $errors[$field] = true;
    } else if ($field === 'iban') {
        $value = strtoupper(str_replace(' ', '', $value));
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

$result = false;
if (count($errors) !== 0) {
    http_response_code(400);
} else {
    $message = implode("\r\n", array_map(function ($field, $value) {
      return ' * **'.$field . ':**' . ($field === 'message' ? "\r\n\r\n   > " . str_replace("\n", "\n   > ", str_replace("\r", "", $value)) : ' '. $value);
    }, array_keys($inputs), array_values($inputs)));

    $context = stream_context_create(array(
        'http' => array(
            'header' => "Content-type: application/json\r\nAuthorization: Bearer $token\r\n",
            'method' => 'POST',
            'content' => json_encode(array(
                'title' => 'Mitgliedsantrag von ' . $inputs['firstname'] . ' ' . $inputs['lastname'],
                'description' => $message,
                'confidential' => true
            ))
        ),
    ));

    $result = file_get_contents($url, false, $context);
    if ($result === false) {
        http_response_code(500);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <title>temporaerhaus</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
</head>
<body>
    <header>
        <a href="/" rel="home">
            <img width="240" height="114" src="/spaceicons/logo.svg" alt="temporaerhaus">
        </a>
    </header>
    <main data-errors="<?php echo htmlspecialchars(json_encode($errors)); ?>">
        <?php if ($_GET['lang'] === 'en') { ?>
            <?php if (count($errors) !== 0) { ?>
                <h3>💻 Computer  says "no" :(</h3>
                <p>
                    Please check your input again.
                </p>
            <?php } else if ($result === false) { ?>
                <h3>💻 Computer  says "no" :(</h3>
                <p>
                    Unfortunately, a squirrel ate the fibre or something like that 🐿️.
                    Please try it by e-mail &lt;3
                </p>
            <?php } else { ?>
                <h3>🥳 Thank you for your support!</h3>
                <p>
                    The support of you and other supporting members helps us to continue to offer and expand our programme.
                    We will contact you as soon as we have processed your application.
                </p>
            <?php } ?>
        <?php } else { ?>
            <?php if (count($errors) !== 0) { ?>
                <h3>💻 Computer sagt "Nein" :(</h3>
                <p>
                    Bitte überprüfe deine Eingabe noch einmal.
                </p>
            <?php } else if ($result === false) { ?>
                <h3>💻 Computer sagt "Nein" :(</h3>
                <p>
                    Leider hat ein Eichhörnchen die Glasfaser gefressen, oder so ähnlich 🐿️. 
                    Probier es doch bitte einmal per E-Mail &lt;3
                </p>
            <?php } else { ?>
                <h3>🥳 Vielen Dank für deine Unterstützung!</h3>
                <p>
                    Die Unterstützung von dir und anderen Fördermitgliedern hilft uns weiterhin unser Programm anzubieten und weiter auszubauen.
                    Wir melden uns bei dir, sobald wir deinen Antrag bearbeitet haben.
                </p>
            <?php } ?>
        <?php } ?>
    </main>
    <footer>
        <a href="/">Zurück zur Seite</a>
    </footer>
</body>
</html>
