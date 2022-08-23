<?php declare(strict_types=1);

namespace App\Entity;

final class Post {
	private $id;
	private $titre;
	private $chapo;
	private $image;
	private $date;
	private $dateModification;

	/**
	 * @param $id
	 * @param $titre
	 * @param $chapo
	 * @param $image
	 * @param $date
	 * @param $dateModification
	 */
	public function __construct($id, $titre, $chapo, $image, $date, $dateModification) {
		$this->id = $id;
		$this->titre = $titre;
		$this->chapo = $chapo;
		$this->image = $image;
		$this->date = $date;
		$this->dateModification = $dateModification;
	}

	public function id() {
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id): void {
		$this->id = $id;
	}

	public function titre() {
		return $this->titre;
	}

	/**
	 * @param mixed $titre
	 */
	public function setTitre($titre): void {
		$this->titre = $titre;
	}

	public function chapo() {
		return $this->chapo;
	}

	/**
	 * @param mixed $chapo
	 */
	public function setChapo($chapo): void {
		$this->chapo = $chapo;
	}

	public function image() {
		return $this->image;
	}

	/**
	 * @param mixed $image
	 */
	public function setImage($image): void {
		$this->image = $image;
	}

	public function date() {
		return $this->date;
	}

	/**
	 * @param mixed $date
	 */
	public function setDate($date): void {
		$this->date = $date;
	}

	public function dateModification() {
		return $this->dateModification;
	}

	/**
	 * @param mixed $dateModification
	 */
	public function setDateModification($dateModification): void {
		$this->dateModification = $dateModification;
	}

}
