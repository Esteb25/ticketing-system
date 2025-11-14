<?php
class User_model extends CI_Model {
    protected $table = 'users';

    public function __construct()
    {
        parent::__construct();
    }
    
    public function validate_user($username, $password)
    {
        $this->db->where('username like binary', $username);
        $this->db->where('password like binary', $password);
        return $this->db->get($this->table ,1);
    }
}