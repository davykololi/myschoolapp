<?php

namespace App\Enums;

enum AccountantPositionEnum :  string{
	case SA = 'Senior Accountant';
	case DSA = 'Deputy Senior Accountant';
	case AA = 'Accounts Auditor';
	case OA = 'Ordinary Accountant';
}