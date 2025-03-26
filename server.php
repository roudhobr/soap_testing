<?php 
class ContactAddressService {
    private $contacts = [
        1 => ['id' => 1, 'name' => 'Joko Widodo', 'phone' => '08129876543', 'email' => 'joko.widodo@example.com'],
        2 => ['id' => 2, 'name' => 'Siti Aisyah', 'phone' => '08211234567', 'email' => 'siti.aisyah@example.com'],
        3 => ['id' => 3, 'name' => 'Agus Salim', 'phone' => '085711223344', 'email' => 'agus.salim@example.com']
    ];
    
    private $addresses = [
        1 => ['id' => 1, 'street' => 'Jl. Kenanga', 'city' => 'Yogyakarta', 'postalCode' => '55281'],
        2 => ['id' => 2, 'street' => 'Jl. Mawar', 'city' => 'Semarang', 'postalCode' => '50144'],
        3 => ['id' => 3, 'street' => 'Jl. Melati', 'city' => 'Surabaya', 'postalCode' => '60256']
    ];

    public function GetContact($id) {
        return isset($this->contacts[$id]) ? (object) $this->contacts[$id] : null;
    }

    public function GetAddress($id) {
        return isset($this->addresses[$id]) ? (object) $this->addresses[$id] : null;
    }
}

// Inisialisasi SOAP Server
$options = [
    'uri' => "http://localhost/soap_api/",
    'soap_version' => SOAP_1_2
];

$server = new SoapServer("http://localhost/soap_api/contact_address.wsdl", $options); // Menggunakan WSDL
$server->setClass("ContactAddressService");
$server->handle();
?>
