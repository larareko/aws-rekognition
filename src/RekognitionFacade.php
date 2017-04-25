<?php

namespace Larareko\Rekognition;

use Illuminate\Support\Facades\Facade;

class RekognitionFacade extends Facade
{
    protected static function getFacadeAccessor() {
        return 'aws-rekognition';
    }
}