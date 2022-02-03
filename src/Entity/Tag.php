<?php

namespace App\Entity;

use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TagRepository::class)
 */
class Tag
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tag;

    /**
     * @ORM\ManyToMany(targetEntity=Blogpost::class, mappedBy="tag")
     */
    private $blogposts;

    public function __construct()
    {
        $this->blogposts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function setTag(string $tag): self
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * @return Collection|Blogpost[]
     */
    public function getBlogposts(): Collection
    {
        return $this->blogposts;
    }

    public function addBlogpost(Blogpost $blogpost): self
    {
        if (!$this->blogposts->contains($blogpost)) {
            $this->blogposts[] = $blogpost;
            $blogpost->addTag($this);
        }

        return $this;
    }

    public function removeBlogpost(Blogpost $blogpost): self
    {
        if ($this->blogposts->removeElement($blogpost)) {
            $blogpost->removeTag($this);
        }

        return $this;
    }
}
