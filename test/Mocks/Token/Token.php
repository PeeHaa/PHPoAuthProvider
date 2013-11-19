<?php

namespace PHPoAuthProviderTest\Mocks\Token;

use PHPoAuthProvider\Token\Token as AbstractToken;
use PHPoAuthProvider\Token\Validatable;

class Token extends AbstractToken implements Validatable
{
    public function isValid($token)
    {
        return $this->doesTokenMatch($token);
    }
}
