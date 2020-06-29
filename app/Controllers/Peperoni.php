<?php namespace App\Controllers;
use App\Models\UserPeperoni;
class Peperoni extends BaseController
{

	public function loginForm()
	{
		return view('auths/login');
	}
	
	public function register()
	{	
		return view('auths/register');
	}

	public function listPizza()
	{	
		
		$user = new UserPeperoni();
		$allPizza['pizzaData'] = $user->findAll();
		return view('index',$allPizza);
	}

	public function addPizza()
	{	
		// $data = [];
		if($this->request->getMethod() == "post"){
		helper(['form']);
		// $rules = [
		// 'name'=>'required',
		// 'price'=>'required|min_length[1]|max_length[50]',
		// 'ingredient'=>'required',

		// ];
		$pizzaModel = new UserPeperoni();
		$pizzaName = $this->request->getVar('name');
		$pizzaPrice = $this->request->getVar('price')."$";
		$pizzaIngredient = $this->request->getVar('ingredient');
		$pizzaData = array(
		'name'=>$pizzaName,
		'price'=>$pizzaPrice,
		'ingredient'=>$pizzaIngredient
		);
		$pizzaModel->insert($pizzaData);
		}
		return redirect()->to('/pizza');
	}
   // delete pizza
	public function deletePizza($id)
	{	
		$users = new UserPeperoni();
		$users->delete($id);
		return redirect()->to('/pizza');
	}

}
