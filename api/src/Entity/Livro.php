<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\LivroRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: LivroRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['livro:read']],
    order: ['titulo' => 'ASC']
)]
#[ApiFilter(SearchFilter::class)]
#[ApiFilter(OrderFilter::class)]
class Livro
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "codl")]
    #[Groups(["livro:read"])]
    private ?int $id = null;

    #[ORM\Column(name: "Titulo", length: 40)]
    #[Groups(["livro:read"])]
    private ?string $titulo = null;

    #[ORM\Column(name: "Editora", length: 40, nullable: true)]
    #[Groups(["livro:read"])]
    private ?string $editora = null;

    #[ORM\Column(name: "Edicao", nullable: true)]
    #[Groups(["livro:read"])]
    private ?int $edicao = null;

    #[ORM\Column(name: "AnoPublicacao", length: 4, nullable: true)]
    #[Groups(["livro:read"])]
    private ?string $anoPublicacao = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    #[Groups(["livro:read"])]
    private ?string $valor = null;

    /**
     * @var Collection<int, Autor>
     */
    #[ORM\ManyToMany(targetEntity: Autor::class, inversedBy: 'livros')]
    #[ORM\JoinColumn(name: 'Livro_Codl', referencedColumnName: 'codl')]
    #[ORM\InverseJoinColumn(name: 'Autor_CodAu', referencedColumnName: 'codAu')]
    #[Groups(["livro:read"])]
    private Collection $autors;

    /**
     * @var Collection<int, Assunto>
     */
    #[ORM\ManyToMany(targetEntity: Assunto::class, inversedBy: 'livros')]
    #[ORM\JoinColumn(name: 'Livro_Codl', referencedColumnName: 'codl')]
    #[ORM\InverseJoinColumn(name: 'Assunto_CodAs', referencedColumnName: 'codAs')]
    #[Groups(["livro:read"])]
    private Collection $assuntos;

    public function __construct()
    {
        $this->autors = new ArrayCollection();
        $this->assuntos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): static
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getEditora(): ?string
    {
        return $this->editora;
    }

    public function setEditora(?string $editora): static
    {
        $this->editora = $editora;

        return $this;
    }

    public function getEdicao(): ?int
    {
        return $this->edicao;
    }

    public function setEdicao(?int $edicao): static
    {
        $this->edicao = $edicao;

        return $this;
    }

    public function getAnoPublicacao(): ?string
    {
        return $this->anoPublicacao;
    }

    public function setAnoPublicacao(?string $anoPublicacao): static
    {
        $this->anoPublicacao = $anoPublicacao;

        return $this;
    }

    public function getValor(): ?string
    {
        return $this->valor;
    }

    public function setValor(?string $valor): static
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * @return Collection<int, Autor>
     */
    public function getAutors(): Collection
    {
        return $this->autors;
    }

    public function addAutor(Autor $autor): static
    {
        if (!$this->autors->contains($autor)) {
            $this->autors->add($autor);
        }

        return $this;
    }

    public function removeAutor(Autor $autor): static
    {
        $this->autors->removeElement($autor);

        return $this;
    }

    /**
     * @return Collection<int, Assunto>
     */
    public function getAssuntos(): Collection
    {
        return $this->assuntos;
    }

    public function addAssunto(Assunto $assunto): static
    {
        if (!$this->assuntos->contains($assunto)) {
            $this->assuntos->add($assunto);
        }

        return $this;
    }

    public function removeAssunto(Assunto $assunto): static
    {
        $this->assuntos->removeElement($assunto);

        return $this;
    }
}
