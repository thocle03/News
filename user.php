<?php  

/**
 * 
 */
class User{

	private $id;
	private $username;
	private $password;
	private $email;

	public function __construct(array $donnees){
		
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }


	public function getId() {
		return $this->id;
	}

	public function getUsername(){
		return $this->username;
	}

	public function getPassword(){
		return $this->password;
	}

	public function getEmail(){
		return $this->email;
	}


	public function setId($id): User{
		$this->id = $id;
		return $this;
	}

	public function setUsername($username): User{
		$this->username = $username;
		return $this;
	}
	public function setPassword($password): User{
		$this->password = $password;
		return $this;
	}
	public function setEmail($email): User{
		$this->email = $email;
		return $this;
	}
	
}

?>