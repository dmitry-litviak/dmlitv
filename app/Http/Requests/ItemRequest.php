<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ItemRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rules =  [
			'title' => 'required|min:3',
			'en_description' => 'required|min:6',
			'ru_description' => 'required|min:6',
			'image'	=> 'image|mimes:png,jpeg|max:5000',
//			'pictures' => 'required|array',
			'link'	=> 'required'
		];

//		$nbr = count($this->input('pictures')) - 1;
//		foreach(range(0, $nbr) as $index) {
//			$rules['pictures.' . $index] = 'image|mimes:png,jpeg|max:5000';
//		}

		return $rules;
	}

}
