<?php
class Template {
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }

    /** 
     * Load template with header, navigation & footer
     * @param string $view - main content
     * @param string $data - data to pass the view
    */
    public function render_view($view, $data = [])
    {
        $this->ci->load->view('layouts/header', $data);
        $this->ci->load->view($view, $data);
        $this->ci->load->view('layouts/footer', $data);
    }
}