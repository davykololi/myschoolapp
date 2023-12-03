<?php

namespace App\Enums;

enum StudentsEnum :  string{
	case OS = 'ordinarystudent';
	case SL = 'studentleader';
	case DSL = 'deputystudentleader';
	case SP = 'streamprefect';
	case ASP = 'assistantstreamprefect';
	case TK = 'timekeeper';
}