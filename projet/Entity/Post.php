<?php declare(strict_types=1);

namespace App\Entity;

final class Post {
	private $id;
	private $titre;
	private $chapo;
	public $img;
	private $date_mjr;
	private $date_modif;
    private $id_user;

    /**
     * @return mixed
     */
    public function getId(): int
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
    public function getTitre(): String
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getChapo(): String
    {
        return $this->chapo;
    }

    /**
     * @param mixed $chapo
     */
    public function setChapo(string $chapo): void
    {
        $this->chapo = $chapo;
    }

    /**
     * @return mixed
     */
    public function getImg(): String
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg(string $img): void
    {
        $this->img = $img;
    }

    /**
     * @return mixed
     */
    public function getDateMjr(): String
    {
        return $this->date_mjr;
    }

    /**
     * @param mixed $date_mjr
     */
    public function setDateMjr(string $date_mjr): void
    {
        $this->date_mjr = $date_mjr;
    }

    /**
     * @return mixed
     */
    public function getDateModif(): String
    {
        return $this->date_modif;
    }

    /**
     * @param mixed $date_modif
     */
    public function setDateModif(string $date_modif): void
    {
        $this->date_modif = $date_modif;
    }

    /**
     * @return mixed
     */
    public function getIdUser(): int
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser(int $id_user): void
    {
        $this->id_user = $id_user;
    }


}
