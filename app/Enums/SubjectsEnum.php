<?php

namespace App\Enums;

enum SubjectsEnum :  string{
	case MATHS = 'Mathematics';
	case ENG = 'English';
	case KISW = 'Kiswahili';
	case CHEM = 'Chemistry';
	case BIO = 'Biology';
	case PHY = 'Physics';
	case CRE = 'CRE';
	case ISLM = 'Islam';
	case HISTANDGOV = 'History And Government';
	case GEOG = 'Geography';
	case HOMESC = 'Home Science';
	case ARTDSGN = 'Art And Design';
	case AGRIC = 'Agriculture';
	case BUZSTRDS = 'Business Studies';
	case COMPSTRDS = 'Computer Studies';
	case DRWNDGN = 'Drawing And Design';
	case FRNCH = 'French';
	case GRMN = 'German';
	case ARBC = 'Arabic';
	case SGNLANG = 'Sign Language';
	case MSC = 'Music';
	case WDWK = 'Wood Work';
	case MTWK = 'Metal Work';
	case BUILDCON = 'Building Construction';
	case PWRMC = 'Power Mechanics';
	case ELEC = 'Electricity';
	case AVTEC = 'Aviation Technology';
}