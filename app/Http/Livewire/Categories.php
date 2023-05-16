<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Categories extends Component
{
    public $posts,$cat_name,$cat_id;
    public $updateMode = false;
	use WithPagination;
	protected $paginationTheme = 'bootstrap';


/** 
 * This method is used to show category listing
 */
public function render() {
  
	return view('livewire.categories',['categories'=>Category::latest()->paginate(1)]);
}

/** 
 * This method is used to clear form data after submit
*/
private function resetInputFields(){
    
    $this->cat_name = '';
}

/** 
 * This method is used to store category 
*/    
public function store(){

    $validatedDate = $this->validate([

        'cat_name' => 'required',
        
    ]);

    Category::create($validatedDate);
    session()->flash('message', 'Category Created Successfully.');
    $this->resetInputFields();

}
/** 
  * This method is used to render data on edit page 
 */
public function edit($id){

 	$category = Category::findOrFail($id);
	  
	if($category)
	{
		
		$this->cat_id = $id;
		$this->cat_name = $category->cat_name;
		$this->updateMode = true;
	}
	else
	{
		session()->flash('message', 'No record found.');
	} 
 	

}

public function cancel(){

$this->updateMode = false;
$this->resetInputFields();

}

/** 
  * This method is used to update category 
 */
public function update(){
    $validatedDate = $this->validate([

        'cat_name' => 'required',
    
    ]);
    $category = Category::find($this->cat_id);
    $category->update([

        'cat_name' => $this->cat_name,
    
    ]);

    $this->updateMode = false;
    session()->flash('message', 'Category Updated Successfully.');
    $this->resetInputFields();

}
 /** 
  * This method is used to delete category 
 */
public function delete($id) {
    Category::find($id)->delete();
    session()->flash('message', 'Category Deleted Successfully.');

}

}
