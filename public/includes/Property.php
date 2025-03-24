<?php
class Property
{
    public $houses = [];
    public $cottages = [];
    public $housingCooperativeses = [];
    public $plots = [];
    public $projects = [];
    public $farms = [];
    public $condominiums = [];
    public $foreignProperties = [];
    public $premises = [];

    private $placeholder;

    private $username, $password, $customer_id;

    private $errors;

    function __construct()
    {
        // Initialize $this->errors as an empty array
        $this->errors = [];
        // fetch data from the api
        $options = get_option('ctrl_options');

        $this->username = is_array($options) && isset($options['ctrl_field_username']) ? $options['ctrl_field_username'] : null;
        $this->password = is_array($options) && isset($options['ctrl_field_password']) ? $options['ctrl_field_password'] : null;
        $this->customer_id = is_array($options) && isset($options['ctrl_field_customer_id']) ? $options['ctrl_field_customer_id'] : null;

        $this->placeholder = plugin_dir_url(__FILE__) . 'images/ctrl-vitec-integration-placeholder.png';

        // Ensure all properties are arrays to avoid warnings.
        $this->houses = is_array($this->houses) ? $this->houses : [];
        $this->cottages = is_array($this->cottages) ? $this->cottages : [];
        $this->housingCooperativeses = is_array($this->housingCooperativeses) ? $this->housingCooperativeses : [];
        $this->plots = is_array($this->plots) ? $this->plots : [];
        $this->projects = is_array($this->projects) ? $this->projects : [];
        $this->farms = is_array($this->farms) ? $this->farms : [];
        $this->condominiums = is_array($this->condominiums) ? $this->condominiums : [];
        $this->foreignProperties = is_array($this->foreignProperties) ? $this->foreignProperties : [];
        $this->premises = is_array($this->premises) ? $this->premises : [];

    }

    function fetch(
        $URL = "https://connect.maklare.vitec.net/Estate/GetEstateList",
        $request = null,
        $post = false,
        $binary
        = false
    ) {
        // Check if variables are not set do not execute the function and report to user
        if ($this->username == null || $this->password == null || $this->customer_id == null) {
            array_push($this->errors, '<h5 class="center"><strong>Please fill in your API credentials in administration
        settings!</strong></h5>');
            ob_start();
            include_once('partials/error.php');
            return ob_get_clean();
        }

        $ch = curl_init();

        if ($post == true) {
            curl_setopt($ch, CURLOPT_POST, true);
        }
        if ($binary == true) {
            set_time_limit(0);
            $fp = fopen(dirname(__FILE__) . '/localfile.tmp', 'w+');
            curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 600);
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        }
        curl_setopt($ch, CURLOPT_USERNAME, $this->username);
        curl_setopt($ch, CURLOPT_PASSWORD, $this->password);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $URL);

