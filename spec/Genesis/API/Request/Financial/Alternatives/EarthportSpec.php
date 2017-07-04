<?php

namespace spec\Genesis\API\Request\Financial\Alternatives;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EarthportSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Genesis\API\Request\Financial\Alternatives\Earthport');
    }

    public function it_can_build_structure()
    {
        $this->setRequestParameters();
        $this->getDocument()->shouldNotBeEmpty();
    }

    public function it_should_fail_when_no_parameters()
    {
        $this->shouldThrow()->during('getDocument');
    }

    public function it_should_fail_when_missing_required_parameters()
    {
        $this->setRequestParameters();
        $this->setAccountName(null);
        $this->setBankName(null);
        $this->shouldThrow()->during('getDocument');
    }

    public function it_should_fail_when_missing_bic_for_andorra()
    {
        $this->setRequestParameters();
        $this->setBillingCountry('AD');
        $this->setBic(null);
        $this->shouldThrow()->during('getDocument');
    }

    public function it_should_fail_when_missing_iban_for_andorra()
    {
        $this->setRequestParameters();
        $this->setBillingCountry('AD');
        $this->setIban(null);
        $this->shouldThrow()->during('getDocument');
    }

    public function it_should_fail_when_missing_account_number_for_australia()
    {
        $this->setRequestParameters();
        $this->setBillingCountry('AU');
        $this->setAccountNumber(null);
        $this->shouldThrow()->during('getDocument');
    }

    public function it_should_fail_when_missing_bank_code_for_australia()
    {
        $this->setRequestParameters();
        $this->setBillingCountry('AU');
        $this->setBankCode(null);
        $this->shouldThrow()->during('getDocument');
    }

    public function it_should_fail_when_missing_branch_code_for_australia()
    {
        $this->setRequestParameters();
        $this->setBillingCountry('AU');
        $this->setBranchCode(null);
        $this->shouldThrow()->during('getDocument');
    }

    public function it_should_fail_when_missing_account_number_for_egypt()
    {
        $this->setRequestParameters();
        $this->setBillingCountry('EG');
        $this->setAccountNumber(null);
        $this->shouldThrow()->during('getDocument');
    }

    public function it_should_fail_when_missing_bic_for_egypt()
    {
        $this->setRequestParameters();
        $this->setBillingCountry('EG');
        $this->setBic(null);
        $this->shouldThrow()->during('getDocument');
    }

    public function it_should_fail_when_missing_bank_code_for_hong_kong()
    {
        $this->setRequestParameters();
        $this->setBillingCountry('HK');
        $this->setBankCode(null);
        $this->shouldThrow()->during('getDocument');
    }

    public function it_should_fail_when_missing_branch_code_for_hong_kong()
    {
        $this->setRequestParameters();
        $this->setBillingCountry('HK');
        $this->setBranchCode(null);
        $this->shouldThrow()->during('getDocument');
    }

    public function it_should_fail_when_missing_account_number_for_hong_kong()
    {
        $this->setRequestParameters();
        $this->setBillingCountry('HK');
        $this->setAccountNumber(null);
        $this->shouldThrow()->during('getDocument');
    }

    public function it_should_fail_when_missing_account_number_suffix_for_hong_kong()
    {
        $this->setRequestParameters();
        $this->setBillingCountry('HK');
        $this->setAccountNumberSuffix(null);
        $this->shouldThrow()->during('getDocument');
    }

    public function it_should_fail_when_unsupported_billing_country_parameter()
    {
        $this->setRequestParameters();
        $this->setBillingCountry('ZZ');
        $this->shouldThrow()->during('getDocument');
    }

    public function it_should_fail_when_unsupported_currency_parameter()
    {
        $this->setRequestParameters();
        $this->setCurrency('ABC');

        $this->shouldThrow()->during('getDocument');
    }

    protected function setRequestParameters()
    {
        $faker = \Faker\Factory::create();

        $faker->addProvider(new \Faker\Provider\en_US\Person($faker));
        $faker->addProvider(new \Faker\Provider\Payment($faker));
        $faker->addProvider(new \Faker\Provider\en_US\Address($faker));
        $faker->addProvider(new \Faker\Provider\en_US\PhoneNumber($faker));
        $faker->addProvider(new \Faker\Provider\Internet($faker));

        $this->setTransactionId($faker->numberBetween(1, PHP_INT_MAX));

        $this->setUsage('Genesis PHP Client Automated Request');
        $this->setRemoteIp($faker->ipv4);
        $this->setCurrency('EUR');
        $this->setAmount($faker->numberBetween(1, PHP_INT_MAX));
        $this->setCustomerEmail($faker->email);
        $this->setCustomerPhone($faker->phoneNumber);

        $this->setAccountNumber($faker->numberBetween(1, 16));
        $this->setAccountName($faker->firstName . ' ' . $faker->lastName);
        $this->setBankName('Deutsche Bank');
        $this->setBankCode('0000');
        $this->setBranchCode('0000');
        $this->setBic('BOFAGB3SSWI');
        $this->setIban('DE12345678901234567890');
        $this->setAccountNumberSuffix($faker->numberBetween(1, 16));
        $this->setSortCode($faker->numberBetween(1, 16));
        $this->setAbaRoutingNumber($faker->numberBetween(1, 16));

        $this->setBillingFirstName($faker->firstName);
        $this->setBillingLastName($faker->lastName);
        $this->setBillingAddress1($faker->streetAddress);
        $this->setBillingZipCode($faker->postcode);
        $this->setBillingCity($faker->city);
        $this->setBillingState($faker->state);
        $this->setBillingCountry('AD');
    }

    public function getMatchers()
    {
        return array(
            'beEmpty' => function ($subject) {
                return empty($subject);
            },
        );
    }
}
