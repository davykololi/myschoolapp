<?php

namespace App\Enums;

enum StaffsEnum :  string{
	case SS = 'schoolsecretary';
	case SC = 'seniorcook';
	case OC = 'ordinarycook';
	case SSCRTY = 'seniorsecurity';
	case OSCRTY = 'ordinarysecurity';
	case GDNR = 'gardener';
	case SE = 'schoolelectrician';
	case TS = 'teaserver';
}