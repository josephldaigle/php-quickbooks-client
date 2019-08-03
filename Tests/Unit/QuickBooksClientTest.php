<?php
/**
 * Created by Joseph Daigle.
 * Date: 2019-08-02
 * Time: 21:23
 */

namespace JoeDaCo\QuickBooks\Test\Unit;


use JoeDaCo\QuickBooks\QuickBooksClient;
use PHPUnit\Framework\TestCase;


class QuickBooksClientTest extends TestCase
{
    public function testCanInstantiateQuickBooksClient()
    {
        $clientInstance = new QuickBooksClient('www.quickbooks-oauth.com','123Abc','Donttellanyone','www.yourdomain.com/quickbooks-auth', ['com.intuit.quickbooks.accounting', 'openid', 'profile', 'email', 'phone address']);

        $this->assertInstanceOf(QuickBooksClient::class, $clientInstance);
    }


}