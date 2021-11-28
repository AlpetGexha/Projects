<?php

class User
{
    private $db,
        $data,
        $sessionName,
        $sessionRole,
        $isLogenIN;


    /** @var Username */
    public function __construct($user = null)
    {
        $this->db = DB::getDB();

        $this->sessionName = Config::get('session/sessionName');
        $this->sessionRole = Config::get('session/sessionRoles');

        /** Check if user is loggin */
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

    /** Find first username on DataBase */
    public function find(mixed $user = null)
    {
        if ($user) {
            // if user had a numeric return id else username
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

    /** Login */
    public function login(String $username = null, String $password = null)
    {
        // $user = ;
        //    echo "<pre>"; print_r($this->data);
        if ($this->find($username)) {
            if ($this->data()->password === Hash::make($password)) {
                // echo "Logged in";
                Session::put($this->sessionName, $this->data()->id);
                // Session::put($this->sessionRole,  $this->data()->role);
                return true;
            }
        }
        return false;
    }



    /** Create User */
    public function create(array $fields = array())
    {
        if (!$this->db->insert('users ', $fields)) {
            throw new Exception('Kishte nj&euml; problem me krijimin e k&euml;saj llogaris.');
        }
    }

    /** Update User  */
    public function update(array $fileds = array(), int $id = null)
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


    /** Check if user its loggin */
    public function isLoggendIn()
    {
        return $this->isLogenIN;
    }

    /** Check if this username exist on database */
    public function exist()
    {
        return (!empty($this->data)) ? true : false;
    }

    /** logout */
    public function logout()
    {
        Session::delete($this->sessionName);
        // Session::delete($this->sessionRole);
        Go::to('login');
    }

    /** Get all user data */
    public function data()
    {
        return $this->data;
    }
}