        if ($request) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($request)
                )
            );
        }

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            die(curl_getinfo($ch));
        }

        $info = curl_getinfo($ch);
        curl_close($ch);
        if ($binary == true) {
            fclose($fp);
        }

        $http_code = $info["http_code"];
        if ($http_code == 401) {
            // Användarnamnet eller lösenordet är felaktigt

        }
        if ($http_code == 403) {
            // Begärt data som det saknas åtkomst till

        }
        if ($http_code == 500) {
            // Oväntat fel, kontakta Vitec

        }
        if ($http_code == 400) {
            $json = json_decode($result, true);
            // Hantera valideringsfel, presenteras i $json
        }

        if ($binary == true) {
            return '/public/localfile.tmp';
        } else {
            return json_decode($result, true);
        }
    }

    /**
     * Updates internal property arrays from the Vitec API response.
     *
     * Sends a POST request to the Vitec GetEstateList endpoint using the configured
     * customer ID and API credentials. Filters data optionally by status ID.
     *
     * @param string $URL The endpoint URL to fetch data from.
     * @param int|null $status_id Optional status ID to filter properties by.
     * @return void
     * @since 1.2.4
     */
    function updateProperties($URL = "https://connect.maklare.vitec.net/Estate/GetEstateList", $status_id = null)
    {
        // Check if variables are not set do not execute the function and report to user
        if ($this->username == null || $this->password == null || $this->customer_id == null) {
            array_push($this->errors, '<h5 class="center"><strong>Please fill in your API credentials in administration
        settings!</strong></h5>');
            ob_start();
            include_once('partials/error.php');
            return ob_get_clean();
        }
        // If a status ID is given, use it in request; otherwise, default to "Till Salu" and "Kommande"
        if (!$status_id) {
            array_push($this->errors, '<h5 class="center"><strong>Status ID is required for this request.</strong></h5>');
            ob_start();
            include_once('partials/error.php');
            return ob_get_clean();
        }
        $status = '[{"id": "' . $status_id . '"}]';
        $request = '{
            "customerId":"' . $this->customer_id . '",
            "statuses":' . $status . ',
            "typeOfDate":0
            }';

        $data = $this->fetch($URL, $request);

        if (count($data) > 0) {
            $data = $data[0];
            // Available variables: $houses, $cottages, $housingCooperativeses, $plots, $projects, $farms, $condominiums, $foreignProperties, $premises
            $this->houses = $data["houses"];
            $this->cottages = $data["cottages"];
            $this->housingCooperativeses = $data["housingCooperativeses"];
            $this->plots = $data["plots"];
            $this->farms = $data["farms"];
            $this->condominiums = $data["condominiums"];
            $this->foreignProperties = $data["foreignProperties"];
            $this->premises = $data["premises"];
        }


    }

    function getStatuses($URL = "https://connect.maklare.vitec.net/Estate/GetStatuses")
    {
        // Check if variables are not set do not execute the function and report to user
        if ($this->username == null || $this->password == null || $this->customer_id == null) {
            array_push($this->errors, '<h5 class="center"><strong>Please fill in your API credentials in administration
        settings!</strong></h5>');
            ob_start();
            include_once('partials/error.php');
            return ob_get_clean();
        }

        $data = $this->fetch($URL);

        var_dump($data);
    }

    function getAgent($id)
    {

        $URL = "https://connect.maklare.vitec.net/User/GetUser?UserId=$id&CustomerId=$this->customer_id";

        return $this->fetch($URL);
    }

    function getFile($id, $extension = "pdf")
    {

        // Check if variables are not set do not execute the function and report to user
        if ($this->username == null || $this->password == null || $this->customer_id == null) {
            array_push($this->errors, '<h5 class="center"><strong>Please fill in your API credentials in administration
        settings!</strong></h5>');
            ob_start();
            include_once('/partials/error.php');
            return ob_get_clean();
        }

        $URL = "https://connect.maklare.vitec.net/File/GetFile?customerId=$this->customer_id&fileId=$id";

        $filename = "doc-" . $id . "-" . rand(100000, 999999) . '.' . $extension;
        $destination_path = plugin_dir_path(__FILE__) . '../documents/' . $filename;

        // Create directory if not exists
        if (!file_exists(plugin_dir_path(__FILE__) . '../documents/')) {
            mkdir(plugin_dir_path(__FILE__) . '../documents/', 0777, true);
        }

        $fp = fopen($destination_path, "w+");


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_USERNAME, "$this->username");
        curl_setopt($ch, CURLOPT_PASSWORD, "$this->password");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_FILE, $fp);

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            die(curl_getinfo($ch));
        }

        $info = curl_getinfo($ch);
        curl_close($ch);

        $http_code = $info["http_code"];
        if ($http_code == 401) {
            // Användarnamnet eller lösenordet är felaktigt
        }
        if ($http_code == 403) {
            // Begärt data som det saknas åtkomst till
        }
        if ($http_code == 500) {
            // Oväntat fel, kontakta Vitec
        }
        if ($http_code == 400) {
            $json = json_decode($result, true);
            // Hantera valideringsfel, presenteras i $json
        }

        fclose($fp);

        ob_start();
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($destination_path));

        ob_clean();
        ob_end_flush();

        return plugin_dir_url(__FILE__) . '../documents/' . $filename;

    }

    function getImage($id = null)
    {
        // Check if variables are not set do not execute the function and report to user
        if ($id == null || $this->username == null || $this->password == null || $this->customer_id == null) {
            array_push($this->errors, '<h5 class="center"><strong>Please fill in your API credentials in administration
        settings!</strong></h5>');
            ob_start();
            include_once('partials/error.php');
            return ob_get_clean();
        }
        $URL = "https://connect.maklare.vitec.net/Image/GetImage?customerId=$this->customer_id&imageId=$id";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_USERNAME, $this->username);
        curl_setopt($ch, CURLOPT_PASSWORD, $this->password);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $URL);

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            die(curl_getinfo($ch));
        }

        $info = curl_getinfo($ch);
        curl_close($ch);

        $http_code = $info["http_code"];
        if ($http_code == 401) {
            // Användarnamnet eller lösenordet är felaktigt
        }
        if ($http_code == 403) {
            // Begärt data som det saknas åtkomst till
        }
        if ($http_code == 500) {
            // Oväntat fel, kontakta Vitec
        }
        if ($http_code == 400) {
            $json = json_decode($result, true);
            // Hantera valideringsfel, presenteras i $json
            var_dump($json);
            return $this->placeholder;
        }


        // TODO: Gör något med resultatet

        $im = imagecreatefromstring($result);

        // imagedestroy($im);


        ob_start();

        imagejpeg($im);
        $image_data = ob_get_contents();

        ob_end_clean();

        return "data:image/jpeg;base64," . base64_encode($image_data);

    }

    function getHouse($id = null)
    {
        if ($id) {

            $URL =
                "https://connect.maklare.vitec.net/Estate/GetHouse?estateId=$id&customerId=$this->customer_id&onlyFutureViewings=False";

            return $this->fetch($URL);
        } else {
            return $this->houses;
        }
    }
    function getCottage($id = null)
    {
        if ($id) {

            $URL =
                "https://connect.maklare.vitec.net/Estate/GetCottage?estateId=$id&customerId=$this->customer_id&onlyFutureViewings=False";

            return $this->fetch($URL);
        } else {
            return $this->cottages;
        }
    }
    function getHousingCooperative($id = null)
    {
        if ($id) {

            $URL =
                "https://connect.maklare.vitec.net/Estate/GetHousingCooperative?estateId=$id&customerId=$this->customer_id&onlyFutureViewings=False";

            return $this->fetch($URL);
        } else {
            return $this->housingCooperativeses;
        }
    }

    function getPlot($id = null)
    {
        if ($id) {

            $URL =
                "https://connect.maklare.vitec.net/Estate/GetPlot?estateId=$id&customerId=$this->customer_id&onlyFutureViewings=False";

            return $this->fetch($URL);
        } else {
            return $this->plots;
        }
    }
    function getProject($id = null)
    {
        if ($id) {

            $URL =
                "https://connect.maklare.vitec.net/Estate/GetProject?estateId=$id&customerId=$this->customer_id&onlyFutureViewings=False";

            return $this->fetch($URL);
        } else {
            return $this->projects;
        }
    }
    function getFarm($id = null)
    {
        if ($id) {

            $URL =
                "https://connect.maklare.vitec.net/Estate/GetFarm?estateId=$id&customerId=$this->customer_id&onlyFutureViewings=False";

            return $this->fetch($URL);
        } else {
            return $this->farms;
        }
    }
    function getCondominium($id = null)
    {
        if ($id) {

            $URL =
                "https://connect.maklare.vitec.net/Estate/GetCondominium?estateId=$id&customerId=$this->customer_id&onlyFutureViewings=False";

            return $this->fetch($URL);
        } else {
            return $this->condominiums;
        }

    }
    function getForeignProperty($id = null)
    {
        if ($id) {

            $URL =
                "https://connect.maklare.vitec.net/Estate/GetForeignProperty?estateId=$id&customerId=$this->customer_id&onlyFutureViewings=False";

            return $this->fetch($URL);
        } else {
            return $this->foreignProperties;
        }

    }

    function getPremise($id = null)
    {
        if ($id) {

            $URL =
                "https://connect.maklare.vitec.net/Estate/GetPremises?estateId=$id&customerId=$this->customer_id&onlyFutureViewings=False";

            return $this->fetch($URL);
        } else {
            return $this->premises;
        }

    }
}

?>