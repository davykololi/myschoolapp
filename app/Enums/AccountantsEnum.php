<?php

namespace App\Enums;

enum AccountantsEnum :  string{
	case SA = 'senioraccountant';
	case DSA = 'deputysenioraccountant';
	case AA = 'accountsauditor';
	case OA = 'ordinaryaccountant';
}