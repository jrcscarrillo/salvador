<?php

class Receivepayment extends \Phalcon\Mvc\Model {

    protected $TxnID;
    protected $TimeCreated;
    protected $TimeModified;
    protected $EditSequence;
    protected $TxnNumber;
    protected $CustomerRef_ListID;
    protected $CustomerRef_FullName;
    protected $ARAccountRef_ListID;
    protected $ARAccountRef_FullName;
    protected $TxnDate;
    protected $RefNumber;
    protected $TotalAmount;
    protected $CurrencyRef_ListID;
    protected $CurrencyRef_FullName;
    protected $ExchangeRate;
    protected $TotalAmountInHomeCurrency;
    protected $PaymentMethodRef_ListID;
    protected $PaymentMethodRef_FullName;
    protected $Memo;
    protected $DepositToAccountRef_ListID;
    protected $DepositToAccountRef_FullName;
    protected $UnusedPayment;
    protected $UnusedCredits;
    protected $SalesRepRef_ListID;
    protected $SalesRepRef_FullName;
    protected $CheckDate;
    protected $CheckBank;
    protected $CheckNumber;
    protected $CheckAmount;
    protected $DepositNumber;
    protected $DepositBank;
    protected $DepositTotalAmount;
    protected $CustomField8;
    protected $CustomField9;
    protected $CustomField10;
    protected $CustomField11;
    protected $CustomField12;
    protected $CustomField13;
    protected $CustomField14;
    protected $CustomField15;
    protected $Status;

// **********************
// GETTER METHODS
// **********************


    function getTxnID() {
        return $this->TxnID;
    }

    function getTimeCreated() {
        return $this->TimeCreated;
    }

    function getTimeModified() {
        return $this->TimeModified;
    }

    function getEditSequence() {
        return $this->EditSequence;
    }

    function getTxnNumber() {
        return $this->TxnNumber;
    }

    function getCustomerRefListID() {
        return $this->CustomerRef_ListID;
    }

    function getCustomerRefFullName() {
        return $this->CustomerRef_FullName;
    }

    function getARAccountRefListID() {
        return $this->ARAccountRef_ListID;
    }

    function getARAccountRefFullName() {
        return $this->ARAccountRef_FullName;
    }

    function getTxnDate() {
        return $this->TxnDate;
    }

    function getRefNumber() {
        return $this->RefNumber;
    }

    function getTotalAmount() {
        return $this->TotalAmount;
    }

    function getCurrencyRefListID() {
        return $this->CurrencyRef_ListID;
    }

    function getCurrencyRefFullName() {
        return $this->CurrencyRef_FullName;
    }

    function getExchangeRate() {
        return $this->ExchangeRate;
    }

    function getTotalAmountInHomeCurrency() {
        return $this->TotalAmountInHomeCurrency;
    }

    function getPaymentMethodRefListID() {
        return $this->PaymentMethodRef_ListID;
    }

    function getPaymentMethodRefFullName() {
        return $this->PaymentMethodRef_FullName;
    }

    function getMemo() {
        return $this->Memo;
    }

    function getDepositToAccountRefListID() {
        return $this->DepositToAccountRef_ListID;
    }

    function getDepositToAccountRefFullName() {
        return $this->DepositToAccountRef_FullName;
    }

    function getUnusedPayment() {
        return $this->UnusedPayment;
    }

    function getUnusedCredits() {
        return $this->UnusedCredits;
    }

    function getSalesRepRefListID() {
        return $this->SalesRepRef_ListID;
    }

    function getSalesRepRefFullName() {
        return $this->SalesRepRef_FullName;
    }

    function getCheckDate() {
        return $this->CheckDate;
    }

    function getCheckBank() {
        return $this->CheckBank;
    }

    function getCheckNumber() {
        return $this->CheckNumber;
    }

    function getCheckAmount() {
        return $this->CheckAmount;
    }

    function getDepositNumber() {
        return $this->DepositNumber;
    }

    function getDepositBank() {
        return $this->DepositBank;
    }

    function getDepositTotalAmount() {
        return $this->DepositTotalAmount;
    }

    function getCustomField8() {
        return $this->CustomField8;
    }

    function getCustomField9() {
        return $this->CustomField9;
    }

