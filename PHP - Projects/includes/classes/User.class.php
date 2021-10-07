<?php

class User
{
    private $db,
        $data,
        $sessionName,
        $sessionRole,
        $isLogenIN;


    public function __construct($user = null)
    {
        $this->db = DB::getDB();

        $this->sessionName = Config::get('session/sessionName');
        $this->sessionRole = Config::get('session/sessionRoles');


        if (!$user) {
            if (Session::exist($this->sessionName)) {
                $user = Session::get($this->sessionName);
                // echo $user;

                if ($this->find($user)) {
                    $this->isLogenIN = true;
                } else {
                    //Logout
                }
            } else {
                $this->find($user);
            }
        }
    }

    //Find first username on DB where userid = $user 
    public function find($user = null)
    {
        if ($user) {
            // if user had a numeric username this FAILS...
            $field = (is_numeric($user)) ? 'id' : 'username';
            $data = $this->db->get('users', array($field, '=', $user));

            //get first user result
            if ($data->count()) {
                $this->data = $data->firstResult();
                return true;
            }
        }
        return false;
    }

    //login 
    public function login($username = null, $password = null)
    {
        $user = $this->find($username);
        //    echo "<pre>"; print_r($this->data);
        if ($user) {
            if ($this->data()->password === Hash::make($password));
            // echo "Logged in";
            Session::put($this->sessionName, $this->data()->id);
            Session::put($this->sessionRole,  $this->data()->role);
            return true;
        }
    }



    //krijo usernamin
    public function create($fields = array())
    {
        if (!$this->db->insert('users', $fields)) {
            throw new Exception('Kishte nj&euml; problem me krijimin e k&euml;saj llogaris.');
        }
    }

    //update user 
    public function update($fileds = array(), $id = null)
    {
        if (!$id && $this->isLoggendIn()) {
            $id = $this->data()->id;
        }

        if (!$this->db->update('users', $id, $fileds)) {
            throw new Exception('Kishte nj&euml; problem me updatin e llogaris');
        }
    }


    public function hasRole()
    {
    }


    //check if user its loggin
    public function isLoggendIn()
    {
        return $this->isLogenIN;
    }

    //check if this username exist on database
    public function exist()
    {
        return (!empty($this->data)) ? true : false;
    }

    //logout
    public function logout()
    {
        Session::delete($this->sessionName);
        Session::delete($this->sessionRole);
        Go::to('login.php');
    }

    //give data
    public function data()
    {
        return $this->data;
    }
}
