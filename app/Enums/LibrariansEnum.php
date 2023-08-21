<?php

namespace App\Enums;

enum LibrariansEnum :  string{
	case SL = 'seniorlibrarian';
	case ASL = 'assistantseniorlibrarian';
	case LA = 'libraryauditor';
	case OL = 'ordinarylibrarian';
}