# LoadBalancer

Main class of the project is `LoadBalancer\LoadBalancer`. As a parameters, constructor of this class takes an array of hosts and algorithm method (`LoadBalancer\LoadVariant\VariantTypeEnum`).
There are two algorithm variants:
* `LoadBalancer\LoadVariant\SequentialVariant`
* `LoadBalancer\LoadVariant\BalancedVariant`

Both variants are tested in `LoadBalancer\Tests\LoadBalancerTests` class - data is provided by `loadBalancerTestCases()` method.
Note that for test purposes each time a request is handled, host's load is increased by value from `$increaseLoadBy` property (given in constructor of test stub `LoadBalancer\Tests\Stubs\HostStub`).