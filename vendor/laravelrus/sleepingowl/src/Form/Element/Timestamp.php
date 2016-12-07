<?php

namespace SleepingOwl\Admin\Form\Element;

use Carbon\Carbon;

class Timestamp extends DateTime
{
    /**
     * @var bool
     */
    protected $seconds = true;

    /**
     * @return $this|NamedFormElement|mixed|null|string
     */
    public function getValue()
    {
        $value = parent::getValue();

        if (empty($value)) {
            $value = Carbon::now()->format($this->getFormat());
        }

        return $value;
    }
}
