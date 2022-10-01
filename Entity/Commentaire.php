<?php

namespace App\Entity;

class Commentaire {
    private $id;
    private $commentaire;
    private $date;
    private $id_userc;
    private $id_postc;
    private $verification;
	private $userName;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * @param mixed $commentaire
     */
    public function setCommentaire($commentaire): void
    {
        $this->commentaire = $commentaire;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getIdUserc()
    {
        return $this->id_userc;
    }

    /**
     * @param mixed $id_userc
     */
    public function setIdUserc($id_userc): void
    {
        $this->id_userc = $id_userc;
    }

    /**
     * @return mixed
     */
    public function getIdPostc()
    {
        return $this->id_postc;
    }

    /**
     * @param mixed $id_postc
     */
    public function setIdPostc($id_postc): void
    {
        $this->id_postc = $id_postc;
    }

    /**
     * @return mixed
     */
    public function getVerification()
    {
        return $this->verification;
    }

    /**
     * @param mixed $verification
     */
    public function setVerification($verification): void
    {
        $this->verification = $verification;
    }

	public function getUserName() {
		return $this->userName;
	}

	/**
	 * @param mixed $userName
	 */
	public function setUserName($userName): void {
		$this->userName = $userName;
	}


}
