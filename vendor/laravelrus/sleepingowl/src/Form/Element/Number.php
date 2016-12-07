<?php

namespace SleepingOwl\Admin\Form\Element;

class Number extends NamedFormElement
{
    /**
     * @var int
     */
    protected $min;

    /**
     * @var int
     */
    protected $max;

    /**
     * @var int
     */
    protected $step;

    /**
     * @return int
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @param int $min
     *
     * @return $this
     */
    public function setMin($min)
    {
        $this->min = (int) $min;

        return $this;
    }

    /**
     * @return int
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @param int $max
     *
     * @return $this
     */
    public function setMax($max)
    {
        $this->max = (int) $max;

        return $this;
    }

    /**
     * @return string
     */
    public function getStep()
    {
        return $this->step;
    }

    /**
     * @param int $step
     *
     * @return $this
     */
    public function setStep($step)
    {
        $this->step = (int) $step;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return parent::toArray() + [
            'min' => $this->getMin(),
            'max' => $this->getMax(),
            'step' => $this->getStep(),
        ];
    }

    /**
     * @param mixed $value
     *
     * @return null|int
     */
    protected function prepareValue($value)
    {
        if ($value == '') {
            return;
        }

        return (int) $value;
    }
}
