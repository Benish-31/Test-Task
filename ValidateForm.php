<?php
class ValidateForm
{
    public function validateForm($data, $fields)
    {
        $message = null;
        foreach ($fields as $value) {
            if (empty($data[$value])) {
                $message .= "$value field required <br />";
            }
        }
        return $message;
    }
}
