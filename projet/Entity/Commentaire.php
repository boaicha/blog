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
    public function getId():int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCommentaire(): String
    {
        return $this->commentaire;
    }

    /**
     * @param mixed $commentaire
     */
    public function setCommentaire(string $commentaire): void
    {
        $this->commentaire = $commentaire;
    }

    /**
     * @return mixed
     */
    public function getDate(): String
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getIdUserc(): int
    {
        return $this->id_userc;
    }

    /**
     * @param mixed $id_userc
     */
    public function setIdUserc(int $id_userc): void
    {
        $this->id_userc = $id_userc;
    }

    /**
     * @return mixed
     */
    public function getIdPostc(): int
    {
        return $this->id_postc;
    }

    /**
     * @param mixed $id_postc
     */
    public function setIdPostc(int $id_postc): void
    {
        $this->id_postc = $id_postc;
    }

    /**
     * @return mixed
     */
    public function getVerification(): String
    {
        return $this->verification;
    }

    /**
     * @param mixed $verification
     */
    public function setVerification(string $verification): void
    {
        $this->verification = $verification;
    }

	public function getUserName(): string {
		return $this->userName;
	}

	/**
	 * @param mixed $userName
	 */
	public function setUserName(string $userName): void {
		$this->userName = $userName;
	}


}
