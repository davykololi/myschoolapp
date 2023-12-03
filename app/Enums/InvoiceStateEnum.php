<?php

namespace App\Enums;

class InvoiceStateEnum extends Enum 
{ 
	public function getColour(): string 
	{ 
		return match($this->value){ 
			self::PENDING => 'orange', 
			self::PAID => 'green', 
			default => 'grey', 
		}; 
	} 
}
