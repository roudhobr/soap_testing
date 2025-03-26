<?php
$wsdl = "http://localhost/soap_testing/contact_address.wsdl";

try {
    $client = new SoapClient($wsdl, ['cache_wsdl' => WSDL_CACHE_NONE]);

    $contact = $client->GetContact(1);
    echo "<strong>Contact:</strong> <br>";
    echo "ID: " . $contact->id . "<br>";
    echo "Name: " . $contact->name . "<br>";
    echo "Phone: " . $contact->phone . "<br><br>";

    $address = $client->GetAddress(1);
    if ($address) {
        echo "<strong>Address:</strong> <br>";
        echo "ID: " . $address->id . "<br>";
        echo "Street: " . $address->street . "<br>";
        echo "City: " . $address->city . "<br>";
    } else {
        echo "Address not found.";
    }
} catch (SoapFault $e) {
    echo "Error: " . $e->getMessage();
}
?>