<?php 

namespace App\Lib\Traits;

trait CpfValidator
{
    public function validateCpf($cpf)
    {
        $isValid = false;
        $firstDigitResult = $this->validateFirstDigit($cpf);
        $secondDigitResult = $this->validateSecondDigit($cpf, $firstDigitResult);

        $origianlValidator = substr($cpf, 9, 2);
        $digitValidator = $firstDigitResult . '' . $secondDigitResult;

        if ($origianlValidator == $digitValidator) {
            $isValid = true;
        }
        
        return $isValid;
    }

    public function validateFirstDigit($cpf)
    {
        $firstNineDigts = str_split(substr($cpf, 0, 9));
        $sum = 0;

        $nineDigtsList = [];
        $index = 10;

        foreach ($firstNineDigts as $digit) {
            $nineDigtsList[$index] = $digit;
            $index--;
        }

        for ($i = 10; $i > 1; $i--) {
            $sum += $nineDigtsList[$i] * $i;
        }

        $firsDigitResult = $sum * 10;
        $firsDigitResult %= 11;

        return $firsDigitResult;
    }

    public function validateSecondDigit($cpf, $firstDigitResult)
    {
        $firstNineDigts = str_split(substr($cpf, 0, 9));
        $sum = 0;

        $nineDigtsList = [];
        $index = 11;

        foreach ($firstNineDigts as $digit) {
            $nineDigtsList[$index] = $digit;
            $index--;
        }
        $nineDigtsList[2] = $firstDigitResult;

        for ($i = 11; $i > 1; $i--) {
            $sum += $nineDigtsList[$i] * $i;
        }

        $secondDigitResult = $sum * 10;
        $secondDigitResult %= 11;

        return $secondDigitResult;
    }
}
