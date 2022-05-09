<?php  

/**
 * 
 */
class Comment{

	private $id;
	private $title;
	private $content;
	private $create_at;
	private $author;
	private $article_id;

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
	public function getArticle_id(){
		return $this->article_id;
	}

	public function setId($id): Comment{
		$this->id = $id;
		return $this;
	}

	public function setTitle($title): Comment{
		$this->title = $title;
		return $this;
	}
	public function setContent($content): Comment{
		$this->content = $content;
		return $this;
	}
	public function setCreate_at($create_at): Comment{
		$this->create_at = $create_at;
		return $this;
	}
	public function setAuthor($author): Comment{
		$this->author = $author;
		return $this;
	}
	public function setArticle_id($article_id): Comment{
		$this->article_id = $article_id;
		return $this;
	}

}

?>