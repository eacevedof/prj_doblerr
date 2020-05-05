<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="base_user", uniqueConstraints={@ORM\UniqueConstraint(name="base_user_email_uindex", columns={"email"})})
 * @ORM\Entity
 */
class User extends BaseEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

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
     * @ORM\Column(name="insert_date", type="datetime", nullable=true, options={"default"="current_timestamp()"})
     */
    private $insertDate = 'current_timestamp()';

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
     * @ORM\Column(name="update_date", type="datetime", nullable=true, options={"default"="current_timestamp()"})
     */
    private $updateDate = 'current_timestamp()';

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




}
