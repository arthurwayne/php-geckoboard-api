<?php

namespace CarlosIO\Geckoboard\Data;

use CarlosIO\Geckoboard\Data\Point\SizeOutOfBoundsException;

/**
 * Class Point.
 */
class Point
{
    /**
     * @var string
     */
    protected $cityName;

    /**
     * @var string
     */
    protected $countryCode;

    /**
     * @var int
     */
    protected $size;

    /**
     * @var string
     */
    protected $color;

    /**
     * @var string
     */
    protected $cssClass;

    /**
     * @var string
     */
    protected $latitude;

    /**
     * @var string
     */
    protected $longitude;

    public function __construct()
    {
        $this->cityName = null;
        $this->countryCode = null;
        $this->size = null;
        $this->color = null;
        $this->cssClass = null;
        $this->latitude = null;
        $this->longitude = null;
    }

    /**
     * @param $latitude
     *
     * @return $this
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param $longitude
     *
     * @return $this
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param $cityName
     *
     * @return $this
     */
    public function setCityName($cityName)
    {
        $this->cityName = $cityName;

        return $this;
    }

    /**
     */
    public function getCityName()
    {
        return $this->cityName;
    }

    /**
     * @param $color
     *
     * @return $this
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param $countryCode
     *
     * @return $this
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param $cssClass
     *
     * @return $this
     */
    public function setCssClass($cssClass)
    {
        $this->cssClass = $cssClass;

        return $this;
    }

    /**
     */
    public function getCssClass()
    {
        return $this->cssClass;
    }

    /**
     * @param $size
     *
     * @throws Point\SizeOutOfBoundsException
     *
     * @return $this
     */
    public function setSize($size)
    {
        $size = abs((int) $size);
        if ($size < 1 || $size > 10) {
            throw new SizeOutOfBoundsException('Map point size should be between 1 and 10');
        }

        $this->size = $size;

        return $this;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $result = array();
        $cityData = array();

        $cityName = $this->getCityName();
        if (null !== $cityName) {
            $cityData['city_name'] = $cityName;
        }

        $countryCode = $this->getCountryCode();
        if (null !== $countryCode) {
            $cityData['country_code'] = $countryCode;
        }

        if (!empty($cityData)) {
            $result['city'] = $cityData;
        }

        $latitude = $this->getLatitude();
        if (null !== $latitude) {
            $result['latitude'] = $latitude;
        }

        $longitude = $this->getLongitude();
        if (null !== $longitude) {
            $result['longitude'] = $longitude;
        }

        $size = $this->getSize();
        if (null !== $size) {
            $result['size'] = $size;
        }

        $color = $this->getColor();
        if (null !== $color) {
            $result['color'] = $color;
        }

        $cssClass = $this->getCssClass();
        if (null !== $cssClass) {
            $result['cssclass'] = $cssClass;
        }

        return $result;
    }
}
