<?php

namespace Iyzipay\Tests\Model\Mapper\Subscription;

use Iyzipay\Model\Mapper\Subscription\SubscriptionDetailsResourceMapper;
use Iyzipay\Model\Subscription\SubscriptionDetails;
use Iyzipay\Tests\TestCase;

class SubscriptionDetailsResourceMapperTest extends TestCase
{
    public function test_should_map_subscription_details_resource_mapper()
    {
        $json = $this->retrieveJsonFile("subscription_details_check.json");
        $details = SubscriptionDetailsResourceMapper::create($json)->jsonDecode()->mapSubscriptionDetails(new SubscriptionDetails());

        $this->assertNotEmpty($details);
        $this->assertEquals("1562181133652", $details->getCreatedDate());
        $this->assertEquals("15ec47d6-ce4c-455f-8bdb-80284f040e1a", $details->getCustomerReferenceCode());
        $this->assertEquals("7b38e400-aafc-4208-8e06-e5983f0c9c09", $details->getParentReferenceCode());
        $this->assertEquals("5179abff-c866-45df-b65e-55b2cd416772", $details->getPricingPlanReferenceCode());
        $this->assertEquals("91ea71d2-3951-4c89-9ec5-b814fccfe729", $details->getReferenceCode());
        $this->assertEquals("65553a2c-79b6-4471-aab1-e941e25a836d", $details->getProductReferenceCode());
        $this->assertEquals("product name", $details->getProductName());
        $this->assertEquals("pricing plan name", $details->getPricingPlanName());
        $this->assertEquals("test@iyzico.com", $details->getCustomerEmail());
        $this->assertEquals("array", $details->getOrders());
        $this->assertEquals("1562181133651", $details->getStartDate());
        $this->assertEquals("1562181133651", $details->getEndDate());
        $this->assertEquals("ACTIVE", $details->getSubscriptionStatus());
        $this->assertEquals("30", $details->getTrialDays());
        $this->assertEquals("1564773133651", $details->getTrialEndDate());
        $this->assertEquals("1562181133651", $details->getTrialStartDate());
        $this->assertEquals("success", $details->getStatus());
        $this->assertEquals(null, $details->getErrorCode());
        $this->assertEquals(null, $details->getErrorMessage());
        $this->assertEquals(null, $details->getErrorGroup());
        $this->assertEquals("1562181133687", $details->getSystemTime());
        $this->assertJson($details->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $details->getRawResult());
    }

}