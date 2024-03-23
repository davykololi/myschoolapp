<?php

namespace App\Enums;

enum AdminPositionEnum :  string{
	case SA = 'Senior Admin';
	case DSA = 'Deputy Senior Admin';
	case SR = 'Student Registrar';
	case AR = 'Academic Registrar';
	case ER = 'Exam Registrar';
	case OA = 'Ordinary Admin';
	case ACAD = 'Accounts Admin';
	case LIBAD = 'Library Admin';
	case DATOFF = 'Data Officer';
}