    function getCustomField10() {
        return $this->CustomField10;
    }

    function getCustomField11() {
        return $this->CustomField11;
    }

    function getCustomField12() {
        return $this->CustomField12;
    }

    function getCustomField13() {
        return $this->CustomField13;
    }

    function getCustomField14() {
        return $this->CustomField14;
    }

    function getCustomField15() {
        return $this->CustomField15;
    }

    function getStatus() {
        return $this->Status;
    }

// **********************
// SETTER METHODS
// **********************


    function setTxnID($val) {
        $this->TxnID = $val;
    }

    function setTimeCreated($val) {
        $this->TimeCreated = $val;
    }

    function setTimeModified($val) {
        $this->TimeModified = $val;
    }

    function setEditSequence($val) {
        $this->EditSequence = $val;
    }

    function setTxnNumber($val) {
        $this->TxnNumber = $val;
    }

    function setCustomerRefListID($val) {
        $this->CustomerRef_ListID = $val;
    }

    function setCustomerRefFullName($val) {
        $this->CustomerRef_FullName = $val;
    }

    function setARAccountRefListID($val) {
        $this->ARAccountRef_ListID = $val;
    }

    function setARAccountRefFullName($val) {
        $this->ARAccountRef_FullName = $val;
    }

    function setTxnDate($val) {
        $this->TxnDate = $val;
    }

    function setRefNumber($val) {
        $this->RefNumber = $val;
    }

    function setTotalAmount($val) {
        $this->TotalAmount = $val;
    }

    function setCurrencyRefListID($val) {
        $this->CurrencyRef_ListID = $val;
    }

    function setCurrencyRefFullName($val) {
        $this->CurrencyRef_FullName = $val;
    }

    function setExchangeRate($val) {
        $this->ExchangeRate = $val;
    }

    function setTotalAmountInHomeCurrency($val) {
        $this->TotalAmountInHomeCurrency = $val;
    }

    function setPaymentMethodRefListID($val) {
        $this->PaymentMethodRef_ListID = $val;
    }

    function setPaymentMethodRefFullName($val) {
        $this->PaymentMethodRef_FullName = $val;
    }

    function setMemo($val) {
        $this->Memo = $val;
    }

    function setDepositToAccountRefListID($val) {
        $this->DepositToAccountRef_ListID = $val;
    }

    function setDepositToAccountRefFullName($val) {
        $this->DepositToAccountRef_FullName = $val;
    }

    function setUnusedPayment($val) {
        $this->UnusedPayment = $val;
    }

    function setUnusedCredits($val) {
        $this->UnusedCredits = $val;
    }

    function setSalesRepRefListID($val) {
        $this->SalesRepRef_ListID = $val;
    }

    function setSalesRepRefFullName($val) {
        $this->SalesRepRef_FullName = $val;
    }

    function setCheckDate($val) {
        $this->CheckDate = $val;
    }

    function setCheckBank($val) {
        $this->CheckBank = $val;
    }

    function setCheckNumber($val) {
        $this->CheckNumber = $val;
    }

    function setCheckAmount($val) {
        $this->CheckAmount = $val;
    }

    function setDepositNumber($val) {
        $this->DepositNumber = $val;
    }

    function setDepositBank($val) {
        $this->DepositBank = $val;
    }

    function setDepositTotalAmount($val) {
        $this->DepositTotalAmount = $val;
    }

    function setCustomField8($val) {
        $this->CustomField8 = $val;
    }

    function setCustomField9($val) {
        $this->CustomField9 = $val;
    }

    function setCustomField10($val) {
        $this->CustomField10 = $val;
    }

    function setCustomField11($val) {
        $this->CustomField11 = $val;
    }

    function setCustomField12($val) {
        $this->CustomField12 = $val;
    }

    function setCustomField13($val) {
        $this->CustomField13 = $val;
    }

    function setCustomField14($val) {
        $this->CustomField14 = $val;
    }

    function setCustomField15($val) {
        $this->CustomField15 = $val;
    }

    function setStatus($val) {
        $this->Status = $val;
    }

    /**
     * Initialize method for model.
     */
    public function initialize() {
        $this->setSchema("mecanica");
        $this->setSource("receivepayment");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'receivepayment';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Receivepayment[]|Receivepayment|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Receivepayment|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

}
