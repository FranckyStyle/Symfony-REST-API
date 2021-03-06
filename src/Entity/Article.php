<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
#[ApiResource(normalizationContext:["groups"=>["read"]],
              denormalizationContext:["groups"=>["write"]]
)]


class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[groups(["read"])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[groups(["read","write"])]
    private $title;

    #[ORM\Column(type: 'string', length: 255)]
    #[groups(["read"])]
    private $slug;

    #[ORM\Column(type: 'text', length: 255, nullable: true)]
    #[groups(["read","write"])]
    private $content;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[groups(["read","write"])]
    private $picture;

    #[ORM\Column(type: 'boolean')]
    #[groups(["read"])]
    private $isPublished;

    #[ORM\Column(type: 'datetime', nullable: true)]
    #[groups(["read"])]
    private $publishedAt;

    #[ORM\Column(type: 'datetime', nullable:true)]
    #[groups(["read"])]
    private $updatedAt;

    
    #[ORM\Column(type: 'datetime',nullable:true)]
    #[Groups(["read"])]
    private $createdAt;

    public function __construct()
    {
        $this->isPublished = false;
        $this->createdAt = new \DateTime();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getIsPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): self
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeInterface
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(?\DateTimeInterface $publishedAt): self
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
