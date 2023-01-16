<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	use HasFactory;

	//状態定義
	const STATUS = [
		1 => [ 'label' => '未着手', 'class' => 'label-danger' ],
		2 => [ 'label' => '着手中', 'class' => 'label-info'],
		3 => [ 'label' => '完了', 'class' => ''],
	];	


	public function getStatusLabelAttribute()
	{
		//状態値
		$status = $this->attributes['status'];

		//未定義は空文字を返す
		if(!isset(self::STATUS[$status])){
			return '';
		}

		return self::STATUS[$status]['label'];
			
	}


	public function getStatusClassAttribute()
	{

		//状態値
		$status = $this->attributes['status'];

		//未定義の値には空文字を返す
		if(!isset(self::STATUS[$status])){

			return '';

		}

		return self::STATUS[$status]['class'];
	
	}


}