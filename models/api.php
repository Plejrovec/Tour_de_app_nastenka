<?php
class Api
{

    private $ch;
    private $secret = 'a43dec615d7f1be1930c4bd8768ddb08';
    private $url = 'https://tda.knapa.cz/';

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
    
        
        $this->GetTodaysData();
    }

    public function GetLastComms()
    {
        $ch = curl_init();

        // Set the URL and other options
        curl_setopt($ch, CURLOPT_URL, $this->url . "commit/latest/5");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);

        // Execute the cURL request and get the response
        $response = curl_exec($ch);

        // Close the cURL resource
        curl_close($ch);
        // Process the response data
        $commitdata = json_decode($response);
        foreach($commitdata as $a) {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $this->url . "user/" .$a->creator_id);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);

            // Execute the cURL request and get the response
            $response = curl_exec($ch);
            $userdata = json_decode($response);

            // Close the cURL resource
            curl_close($ch);
            // Add to LastComms
            $this->LastComms[] = array(
                "nick" => $userdata->nick,
                "time" =>date('H:i:s', strtotime($a->date)), 
                "lines_added" => $a->lines_added, 
                "lines_removed" => $a->lines_removed, 
                "description" => $a->description,
                "avatar_url" => $userdata->avatar_url,
            
            );
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
        
        $startDate = strtotime($data->boot_time);

        $uptime = time() - $startDate;

        $uptimeDays = floor($uptime / (60*60*24));
        $uptimeHours = floor(($uptime % (60*60*24))/(60*60));
        $uptimeMinutes = floor(($uptime % (60*60))/60);
        $uptimeSeconds = $uptime % 60;
        
        // Format the date in a readable way
        $this->ServerUptime = "server running for: " . $uptimeDays . " days " . $uptimeHours . " hours " . $uptimeMinutes . " minutes " . $uptimeSeconds . " seconds";

        $this->ServerPlatform = $data->platform;


        // Output the formatted date

    }

    public function GetTodaysData()
    {
        $ch = curl_init();

        // Set the URL and other options
        curl_setopt($ch, CURLOPT_URL, $this->url . "commit/filter/". date('c', strtotime('today')));
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
        $numOfComms=0;
        foreach($data as $a) {
            var_dump($a);
            $numOfComms+=1;
            $numOfAdded +=$a->lines_added;
            $numOfDelelted +=$a->lines_removed;
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
            $numOfAdded +=$a->lines_added;
            $numOfDelelted +=$a->lines_removed;
        }

        $this->AllData =array("number_of_added" => $numOfAdded, "number_of_deleted" => $numOfDelelted, "number_of_comms" => $numOfComms);
    }
}
