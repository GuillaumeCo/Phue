<?php

namespace Phue;

/**
 * Condition object
 */
class ConfigLocaltimeCondition extends Condition
{
    /**
     * Operator: In
     */
    const OPERATOR_IN = 'in';

    /**
     * Import from API response
     *
     * @param \stdClass $condition
     *            Condition values
     *
     * @return self This object
     */
    public function import(\stdClass $condition)
    {
        $this->setOperator((string) $condition->operator);
        isset($condition->value) && $this->setValue((string) $condition->value);
        
        return $this;
    }

    /**
     * Export for API request
     *
     * @return \stdClass Result object
     */
    public function export()
    {
        $result = array(
            'address' => '/config/localtime',
            'operator' => $this->getOperator()
        );
        
        if ($this->value !== null) {
            $result['value'] = $this->getValue();
        }
        
        return (object) $result;
    }

    /**
     * Set operator to equals
     *
     * @return self This object
     */
    public function in()
    {
        $this->operator = self::OPERATOR_IN;
        
        return $this;
    }
}
