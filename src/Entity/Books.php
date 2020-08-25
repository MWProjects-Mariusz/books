<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Books
 *
 * @ORM\Table(name="books", indexes={@ORM\Index(name="fk_books_categories_idx", columns={"categories_category_id"})})
 * @ORM\Entity
 */
class Books
{
    /**
     * @var int
     *
     * @ORM\Column(name="book_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $bookId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="book_name", type="string", length=45, nullable=true)
     */
    private $bookName;

    /**
     * @var \Categories
     *
     * @ORM\ManyToOne(targetEntity="Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categories_category_id", referencedColumnName="category_id")
     * })
     */
    private $categoriesCategory;

    public function getBookId(): ?int
    {
        return $this->bookId;
    }

    public function getBookName(): ?string
    {
        return $this->bookName;
    }

    public function setBookName(?string $bookName): self
    {
        $this->bookName = $bookName;

        return $this;
    }

    public function getCategoriesCategory(): ?Categories
    {
        return $this->categoriesCategory;
    }

    public function setCategoriesCategory(?Categories $categoriesCategory): self
    {
        $this->categoriesCategory = $categoriesCategory;

        return $this;
    }


}
