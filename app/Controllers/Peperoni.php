<?php namespace App\Controllers;
use App\Models\UserPeperoni;
class Peperoni extends BaseController
{
	public function loginForm()
	{
		return view('auths/login');
	}
	
	public function listPizza()
	{	
		$data = [
			'name'=>'lyka',
			'price'=>4000,
			'ingredient'=>'potato,age'
		];
		$peperoni = new UserPeperoni();
		// $peperoni->insert($data);
		$allPizza['pizzaData'] = $peperoni->findAll();
		return view('index',$allPizza);
	}
	
   //delete pizza
   
	public function deletePizza($id)
	{	
		$peperoni = new UserPeperoni();
		$peperoni->delete($id);
		return redirect()->to('/pizza');
	}
}

