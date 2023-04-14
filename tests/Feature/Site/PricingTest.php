<?php

namespace Tests\Feature\Site;

use Tests\TestCase;

class PricingTest extends TestCase
{
    public function test_pricing_page_can_be_displayed(): void
    {
        $response = $this->get(route('site.pricing'));

        $response->assertOk();
    }
}
