<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="base_user", uniqueConstraints={@ORM\UniqueConstraint(name="base_user_email_uindex", columns={"email"})})
 * @ORM\Entity
 */
class User extends BaseEntity implements UserInterface
{
    /**
     *
     * @ORM\OneToMany(targetEntity="App\Entity\App\Task", mappedBy="user")
     */
    private $tasks;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="processflag", type="string", length=5, nullable=true, options={"default"="NULL"})
     */
    private $processflag = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="insert_platform", type="string", length=3, nullable=true, options={"default"="'1'"})
     */
    private $insertPlatform = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="insert_user", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $insertUser = null;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="insert_date", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $insertDate = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="update_platform", type="string", length=3, nullable=true, options={"default"="NULL"})
     */
    private $updatePlatform = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="update_user", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $updateUser = null;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="update_date", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $updateDate = null;

    /**
     * @return string|null
     */
    public function getProcessflag(): ?string
    {
        return $this->processflag;
    }

    /**
     * @param string|null $processflag
     * @return User
     */
    public function setProcessflag(?string $processflag): User
    {
        $this->processflag = $processflag;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInsertPlatform(): ?string
    {
        return $this->insertPlatform;
    }

    /**
     * @param string|null $insertPlatform
     * @return User
     */
    public function setInsertPlatform(?string $insertPlatform): User
    {
        $this->insertPlatform = $insertPlatform;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInsertUser(): ?string
    {
        return $this->insertUser;
    }

    /**
     * @param string|null $insertUser
     * @return User
     */
    public function setInsertUser(?string $insertUser): User
    {
        $this->insertUser = $insertUser;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getInsertDate(): ?\DateTime
    {
        return $this->insertDate;
    }

    /**
     * @param \DateTime|null $insertDate
     * @return User
     */
    public function setInsertDate(?\DateTime $insertDate): User
    {
        $this->insertDate = $insertDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUpdatePlatform(): ?string
    {
        return $this->updatePlatform;
    }

    /**
     * @param string|null $updatePlatform
     * @return User
     */
    public function setUpdatePlatform(?string $updatePlatform): User
    {
        $this->updatePlatform = $updatePlatform;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUpdateUser(): ?string
    {
        return $this->updateUser;
    }

    /**
     * @param string|null $updateUser
     * @return User
     */
    public function setUpdateUser(?string $updateUser): User
    {
        $this->updateUser = $updateUser;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdateDate(): ?\DateTime
    {
        return $this->updateDate;
    }

    /**
     * @param \DateTime|null $updateDate
     * @return User
     */
    public function setUpdateDate(?\DateTime $updateDate): User
    {
        $this->updateDate = $updateDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDeletePlatform(): ?string
    {
        return $this->deletePlatform;
    }

    /**
     * @param string|null $deletePlatform
     * @return User
     */
    public function setDeletePlatform(?string $deletePlatform): User
    {
        $this->deletePlatform = $deletePlatform;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDeleteUser(): ?string
    {
        return $this->deleteUser;
    }

    /**
     * @param string|null $deleteUser
     * @return User
     */
    public function setDeleteUser(?string $deleteUser): User
    {
        $this->deleteUser = $deleteUser;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDeleteDate(): ?\DateTime
    {
        return $this->deleteDate;
    }

    /**
     * @param \DateTime|null $deleteDate
     * @return User
     */
    public function setDeleteDate(?\DateTime $deleteDate): User
    {
        $this->deleteDate = $deleteDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCruCsvnote(): ?string
    {
        return $this->cruCsvnote;
    }

    /**
     * @param string|null $cruCsvnote
     * @return User
     */
    public function setCruCsvnote(?string $cruCsvnote): User
    {
        $this->cruCsvnote = $cruCsvnote;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIsErpsent(): ?string
    {
        return $this->isErpsent;
    }

    /**
     * @param string|null $isErpsent
     * @return User
     */
    public function setIsErpsent(?string $isErpsent): User
    {
        $this->isErpsent = $isErpsent;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIsEnabled(): ?string
    {
        return $this->isEnabled;
    }

    /**
     * @param string|null $isEnabled
     * @return User
     */
    public function setIsEnabled(?string $isEnabled): User
    {
        $this->isEnabled = $isEnabled;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getI(): ?int
    {
        return $this->i;
    }

    /**
     * @param int|null $i
     * @return User
     */
    public function setI(?int $i): User
    {
        $this->i = $i;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCodeErp(): ?string
    {
        return $this->codeErp;
    }

    /**
     * @param string|null $codeErp
     * @return User
     */
    public function setCodeErp(?string $codeErp): User
    {
        $this->codeErp = $codeErp;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return User
     */
    public function setDescription(?string $description): User
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     * @return User
     */
    public function setPhone(?string $phone): User
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     * @return User
     */
    public function setAddress(?string $address): User
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAge(): ?bool
    {
        return $this->age;
    }

    /**
     * @param bool|null $age
     * @return User
     */
    public function setAge(?bool $age): User
    {
        $this->age = $age;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getGeoLocation(): ?string
    {
        return $this->geoLocation;
    }

    /**
     * @param string|null $geoLocation
     * @return User
     */
    public function setGeoLocation(?string $geoLocation): User
    {
        $this->geoLocation = $geoLocation;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getIdGender(): ?int
    {
        return $this->idGender;
    }

    /**
     * @param int|null $idGender
     * @return User
     */
    public function setIdGender(?int $idGender): User
    {
        $this->idGender = $idGender;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getIdNationality(): ?int
    {
        return $this->idNationality;
    }

    /**
     * @param int|null $idNationality
     * @return User
     */
    public function setIdNationality(?int $idNationality): User
    {
        $this->idNationality = $idNationality;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getIdCountry(): ?int
    {
        return $this->idCountry;
    }

    /**
     * @param int|null $idCountry
     * @return User
     */
    public function setIdCountry(?int $idCountry): User
    {
        $this->idCountry = $idCountry;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getIdLanguage(): ?int
    {
        return $this->idLanguage;
    }

    /**
     * @param int|null $idLanguage
     * @return User
     */
    public function setIdLanguage(?int $idLanguage): User
    {
        $this->idLanguage = $idLanguage;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPathPicture(): ?string
    {
        return $this->pathPicture;
    }

    /**
     * @param string|null $pathPicture
     * @return User
     */
    public function setPathPicture(?string $pathPicture): User
    {
        $this->pathPicture = $pathPicture;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTokenreset(): ?string
    {
        return $this->tokenreset;
    }

    /**
     * @param string|null $tokenreset
     * @return User
     */
    public function setTokenreset(?string $tokenreset): User
    {
        $this->tokenreset = $tokenreset;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getLogAttempts(): ?int
    {
        return $this->logAttempts;
    }

    /**
     * @param int|null $logAttempts
     * @return User
     */
    public function setLogAttempts(?int $logAttempts): User
    {
        $this->logAttempts = $logAttempts;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRating(): ?int
    {
        return $this->rating;
    }

    /**
     * @param int|null $rating
     * @return User
     */
    public function setRating(?int $rating): User
    {
        $this->rating = $rating;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDateValidated(): ?string
    {
        return $this->dateValidated;
    }

    /**
     * @param string|null $dateValidated
     * @return User
     */
    public function setDateValidated(?string $dateValidated): User
    {
        $this->dateValidated = $dateValidated;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCodeCache(): ?string
    {
        return $this->codeCache;
    }

    /**
     * @param string|null $codeCache
     * @return User
     */
    public function setCodeCache(?string $codeCache): User
    {
        $this->codeCache = $codeCache;
        return $this;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="delete_platform", type="string", length=3, nullable=true, options={"default"="NULL"})
     */
    private $deletePlatform = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="delete_user", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $deleteUser = null;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="delete_date", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $deleteDate = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cru_csvnote", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $cruCsvnote = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="is_erpsent", type="string", length=3, nullable=true, options={"default"="'0'"})
     */
    private $isErpsent = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="is_enabled", type="string", length=3, nullable=true, options={"default"="'1'"})
     */
    private $isEnabled = '1';

    /**
     * @var int|null
     *
     * @ORM\Column(name="i", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $i = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="code_erp", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $codeErp = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $description = null;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $password = null;

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $phone = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fullname", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $fullname = null;

    /**
     * @param string|null $fullname
     */
    public function setFullname(?string $fullname): void
    {
        $this->fullname = $fullname;
    }

    /**
     * @return string|null
     */
    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="address", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $address = null;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="age", type="boolean", nullable=true, options={"default"="NULL"})
     */
    private $age = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="geo_location", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $geoLocation = null;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_gender", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idGender = null;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_nationality", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idNationality = null;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_country", type="integer", nullable=true, options={"default"="NULL","comment"="app_array.type=country"})
     */
    private $idCountry = null;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_language", type="integer", nullable=true, options={"default"="NULL","comment"="su idioma de preferencia"})
     */
    private $idLanguage = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="path_picture", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $pathPicture = null;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_profile", type="integer", nullable=true, options={"default"="NULL","comment"="app_array.type=profile: user,maintenaince,system"})
     */
    private $idProfile = null;

    /**
     * @return int|null
     */
    public function getIdProfile(): ?int
    {
        return $this->idProfile;
    }

    /**
     * @param int|null $idProfile
     * @return User
     */
    public function setIdProfile(?int $idProfile): User
    {
        $this->idProfile = $idProfile;
        return $this;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="tokenreset", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $tokenreset = null;

    /**
     * @var int|null
     *
     * @ORM\Column(name="log_attempts", type="integer", nullable=true)
     */
    private $logAttempts = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="rating", type="integer", nullable=true, options={"default"="NULL","comment"="la puntuacion"})
     */
    private $rating = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date_validated", type="string", length=14, nullable=true, options={"default"="NULL","comment"="cuando valido su cuenta por email"})
     */
    private $dateValidated = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="code_cache", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $codeCache = null;


    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return ["ROLE_$this->idProfile"];
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
        ;
    }

    /**
     * @return Collection|Task[]
     */
    public function getTasks():Collection
    {
        return $this->tasks;
    }
}
