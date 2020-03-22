<?php

class Receivepaymenttodeposit extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    protected $txnID;

    /**
     *
     * @var string
     */
    protected $txnLineID;

    /**
     *
     * @var string
     */
    protected $txnType;

    /**
     *
     * @var string
     */
    protected $customerRef_ListID;

    /**
     *
     * @var string
     */
    protected $customerRef_FullName;

    /**
     *
     * @var string
     */
    protected $txnDate;

    /**
     *
     * @var string
     */
    protected $refNumber;

    /**
     *
     * @var double
     */
    protected $amount;

    /**
     *
     * @var string
     */
    protected $currencyRef_ListID;

    /**
     *
     * @var string
     */
    protected $currencyRef_FullName;

    /**
     *
     * @var double
     */
    protected $exchangeRate;

    /**
     *
     * @var double
     */
    protected $amountInHomeCurrency;

    /**
     *
     * @var string
     */
    protected $status;

    /**
     * Method to set the value of field TxnID
     *
     * @param string $txnID
     * @return $this
     */
    public function setTxnID($txnID)
    {
        $this->txnID = $txnID;

        return $this;
    }

    /**
     * Method to set the value of field TxnLineID
     *
     * @param string $txnLineID
     * @return $this
     */
    public function setTxnLineID($txnLineID)
    {
        $this->txnLineID = $txnLineID;

        return $this;
    }

    /**
     * Method to set the value of field TxnType
     *
     * @param string $txnType
     * @return $this
     */
    public function setTxnType($txnType)
    {
        $this->txnType = $txnType;

        return $this;
    }

    /**
     * Method to set the value of field CustomerRef_ListID
     *
     * @param string $customerRef_ListID
     * @return $this
     */
    public function setCustomerRefListID($customerRef_ListID)
    {
        $this->customerRef_ListID = $customerRef_ListID;

        return $this;
    }

    /**
     * Method to set the value of field CustomerRef_FullName
     *
     * @param string $customerRef_FullName
     * @return $this
     */
    public function setCustomerRefFullName($customerRef_FullName)
    {
        $this->customerRef_FullName = $customerRef_FullName;

        return $this;
    }

    /**
     * Method to set the value of field TxnDate
     *
     * @param string $txnDate
     * @return $this
     */
    public function setTxnDate($txnDate)
    {
        $this->txnDate = $txnDate;

        return $this;
    }

    /**
     * Method to set the value of field RefNumber
     *
     * @param string $refNumber
     * @return $this
     */
    public function setRefNumber($refNumber)
    {
        $this->refNumber = $refNumber;

        return $this;
    }

    /**
     * Method to set the value of field Amount
     *
     * @param double $amount
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Method to set the value of field CurrencyRef_ListID
     *
     * @param string $currencyRef_ListID
     * @return $this
     */
    public function setCurrencyRefListID($currencyRef_ListID)
    {
        $this->currencyRef_ListID = $currencyRef_ListID;

        return $this;
    }

    /**
     * Method to set the value of field CurrencyRef_FullName
     *
     * @param string $currencyRef_FullName
     * @return $this
     */
    public function setCurrencyRefFullName($currencyRef_FullName)
    {
        $this->currencyRef_FullName = $currencyRef_FullName;

        return $this;
    }

    /**
     * Method to set the value of field ExchangeRate
     *
     * @param double $exchangeRate
     * @return $this
     */
    public function setExchangeRate($exchangeRate)
    {
        $this->exchangeRate = $exchangeRate;

        return $this;
    }

    /**
     * Method to set the value of field AmountInHomeCurrency
     *
     * @param double $amountInHomeCurrency
     * @return $this
     */
    public function setAmountInHomeCurrency($amountInHomeCurrency)
    {
        $this->amountInHomeCurrency = $amountInHomeCurrency;

        return $this;
    }

    /**
     * Method to set the value of field Status
     *
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Returns the value of field txnID
     *
     * @return string
     */
    public function getTxnID()
    {
        return $this->txnID;
    }

    /**
     * Returns the value of field txnLineID
     *
     * @return string
     */
    public function getTxnLineID()
    {
        return $this->txnLineID;
    }

    /**
     * Returns the value of field txnType
     *
     * @return string
     */
    public function getTxnType()
    {
        return $this->txnType;
    }

    /**
     * Returns the value of field customerRef_ListID
     *
     * @return string
     */
    public function getCustomerRefListID()
    {
        return $this->customerRef_ListID;
    }

    /**
     * Returns the value of field customerRef_FullName
     *
     * @return string
     */
    public function getCustomerRefFullName()
    {
        return $this->customerRef_FullName;
    }

    /**
     * Returns the value of field txnDate
     *
     * @return string
     */
    public function getTxnDate()
    {
        return $this->txnDate;
    }

    /**
     * Returns the value of field refNumber
     *
     * @return string
     */
    public function getRefNumber()
    {
        return $this->refNumber;
    }

    /**
     * Returns the value of field amount
     *
     * @return double
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Returns the value of field currencyRef_ListID
     *
     * @return string
     */
    public function getCurrencyRefListID()
    {
        return $this->currencyRef_ListID;
    }

    /**
     * Returns the value of field currencyRef_FullName
     *
     * @return string
     */
    public function getCurrencyRefFullName()
    {
        return $this->currencyRef_FullName;
    }

    /**
     * Returns the value of field exchangeRate
     *
     * @return double
     */
    public function getExchangeRate()
    {
        return $this->exchangeRate;
    }

    /**
     * Returns the value of field amountInHomeCurrency
     *
     * @return double
     */
    public function getAmountInHomeCurrency()
    {
        return $this->amountInHomeCurrency;
    }

    /**
     * Returns the value of field status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("mecanica");
        $this->setSource("receivepaymenttodeposit");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'receivepaymenttodeposit';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Receivepaymenttodeposit[]|Receivepaymenttodeposit|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Receivepaymenttodeposit|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
