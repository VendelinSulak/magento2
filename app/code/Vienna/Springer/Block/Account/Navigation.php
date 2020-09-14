<?php


namespace Vienna\Springer\Block\Account;


use Magento\Customer\Block\Account\SortLinkInterface;

class Navigation extends \Magento\Customer\Block\Account\Navigation
{
    /**
     * @return array|\Magento\Framework\View\Element\Html\Link[]|void
     */
    public function getLinks() {

        var_dump('tu2');
        die('tu');
    }
}
