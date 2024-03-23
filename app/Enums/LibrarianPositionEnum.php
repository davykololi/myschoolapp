<?php

namespace App\Enums;

enum LibrarianPositionEnum :  string{
	case SL = 'Senior Librarian';
	case ASL = 'Deputy Senior Librarian';
	case LA = 'Library Auditor';
	case OL = 'Ordinary Librarian';
}