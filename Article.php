<?php  

/**
 * 
 */
class Article{

	private $id;
	private $title;
	private $content;
	private $create_at;
	private $author;
	private $url;

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

	public function getTitle(){
		return $this->title;
	}

	public function getContent(){
		return $this->content;
	}

	public function getCreate_at(){
		return $this->create_at;
	}

	public function getAuthor(){
		return $this->author;
	}

	public function getUrl(){
		return $this->url;
	}


	public function setId($id): Article{
		$this->id = $id;
		return $this;
	}

	public function setTitle($title): Article{
		$this->title = $title;
		return $this;
	}
	public function setContent($content): Article{
		$this->content = $content;
		return $this;
	}
	public function setCreate_at($create_at): Article{
		$this->create_at = $create_at;
		return $this;
	}
	public function setAuthor($author): Article{
		$this->author = $author;
		return $this;
	}

	public function setUrl($url): Article{
		$this->url = $url;
		return $this;
	}
	
}

?>