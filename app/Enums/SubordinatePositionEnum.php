<?php

namespace App\Enums;

enum SubordinatePositionEnum :  string{
	case SS = 'School Secretary';
	case SC = 'Senior Cook';
	case OC = 'Ordinary Cook';
	case SSCRTY = 'Senior Security';
	case OSCRTY = 'Ordinary Security';
	case GDNR = 'Gardener';
	case SE = 'School Electrician';
	case TS = 'Tea Server';
}