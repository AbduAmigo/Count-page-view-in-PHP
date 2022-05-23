public function index()
{

    // used for deduct the current users's view on home page
    @$this->db->insert('table_name', $this->input->ip_address());

    // used to get the browser
    $browser_type = $this->_get_browser_name($_SERVER['HTTP_USER_AGENT']);
    if($browser_type){
    // used for deduct the current users's view on home page
    if(!isset($_SESSION['page_views']['some_unique_string']))
    {
        $_SESSION['page_views']['some_unique_string'] = true;
        // update your database
        @$this->db->insert('table_name', array('Browser_Type' => $browser_type, 'IP_Address' => $ip_address));
        }
    } 
    $this->load->view('index', $data);
}

// used to get the browser
private function _get_browser_name($user_agent)
{
    if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
    elseif (strpos($user_agent, 'Edge')) return 'Edge';
    elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
    elseif (strpos($user_agent, 'Safari')) return 'Safari';
    elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
    elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';

    return 'Other';
}
