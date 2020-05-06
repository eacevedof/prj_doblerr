<?php
namespace App\Entity;

use App\Traits\Log;
use Doctrine\ORM\Mapping as ORM;

class BaseEntity
{
    use Log;
    /**
     * @var string|null
     * @ORM\Column(name="processflag", type="string", length=5, nullable=true, options={"default"="NULL"})
     */
    protected $processflag = null;

    /**
     * @var string|null
     * @ORM\Column(name="insert_platform", type="string", length=3, nullable=true, options={"default"="'1'"})
     */
    protected $insertPlatform = '1';

    /**
     * @var string|null
     * @ORM\Column(name="insert_user", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    protected $insertUser = null;

    /**
     * @var \DateTime|null
     * @ORM\Column(name="insert_date", type="datetime", nullable=true, options={"default"="NULL"})
     */
    protected $insertDate = null;

    /**
     * @var string|null
     * @ORM\Column(name="update_platform", type="string", length=3, nullable=true, options={"default"="NULL"})
     */
    protected $updatePlatform = null;

    /**
     * @var string|null
     * @ORM\Column(name="update_user", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    protected $updateUser = null;

    /**
     * @var \DateTime|null
     * @ORM\Column(name="update_date", type="datetime", nullable=true, options={"default"="NULL"})
     */
    protected $updateDate = null;

    /**
     * @var string|null
     * @ORM\Column(name="delete_platform", type="string", length=3, nullable=true, options={"default"="NULL"})
     */
    protected $deletePlatform = null;

    /**
     * @var string|null
     * @ORM\Column(name="delete_user", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    protected $deleteUser = null;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="delete_date", type="datetime", nullable=true, options={"default"="NULL"})
     */
    protected $deleteDate = null;

    /**
     * @var string|null
     * @ORM\Column(name="cru_csvnote", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    protected $cruCsvnote = null;

    /**
     * @var string|null
     * @ORM\Column(name="is_erpsent", type="string", length=3, nullable=true, options={"default"="'0'"})
     */
    protected $isErpsent = '0';

    /**
     * @var string|null
     * @ORM\Column(name="is_enabled", type="string", length=3, nullable=true, options={"default"="'1'"})
     */
    protected $isEnabled = '1';

    /**
     * @var int|null
     * @ORM\Column(name="i", type="integer", nullable=true, options={"default"="NULL"})
     */
    protected $i = null;

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
     * @ORM\Column(name="code_erp", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $codeErp = null;

    /**
     * @var string|null
     * @ORM\Column(name="description", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $description = null;
}