<?php namespace App\Controllers;
use App\Models\UserPeperoni;
class PizzaPeperoni extends BaseController
{
	public function listPizza()
	{	
		$peperoni = new UserPeperoni();
		$allPizza['pizzaData'] = $peperoni->findAll();
		return view('index',$allPizza);
	}
	// add pizza list
	public function addPizza()
	{	
		helper(['form']);
		$data = [];

		if($this->request->getMethod() == "post"){

				$peperoni = new UserPeperoni();
				$newData = [
					'name' => $this->request->getVar('name'),
					'price' => $this->request->getVar('price'),
					'ingredient' => $this->request->getVar('ingredient')
				];

				$peperoni->save($newData);
				return redirect()->to('pizza');
		}
		
	}
   
   public function editPizza($id)
	{	
		$peperoni = new UserPeperoni();
		$data['edit']= $peperoni->find($id);
		return view('edit',$data);
	}
	// update pizza list
   public function updatPizza()
	{	
		$peperoni = new UserPeperoni();
		$peperoni->update($_POST['id'],$_POST);
		return redirect()->to('/pizza');
	}
	// delete pizza list
	public function deletePizza($id)
	{	
		$peperoni = new UserPeperoni();
		$peperoni->delete($id);
		return redirect()->to('/pizza');
	}
}

