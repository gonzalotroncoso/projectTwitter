<?php 
namespace App\Exceptions;
use App\Entry;
use Exception;

class InvalidEntrySlugException extends Exception{
	public function __construct(Entry $entry,$message="",$code=0, Throwable $previous = null){
		$this->entry = $entry;
		parent::__construct($message,$code,$previous);
	}

	public function render(){
		return redirect()->route('entries.show',$this->entry->slug.'-'.$this->entry->id);
	}

}
 ?>