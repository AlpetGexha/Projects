<?php
class Validation
{
    private $errors = array(),
        $passed = false,
        $db = null;



    public function __construct()
    {
        $this->db = DB::getDB();
    }

    public function check($source, $items = array())
    {
        foreach ($items as $item => $rules) {
            foreach ($rules as $rule => $rule_value) {
                // echo "{$item} {$rule} duhet te jete {$rule_value} <br/>";

                $value = $source[$item]; //$source = _POST/+_GET $values = _POST['username']
                $item = escape($item);

                if ($rule === 'req' && empty($value)) {
                    $this->addError("{$item} is required");
                } else if (!empty($value)) {
                    switch ($rule) {
                        case 'min':
                            if (strlen($value) < $rule_value) {
                                $this->addError("{$item} duhet t&euml; jet&euml; minimum {$rule_value} karaktereve.");
                            }
                            break;
                        case 'max':
                            if (strlen($value) > $rule_value) {
                                $this->addError("{$item} mund t&euml; jet&euml; vet&euml;m {$rule_value} karaktereve.");
                            }
                            break;
                        case 'match':
                            if ($value != $source[$rule_value]) {
                                $this->addError("{$rule_value} must match {$item}.");
                            }
                            break;
                        case 'uniq':
                            $check = $this->db->get($rule_value, array($item, '=', $value));
                            if ($check->count()) {
                                $this->addError("{$item} tashm&euml; ekziston.");
                            }
                            break;
                        case 'email':
                            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                                $this->addError("{$item} nuk &euml;sht&euml; valid.");
                            }
                            break;
                    }
                }
            }
        }


        if (empty($this->errors)) {
            $this->passed = true;
        }
        return $this;
    }

    private function addError($error)
    {
        $this->errors[] = $error;
    }

    public function errors()
    {
        return $this->errors;
    }

    public function passed()
    {
        return $this->passed;
    }

    public function getError()
    {
        foreach ($this->errors() as $error) {
            echo '<p style="color: #8B0000;">' . $error . ' </p>';
        }
    }
}
