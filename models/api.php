<?php
class Api
{

    private $ch;
    private $secret = 'a43dec615d7f1be1930c4bd8768ddb08';
    private $url = 'https//tda.knapa.cz/';

    private $headers;

    public $ServerUptime;
    public $ServerPlatform;

    public $LastComms = array();

    public $Programmers = array();

    public $TodaysData = array();
    public $AllData = array();
    public function __construct() {
        $this->headers = array(
            'accept: application/json',
            'x-access-token: ' . $this->secret
        );
        $this->GetAllData();
        $this->GetLastComms();
        $this->ReturnProgrammers();
        $this->ReturnBaseStats();
        $this->GetTodaysData();
    }

    public function GetLastComms()
    {

        $ch = curl_init();

        // Set the URL and other options
        curl_setopt($ch, CURLOPT_URL, $this->url . "latest/5");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);

        // Execute the cURL request and get the response
        $response = curl_exec($ch);

        // Close the cURL resource
        curl_close($ch);

        // Process the response data
        $commitdata = json_decode($response);

        foreach($commitdata as $a) {
            curl_setopt($ch, CURLOPT_URL, $this->url . "user/" .$a["user_id"]);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);

            // Execute the cURL request and get the response
            $response = curl_exec($ch);
            $userdata = json_decode($response);

            // Close the cURL resource
            curl_close($ch);
            $this->LastComms[] = array("nick" => $userdata[0]["nick"], "time" =>date('H:i:s', strtotime($a["date"])), "lines_added" => $a["lines_added"], "lines_removed" => $a["lines_removed"], "description" => $a["description"] );
        }


        

    }

    public function ReturnProgrammers()
    {
        $ch = curl_init();

        // Set the URL and other options
        curl_setopt($ch, CURLOPT_URL, $this->url . "user/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Set the HTTP headers

        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);

        // Execute the cURL request and get the response
        $response = curl_exec($ch);

        // Close the cURL resource
        curl_close($ch);

        // Process the response data
        $data = json_decode($response);

        $this->Programmers = $data;

        

    }
    public function ReturnBaseStats()
    {
        $ch = curl_init();

        // Set the URL and other options
        curl_setopt($ch, CURLOPT_URL, $this->url . "sysinfo/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);

        // Execute the cURL request and get the response
        $response = curl_exec($ch);

        // Close the cURL resource
        curl_close($ch);

        // Process the response data
        $data = json_decode($response);

        $date = DateTime::createFromFormat('Y-m-d\TH:i:sO', $data[0]["boot_time"]);

        // Format the date in a readable way
        $this->ServerUptime = $date->format('F j, Y \a\t g:i:s A T');
        $this->ServerPlatform = $data[0]['platform'];


        // Output the formatted date

    }

    public function GetTodaysData()
    {
        $ch = curl_init();

        // Set the URL and other options
        curl_setopt($ch, CURLOPT_URL, $this->url . "commit/". date('Y-m-d\TH:i:sO', strtotime('today')));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        

        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);

        // Execute the cURL request and get the response
        $response = curl_exec($ch);

        // Close the cURL resource
        curl_close($ch);

        // Process the response data
        $data = json_decode($response);
        
        $numOfAdded=0;
        $numOfDelelted=0;
        $numOfComms = count($data);
        foreach($data as $a) {
            $numOfAdded +=$a["lines_added"];
            $numOfDelelted +=$a["lines_removed"];
        }

        $this->TodaysData =array("number_of_added" => $numOfAdded, "number_of_deleted" => $numOfDelelted, "number_of_comms" => $numOfComms);
    }

    public function GetAllData() {
        $ch = curl_init();

        // Set the URL and other options
        curl_setopt($ch, CURLOPT_URL, $this->url . "commit/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        

        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);

        // Execute the cURL request and get the response
        $response = curl_exec($ch);

        // Close the cURL resource
        curl_close($ch);

        // Process the response data
        $data = json_decode($response);
        
        $numOfAdded=0;
        $numOfDelelted=0;
        $numOfComms = count($data);
        foreach($data as $a) {
            $numOfAdded +=$a["lines_added"];
            $numOfDelelted +=$a["lines_removed"];
        }

        $this->AllData =array("number_of_added" => $numOfAdded, "number_of_deleted" => $numOfDelelted, "number_of_comms" => $numOfComms);
    }
}
