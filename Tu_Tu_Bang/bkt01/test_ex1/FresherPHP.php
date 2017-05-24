<?php
class FresherPHP
{
    private $first_name;
    private $middle_name;
    private $last_name;
    private $birth_day;
    private $phone_number;
    private $fresherPhp = array();
    function __construct($fresherPhp) {
        foreach ($fresherPhp as $key => $value)
        {
            $this->setFirstName($key[0]);
            $this->setMiddleName($key[1]);
            $this->setLastName($key[2]);
            $this->setBirthDay($key[3]);
            $this->setPhoneNumber($key[4]);
        }
    }

    function getFullName($fresherPhp){
        foreach ($fresherPhp as $key => $value){
            $fullName = ucfirst($value['first_name'])." ".ucfirst($value['middle_name'])." ".ucfirst($value['last_name']);
        }
        return $fullName;
    }

    function caculAge($fresherPhp)
    {
        foreach ($fresherPhp as $key => $value)
        {
            $yearStudent = substr($value['birth_day'],6,4);
            $age = 2017 - $yearStudent;
        }
        return $age;
    }

    function getNameNhaMang($fresherPhp) {
        foreach ($fresherPhp as $key => $value)
        {
            $nameNhaMang = "";
            $nameThreeNumber = substr($value['phone_number'],0,3);
            $nameFourNumber = substr($value['phone_number'],0,4);
            if ($nameThreeNumber == '098' || $nameThreeNumber== '097' || $nameThreeNumber == '096' || $nameFourNumber == '0169' || $nameFourNumber == '0168' ||
            $nameFourNumber == '0167' || $nameFourNumber == '0166' || $nameFourNumber == '0165' || $nameFourNumber == '0164' || $nameFourNumber = '0163' || $nameFourNumber == '0162')
            {
                $nameNhaMang = "Viettel";
            }
            else if ($nameThreeNumber == '091' || $nameThreeNumber == '094' || $nameFourNumber == '0123' || $nameFourNumber == '0124' || $nameFourNumber == '0125'
                || $nameFourNumber == '0127' || $nameFourNumber == '0129')
            {
                $nameNhaMang = "Vinaphone";
            }
            else if ($nameThreeNumber =='090' || $nameThreeNumber == '093' || $nameFourNumber == '0120' || $nameFourNumber == '0121' || $nameFourNumber == '0122' || $nameFourNumber == '0126'
                || $nameFourNumber == '0128')
            {
                $nameNhaMang = "Mobiphone";
            }
        }
        return $nameNhaMang;
    }
    /**
     * @return mixed
     */
    public function getFirstName() {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name) {
        $this->first_name = trim($first_name);
    }

    /**
     * @return mixed
     */
    public function getMiddleName() {
        return $this->middle_name;
    }

    /**
     * @param mixed $middle_name
     */
    public function setMiddleName($middle_name) {
        $this->middle_name = trim($middle_name);
    }

    /**
     * @return mixed
     */
    public function getLastName() {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name) {
        $this->last_name = trim($last_name);
    }

    /**
     * @return mixed
     */
    public function getBirthDay() {
        return $this->birth_day;
    }

    /**
     * @param mixed $birth_day
     */
    public function setBirthDay($birth_day) {
        $this->birth_day = $birth_day;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber() {
        return $this->phone_number;
    }

    /**
     * @param mixed $phone_number
     */
    public function setPhoneNumber($phone_number) {
        $this->phone_number = $phone_number;
    }

    /**
     * @return array
     */
    public function getFresherPhp() {
        return $this->fresherPhp;
    }

    /**
     * @param array $fresherPhp
     */
    public function setFresherPhp($fresherPhp) {
        $this->fresherPhp = $fresherPhp;
    }
}
$fresherPhp = array(
    [
        'first_name' => 'thieu',
        'middle_name' => 'nguyen',
        'last_name' => 'van',
        'birth_day' => '01-06-1991',
        'phone_number' => '01679593418'
    ]
);
$fresher = new FresherPHP($fresherPhp);

echo "Ten day du: ". ($fresher->getFullName($fresherPhp)).'<br>';
echo "Tuoi: ". ($fresher->caculAge($fresherPhp)).'<br>';
echo "Nha mang: ".($fresher->getNameNhaMang($fresherPhp));