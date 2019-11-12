<?php
namespace Sirius\Validation\Rule;

class NotMatch extends Match
{
    const MESSAGE = 'This input does match {item}';
    const LABELED_MESSAGE = '{label} does match {item}';

    public function validate($value, $valueIdentifier = null)
    {
        parent::validate($value, $valueIdentifier);
        $this->success = ! $this->success;

        return $this->success;
    }
}
